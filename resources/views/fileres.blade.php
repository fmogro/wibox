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
  function showOldestUploader(){
    document.getElementById('hide').removeAttribute("style");
  }
  
  function hideOldestUploader(){
    document.getElementById('hide').style.display = "none";
  }
</script>