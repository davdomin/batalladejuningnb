<div>
    Nombres <input id="txtNombre"><br>
    Email <input id="txtEmail"><br>
    Password <input id="txtPassword" type="password"><br>
    <button id="btnGuardar">Guardar</button>
</div>

<script>
function onClick() {
    $.post( "../User/guardar", {
    nombre: $("#txtNombre").val(),
    email: $("#txtEmail").val(),
    password: $("#txtPassword").val()
    })
    .done(function( data ) {
      data = $.parseJSON(data);
        M.toast({html: 'Guardado', classes: 'rounded'});        
        
        });        
    }
    $(function() {
        $("#btnGuardar").kendoButton({
            click: onClick
        });
    });

    
</script>