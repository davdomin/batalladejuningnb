
<div>
    <div class='form-group'>
        <!--<label for=''>Cliente :</label>
        <div style='font-weight: bold;'> </div> -->
        <label for='txtCodcliente'>Cliente :</label>
        <input id='txtCodcliente' type='text'>
    </div>

    
    <div class='form-group'>
        <label for='txtSaldo'>Saldo Disponible :</label>
        <div id='txtSaldo'></div>
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
var saldo =<?php echo $saldo ? $saldo: 0; ?> ;
var cod_cliente =0;
var locked = false;
$("#txtCodcliente").kendoAutoComplete({
    dataTextField: "nombrecompleto",        
    filter: "contains",
    minLength: 2,
    clearButton: true,
    placeholder: "Selecciona Cliente",
    dataSource: {
        transport: {
            read: {                    
                url: "../Clientes/getAll",
                dataType: "json",                            
            },
        },                    
    },
    select: function(e) {
        kendo.culture("en-US"); 
        var dataItem = this.dataItem(e.item.index());
        cod_cliente = dataItem.id;        
        $.get('../Clientes/getSaldo', { 
            cod_cliente: cod_cliente,
        }).done(function( data ) {
            data = $.parseJSON(data);
            saldo= data.saldo;            
            $("#txtSaldo").html(kendo.toString(parseFloat(saldo), "n"));

            
        });

        
      },
      change: (e)=>{        
          if(!e.sender.element[0].value) {
              cod_cliente = 0;
          }
      },
});

function validar() {
    monto = parseFloat($('#txtMonto').val());
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
        cod_cliente: cod_cliente,
        monto:    $('#txtMonto').val(),
        observaciones: $('#txtObservaciones').val()
    }).done(function( data ) {
        data = $.parseJSON(data);
        mensaje('Retiros','Retiro registrado');        
        
    });
    $('#txtMonto').val('-'); 
}
$(function() {
    saldo = 0;
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