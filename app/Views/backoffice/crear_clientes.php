
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
        <input id="txtApellidos" class="form-control">
    </div>
    <div class="form-group">
        <label for="txtDireccion">Dirección :</label>
        <input id="txtDireccion" class="form-control">
    </div>
    <div class="form-group">
        <label for="txtTelefono">Teléfono :</label>
        <input id="txtTelefono" class="form-control">
    </div>
    <div class="form-group">
        <label for="cmbSexo">Sexo :</label>
        <input id="cmbSexo" class="form-control">
    </div>
    <fieldset>
            <div class="form-group">
                <label for="txtEmail">Correo Electrónico:</label>
                <input id="txtEmail" type="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="txtPassword-crear">Contraseña:</label>
                <input id="txtPassword-crear" type="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="txtPassword-confirmar">Confirmar contraseña:</label>
                <input id="txtPassword-confirmar" type="password" class="form-control">
            </div>
    </fieldset>
    <button id="btnGuardar" class='btn-primary'>Guardar</button>    

</div>

<script>
function onClick() {
    if  ($("#txtPassword-confirmar").val() !=  $("#txtPassword-crear").val()) {
        alert("Las contraseñas no coinciden");        
        return;
    } 
    $.post( "Clientes/guardar", { 
        cedula:    $("#txtCedula").val(),
        nombre:    $("#txtNombre").val(),
        apellido:  $("#txtApellidos").val(),
        direccion: $("#txtDireccion").val(),
        telefono:  $("#txtTelefono").val(),
        email:     $("#txtEmail").val(),
        password:  $("#txtPassword-crear").val(),
        cod_sexo:  $("#cmbSexo").data("kendoComboBox").value()           
    }).done(function( data ) {
        data = $.parseJSON(data);
        alert( 'Cliente registrado');
        $("#content").load('./Home/session');
    });     
      
}
$(function() { //Cuando la pagina termina de cargar    
    $("#fecha").kendoDatePicker();    
    $("#btnGuardar").kendoButton({
        click: onClick
    });
    $("#cmbSexo").kendoComboBox({
        dataSource: getDataSource(C_SEXO,''),
        dataTextField: "nombre",
        dataValueField: "id"
    });
});
</script>