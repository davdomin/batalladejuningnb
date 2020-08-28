<div>[<?php echo $cod_usuario; ?>]</div>
<div>
    <div class="form-group">
        <label for="cmbBanco">Banco :</label>
        <input id="cmbBanco" class="form-control">
    </div>
     <div class="form-group">
        <label for="txtReferencia">Referencia :</label>
        <input id="txtReferencia" class="form-control">
     </div>    
    <div class="form-group">
        <label for="txtMonto">Monto :</label>
        <input id="txtMonto" type="" class="form-control">
    </div>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Observaciones</span>
        </div>
        <textarea id="txtObservaciones" class="form-control" aria-label="Observaciones"></textarea>
    </div>

    <button id="btnGuardar" class='btn-primary'>Guardar</button>
</div>

<script type="text/javascript">
function onClick() {   

    $.post( "../Clientes/guardar", { 
        referencia:$("#txtReferencia").val(),
        txtMonto:    $("#txtNombre").val(),
        txtObservaciones: $("#txtObservaciones").val(),        
        cod_banco:  $("#cmbBanco").data("kendoComboBox").value(),
    }).done(function( data ) {
        data = $.parseJSON(data);
        mensaje('Abonos','Deposito registrado');
        
    });        

}
$(function() {
    $("#btnGuardar").kendoButton({
        click: onClick
    });
    $("#cmbBanco").kendoComboBox({
        dataSource: getDataSource(C_BANCO),
        dataTextField: "nombre",
        dataValueField: "id"
    });

    
});

</script>