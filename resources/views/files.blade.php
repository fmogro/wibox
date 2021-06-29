</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name');}}</title>
</head>
<body>
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

      <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data"
      class="dropzone"
      id="dropZoneJS">
      @csrf</form>
</body>
<script src="{{ asset('js/dropzone.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
<script>
    Dropzone.prototype.defaultOptions.dictDefaultMessage = "Arrastre sus archivos aquí";
    Dropzone.options.dropZoneJS = {
    init: function(){
        var th = this;
        this.on('queuecomplete', function(){
            setTimeout(function(){
                th.removeAllFiles();
                location.reload();
            },3000);
        })
    },
    paramName: "file",
    maxFilesize: 2,       
    acceptedFiles: 'image/*',
  
  };
</script>
</html>