<div>
     <div class="form-group">
          <label for="txtNombre">Nombres :</label>
        <input id="txtNombre" class="form-control">
     </div>
     <div class="form-group">
        <label for="txtEmail">Email :</label>
        <input id="txtEmail" type='email' class="form-control">
     </div>    
    <div class="form-group">
        <label for="txtPassword">Password :</label>
        <input id="txtPassword" type="password" class="form-control">
    </div>    
    <button id="btnGuardar" class='btn-primary'>Guardar</button>
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
        mensaje('Clientes','Usuario registrado');        
        });        
    }
    $(function() {
        $("#btnGuardar").kendoButton({            
            click: onClick            
        });
    });

    
</script>