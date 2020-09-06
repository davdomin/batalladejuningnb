
<div>
    <div class='form-group'>
        <label for=''>Cliente :</label>
        <div style='font-weight: bold;'> [<?php echo $nombre_usuario; ?>]</div>
        <input id='txtCodcliente' type='hidden' value='<?php echo $cod_cliente; ?>'>
    </div>

    
    <div class='form-group'>
        <label for='txtSaldo'>Saldo Disponible :</label>
        <input id='txtSaldo' class='form-control' value='' readonly='false'>
    </div>


    <div class='form-group'>
        <label for='txtMonto'>Monto :</label>
        <input id='txtMonto' class='form-control'>
    </div>
    <div class='input-group'>
        <div class='input-group-prepend'>
            <span class='input-group-text'>Observaciones</span>
        </div>
        <textarea id='txtObservaciones' class='form-control' aria-label='Observaciones'></textarea>
    </div>
    <div class='form-group'>
        <button id='btnGuardarRetiro' class='btn-primary'>Guardar</button>
    </div>
</div>

<script type='text/javascript'>
var saldo =<?php echo $saldo; ?> ;
var locked = false;
function validar() {

    monto = $('#txtMonto').val();
    var result = true;    
    if (!$.isNumeric(monto)) {
        result = false;
    }

    if (saldo < monto) {
        result = false;
    }

    return result;
}


function onClick(event) {
    event.preventDefault();
    if (!validar()) {        
        return;
    }     
    
    $('#btnGuardarRetiro').data('kendoButton').enable(false);
    $.post( '../Clientes/guardar_retiro', { 
        cod_cliente: $('#txtCodcliente').val(),
        monto:    $('#txtMonto').val(),
        observaciones: $('#txtObservaciones').val()
    }).done(function( data ) {
        data = $.parseJSON(data);
        mensaje('Retiros','Retiro registrado');        
        
    });
    $('#txtMonto').val('-'); 
}
$(function() {            
    kendo.culture('en-US'); 
    $('#txtSaldo').val(kendo.toString(saldo, 'n'));
    $('#dtfecha').kendoDatePicker({
        // defines the start view
        value: new Date(),
        start: 'year',
        // defines when the calendar should return date
        depth: 'day',
        // display month and year in the input
        format: 'dd/MM/yyyy',
        // specifies that DateInput is used for masking the input element
        dateInput: true
    });

    $('#btnGuardarRetiro').kendoButton({
        click: onClick
    });
});

</script>