@extends('layout')
@section('content')

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tamaño</th>
            <th>Extensión</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($files as $file)
        <tr>
            <td>{{ $file->id }}</td>
            <td>{{ $file->name }}</td>
            <td>{{ $file->sizeInKb }} KB</td>
            <td>{{ $file->extension }}</td>
            <td>
                <a href="{{ $file->public_url }}" target="_blank">
                    Enlace público
                </a>
                <a href="{{ route('files.download', $file) }}">
                    Descargar
                </a>
                <form action="{{ route('files.destroy', $file) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">Agregar nuevo archivo</button>
</form>

<form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="dropZoneJS">
    @csrf
</form>

<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('js/dropscript.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
@endsection