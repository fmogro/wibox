<?php

use App\File;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Dropbox\Client;


class FileController extends Controller
{
    /**
     *  Constructor: We need obtain an instance of client Class with some necessary methods
     */
    public function __construct()
    {
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();   
    }

    /**
     * Display a listing of the resource and return a view with the data
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $files = \App\Models\File::orderBy('created_at', 'desc')->get();
        return view('files', compact('files'));
    }

    /**
     * Store a newly created File in storage.
     * Save a file on the specified driver using putFileAs method
     *
     * @return back
     */
    public function store(Request $request)
    {
   
        Storage::disk('dropbox')->putFileAs(
            '/', 
            $request->file('file'), 
            $request->file('file')->getClientOriginalName()
        );

        $response = $this->dropbox->createSharedLinkWithSettings(
            $request->file('file')->getClientOriginalName(), 
            ["requested_visibility" => "public"]
        );

        \App\Models\File::create([
            'name' => $response['name'],
            'extension' => $request->file('file')->getClientOriginalExtension(),
            'size' => $response['size'],
            'public_url' => $response['url']
        ]);
        
        return back();
    }

    /**
     * Receive File as $file
     * Obtain a download file specifying dropbox driver
     * @method download receive the filename
     *
     * @return Storage
     */

    public function download(\App\Models\File $file)
    {
        return Storage::disk('dropbox')->download($file->name);
    }
    
    /**
     * Receive File as $file
     * Destroy file and delete from database
     *
     * @return back
     */
    public function destroy(\App\Models\File $file)
    {
        $exists = Storage::disk('dropbox')->exists($file->name);
        if ($exists) {
            $this->dropbox->delete($file->name);
            $file->delete();
        }else{
            echo "<script>";
            echo "alert('hello');";
            echo "</script>";
            $file->delete();
            //return redirect()->back()->with('alert','File not found on Dropbox');
        }
        return back();
    }
}
