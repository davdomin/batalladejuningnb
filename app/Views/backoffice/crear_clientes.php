<div>
     <div class="form-group">
          <label for="txtCedula">Cédula :</label>
        <input id="txtCedula" class="form-control">
     </div>
     <div class="form-group">
        <label for="txtNombres">Nombres :</label>
        <input id="txtNombre" class="form-control">
     </div>    
    <div class="form-group">
        <label for="txtApellidos">Apellidos :</label>
        <input id="txtApellidos" type="" class="form-control">
    </div>
    <div class="form-group">
        <label for="txtDireccion">Dirección :</label>
        <input id="txtDireccion" type="" class="form-control">
    </div>
    <div class="form-group">
        <label for="txtTelefono">Teléfono :</label>
        <input id="txtTelefono" type="" class="form-control">
    </div>
    <div class="form-group">
        <label for="txtEmail">Correo Electrónico:</label>
        <input id="txtEmail" type="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="txtPassword">Contraseña:</label>
        <input id="txtPassword" type="password" class="form-control">
    </div>
    
    <button id="btnGuardar" class='btn-primary'>Guardar</button>
</div>

<script>
function onClick() {    
    $.post( "../Clientes/guardar", {
    cedula: $("#txtCedula").val(),
    nombre: $("#txtNombre").val(),
    apellido: $("#txtApellidos").val(),
    direccion: $("#txtDireccion").val(),
    telefono: $("#txtTelefono").val(),
    email: $("#txtEmail").val(),
    password: $("#txtPassword").val()
    })
    .done(function( data ) {
      data = $.parseJSON(data);
        mensaje('Clientes','Cliente registrado');
        
        });        
    }
    $(function() {
        $("#btnGuardar").kendoButton({
            click: onClick
        });
        
    });

    
</script>