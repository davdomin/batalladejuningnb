<?php //echo var_dump($cliente); die(); ?>
<div class="container">
<fieldset>
<div class="form-group ">
     <input id="hdnCliente" class="form-control input-sm" readonly  type ="hidden">
     <label for="txtCedula">Cédula :</label>
     <input id="txtCedula" class="form-control input-sm" readonly >
     <div class ="spacer"></div>    
     <label for="txtNombre">Nombres:</label>
     <input id="txtNombre" class="form-control input-sm" readonly >
</div>
</fieldset>
<fieldset>
     <div class='col-sm-12 pb-3'>
          <hr>
     </div>
     <div class="form-group row">
          <label for="cmbGrupo">Grupo Sanguineo :</label>
          <input id="cmbGrupo" class="form-control">
          <label for="cmbJerarquia">Jerarquía :</label>
          <input id="cmbJerarquia" class="form-control">    
          <label for="cmbCargo">Cargo :</label>
          <input id="cmbCargo" class="form-control">    
     </div>
     <div class="form-group row">
          <label for="cmbNacimiento">Lugar de nacimiento :</label>
          <input id="cmbNacimiento" class="form-control">    
          <label for="dtFechaNac">Fecha de Nacimiento:</label>
          <div style ="width: 190px">
               <input id="dtFechaNac" value="01/01/2002" title="datepicker" class="form-control"/>
          </div>
          <label for="txtTelefonoFijo">Teléfono Fijo :</label>
          <div style ="width: 190px">
               <input id="txtTelefonoFijo" class="form-control input-sm">
          </div>
     </div>
     <div class="form-group row">
          <label for="cmbGrado">Grado de Instrucción :</label>
          <input id="cmbGrado" class="form-control">
          <label for="txtEspecialidad">Especialidad :</label>
          <div style ="width: 290px">
               <input id="txtEspecialidad" class="form-control input-sm">
          </div>
     </div>
     <div class="form-group row">
          <label for="txtUnidad">Unidad de procedencia :</label>
          <div style ="width: 190px">
               <input id="txtUnidad" class="form-control input-sm">
          </div>
          <label for="dtFechaAscenso">Fecha Ult. Ascenso:</label>
          <div style ="width: 190px">
               <input id="dtFechaAscenso" value="01/01/2002" title="datepicker" class="form-control"/>
          </div>
     </div>
     <div class="form-group row">
          <label for="txtEstatura">Estatura:</label>
          <div style ="width: 100px">
               <input id="txtEstatura" class="form-control input-sm">
          </div>
          <label for="txtPeso">Peso:</label>
          <div style ="width: 100px">
               <input id="txtPeso" class="form-control input-sm">
          </div>
          <label for="cmbCamisa">Talla camisa :</label>
          <input id="cmbCamisa" class="form-control">

     </div>
     <div class="form-group row">
          <label for="cmbPantalon">Talla pantalon :</label>
          <input id="cmbPantalon" class="form-control">

          <label for="cmbCalzado">Talla calzado :</label>
          <input id="cmbCalzado" class="form-control">

          <label for="cmbGorra">Talla gorra :</label>
          <input id="cmbGorra" class="form-control">

     </div>
</fieldset>
<button id="btnGuardar" class='btn-primary'>Guardar</button>
</div>
<script>
$(function() {
     $("#dtFechaNac").kendoDatePicker({ start: 'year', depth: 'day', format: 'dd/MM/yyyy',dateInput: true }); 
     $("#dtFechaAscenso").kendoDatePicker({ start: 'year', depth: 'day', format: 'dd/MM/yyyy',dateInput: true }); 

     $("#btnGuardar").kendoButton({
        click: onClick
     });
     $("#cmbGrupo").kendoComboBox({
        dataSource: getDataSource(C_GRUPO_SANGUINEO),
        dataTextField: "nombre",
        dataValueField: "id"
    });
    $("#cmbJerarquia").kendoComboBox({
        dataSource: getDataSource(C_JERARQUIA),
        dataTextField: "nombre",
        dataValueField: "id"
    }); 
    $("#cmbNacimiento").kendoComboBox({
        dataSource: getDataSource(C_ESTADOS),
        dataTextField: "nombre",
        dataValueField: "id"
    }); 
    $("#cmbCargo").kendoComboBox({
        dataSource: getDataSource(C_CARGO),
        dataTextField: "nombre",
        dataValueField: "id"
    }); 
    $("#cmbGrado").kendoComboBox({
        dataSource: getDataSource(C_GRADO),
        dataTextField: "nombre",
        dataValueField: "id"
    }); 
    $("#cmbCamisa").kendoComboBox({
        dataSource: getDataSource(C_TALLA_CAMISA),
        dataTextField: "nombre",
        dataValueField: "id"
    }); 
    $("#cmbPantalon").kendoComboBox({
        dataSource: getDataSource(C_TALLA_PANTALON),
        dataTextField: "nombre",
        dataValueField: "id"
    }); 
    $("#cmbCalzado").kendoComboBox({
        dataSource: getDataSource(C_TALLA_CALZADO),
        dataTextField: "nombre",
        dataValueField: "id"
    }); 
    $("#cmbGorra").kendoComboBox({
        dataSource: getDataSource(C_TALLA_GORRA),
        dataTextField: "nombre",
        dataValueField: "id"
    }); 
    loadData()
})
function loadData() {
    $("#hdnCliente").val('<?php echo $cod_cliente; ?>')
    $("#txtCedula").val('<?php echo $cedula; ?>')
    $("#txtNombre").val('<?php echo $nombres; ?>')
    $("#cmbGrupo").data('kendoComboBox').value(<?php echo $cliente['cod_datos_grupo'] ?>)
    $("#cmbJerarquia").data('kendoComboBox').value(<?php echo $cliente['cod_datos_jerarquia'] ?>)
    $("#cmbNacimiento").data('kendoComboBox').value(<?php echo $cliente['cod_datos_lugar_nac'] ?>)
    $("#dtFechaNac").data('kendoDatePicker').value('<?php echo $cliente['fecha_nac'] ?>')
    $("#txtTelefonoFijo").val('<?php echo $cliente['telefono_fijo'] ?>')
    $("#cmbCargo").data('kendoComboBox').value('<?php echo $cliente['cod_datos_cargo'] ?>')
    $("#cmbGrado").data('kendoComboBox').value('<?php echo $cliente['cod_datos_grado'] ?>')
    $("#txtEspecialidad").val('<?php echo $cliente['especialidad'] ?>')
    $("#txtUnidad").val('<?php echo $cliente['unidad'] ?>')
    $("#dtFechaAscenso").data('kendoDatePicker').value('<?php echo $cliente['fecha_asc'] ?>')
    $("#txtEstatura").val('<?php echo $cliente['estatura'] ?>')
    $("#txtPeso").val('<?php echo $cliente['peso'] ?>')
    $("#cmbCamisa").data('kendoComboBox').value('<?php echo $cliente['cod_datos_camisa'] ?>')
    $("#cmbPantalon").data('kendoComboBox').value('<?php echo $cliente['cod_datos_pantalon'] ?>')
    $("#cmbCalzado").data('kendoComboBox').value('<?php echo $cliente['cod_datos_calzado'] ?>')
    $("#cmbGorra").data('kendoComboBox').value('<?php echo $cliente['cod_datos_gorra'] ?>')
}
function onClick() {
     event.preventDefault();
     $('#btnGuardar').data('kendoButton').enable(false);

    $.post( "../Clientes/actualizar_datos", { 
        cod_cliente:    $("#hdnCliente").val(),
        cod_grupo:      $("#cmbGrupo").data("kendoComboBox").value(),
        cod_jerarquia:  $("#cmbJerarquia").data("kendoComboBox").value(),
        cod_lugar_nac:  $("#cmbNacimiento").data("kendoComboBox").value(),
        fecha_nac:      formatDate($("#dtFechaNac").data("kendoDatePicker").value()),
        telefono_fijo:  $("#txtTelefonoFijo").val(),
        cod_cargo:      $("#cmbCargo").data("kendoComboBox").value(),
        cod_grado:      $("#cmbGrado").data("kendoComboBox").value(),
        especialidad:   $("#txtEspecialidad").val(),
        unidad:         $("#txtUnidad").val(),
        fecha_asc:      formatDate($("#dtFechaAscenso").data("kendoDatePicker").value()),
        estatura:       $("#txtEstatura").val(),
        peso:           $("#txtPeso").val(),
        cod_camisa:           $("#cmbCamisa").val(),
        cod_pantalon:           $("#cmbPantalon").val(),
        cod_calzado:           $("#cmbCalzado").val(),
        cod_gorra:           $("#cmbGorra").val(),
    }).done(function( data ) {
        data = $.parseJSON(data);
        mensaje('Actualizacion','Actualizacion completada');
        $('#btnGuardar').data('kendoButton').enable(true);        
    });
}
</script>