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
<script>
function confirmDelete() {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Esto no se puede revertir  😔!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Bórralo!",
        cancelButtonText:"No, Cancelar 😅"
    }).then((result) => {
        if (result.isConfirmed) {
              document.forms['delete-form'].submit();
            Swal.fire("Borrado!", "El archivo fue borrado exitosamente", "success");
        }else{
          location.reload();
        }
    });
}
</script>