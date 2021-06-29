@extends('layout')
@section('content')

<table class="table">
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

                <div class="file-actions">
                    <a href="{{ $file->public_url }}" class="btn btn-primary file-actions-spaces" target="_blank">
                        URL
                    </a>

                    <a href="{{ route('files.download', $file) }}" class="btn btn-success file-actions-spaces">
                        Descargar
                    </a>

                    <form name="delete-form" onsubmit="event.preventDefault();confirmDelete()" action="{{ route('files.destroy', $file) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger file-actions-spaces">Borrar</button>
                    </form>
                </div>
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

@include('fileres')
@endsection