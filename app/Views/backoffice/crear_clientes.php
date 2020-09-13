
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
    <div class="form-group">
        <label for="cmbGrupo">Grupo Sanguineo :</label>
        <input id="cmbGrupo" class="form-control">
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
    </fieldset>
    <button id="btnGuardar" class='btn-primary'>Guardar</button>    
</div>

  <input id="fecha" value="10/10/2011" title="datepicker" style="width: 100%" />

<script>
function onClick() {    
    $.post( "Clientes/guardar", { 
        cedula:    $("#txtCedula").val(),
        nombre:    $("#txtNombre").val(),
        apellido:  $("#txtApellidos").val(),
        direccion: $("#txtDireccion").val(),
        telefono:  $("#txtTelefono").val(),
        email:     $("#txtEmail").val(),
        password:  $("#txtPassword-crear").val(),
        cod_sexo:  $("#cmbSexo").data("kendoComboBox").value(),
        cod_grupo:  $("#cmbGrupo").data("kendoComboBox").value(),
    }).done(function( data ) {
        data = $.parseJSON(data);
        mensaje('Clientes','Cliente registrado');
        
    });        
}
$(function() { //Cuando la pagina termina de cargar
     $("#fecha").kendoDatePicker();
    /*
    $("#grid").kendoGrid({
            dataSource: {
                    transport: {
                           read: {                    
                            url: "../public/Clientes/getAll",
                            dataType: "json",                            
                        },
                    },                    
            },        
            columns: [
            {field:"cedula", title:"Cédula"},
            {field:"nombres", title:"Nombre"},
            {field:"apellidos", title:"Apellido"},
        ]
    });*/
    $("#btnGuardar").kendoButton({
        click: onClick
    });
    $("#cmbSexo").kendoComboBox({
        dataSource: getDataSource(C_SEXO,''),
        dataTextField: "nombre",
        dataValueField: "id"
    });

    $("#cmbGrupo").kendoComboBox({
        dataSource: getDataSource(C_GRUPO_SANGUINEO,''),
        dataTextField: "nombre",
        dataValueField: "id"
    });
    
});
</script>