<form id="first_form" method="post" enctype="multipart/form-data">
    <input accept="image/*" id="myFileInput" type="file">
    <button id="guardarImagen">Subir</button>
</form>
<script type="text/javascript">
    $(document).ready(function() {        
    $("#guardarImagen").unbind().click(function(event) {
    event.preventDefault();
    var form_data = new FormData($('#first_form')[0]);
    form_data.append('file', myFileInput.files[0], 'chris.jpg');    
    jQuery.ajax({
        type: "POST",
        url: "../User/upload",
        data: form_data,
        processData: false,
        contentType: false,
        success: function(res) {
            if (res){
                let path ='../upload/users/' + res;

                $("#foto_cargada").attr("src", path  );
                alert('Foto cargada');
                }
                

        }
        }
    }); }); });
</script>