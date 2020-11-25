
<div>
    <div class="form-group">
        <label for="">Cliente :</label>
        <div style="font-weight: bold;"> [<?php echo $nombre_usuario; ?>]</div>
        <input id="txtCodcliente" type="hidden" value="<?php echo $cod_cliente; ?>">
    </div>
    <div class="form-group">
        <label for="dtfecha">Fecha del deposito :</label>
        <input id="dtfecha"  title="datepicker" style="width: 100%" />
    </div>


    <div class="form-group">
        <label for="cmbBanco">Banco :</label>
        <select id="cmbBanco" class="form-control"> </select>
    </div>
     <div class="form-group">
        <label for="txtReferencia">Referencia :</label>
        <input id="txtReferencia" class="form-control">
     </div>    
    <div class="form-group">
        <label for="txtMonto">Monto :</label>
        <input id="txtMonto" class="form-control">
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
function btnGuardar_onClick() {   
    event.preventDefault();
    $('#btnGuardar').data('kendoButton').enable(false);
    
    $.post( "../Clientes/guardar_deposito", { 
        cod_cliente: $("#txtCodcliente").val(),
        cod_banco:  $("#cmbBanco").data("kendoComboBox").value(),
        fecha_deposito: formatDate($("#dtfecha").data("kendoDatePicker").value()),
        monto:    $("#txtMonto").val(),
        referencia:$("#txtReferencia").val(),        
        observaciones: $("#txtObservaciones").val(),
    }).done(function( data ) {
        data = $.parseJSON(data);
        mensaje('Abonos','Deposito registrado');
        $('#btnGuardar').data('kendoButton').enable(true);
        location.reload();
        
    });        

}
$(function() {    
    $("#dtfecha").kendoDatePicker({
                    // defines the start view
                    value: new Date(),
                    start: "year",

                    // defines when the calendar should return date
                    depth: "day",

                    // display month and year in the input
                    format: "dd/MM/yyyy",

                    // specifies that DateInput is used for masking the input element
                    dateInput: true
                });
    $("#btnGuardar").kendoButton({
        click: btnGuardar_onClick
    });
    $("#cmbBanco").kendoComboBox({
        dataSource: getDataSource(C_BANCO),
        dataTextField: "nombre",
        dataValueField: "id"
    });

    
});

</script>