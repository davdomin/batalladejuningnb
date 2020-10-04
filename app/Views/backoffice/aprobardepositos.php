 <div>
 	<div id="grid_depositos"></div>
 </div>
 <script type="text/javascript">
    var  estadoAprobado = 15;
    var  estadoRechazado = 16;

    function cambiarEstado(cod_abono, cod_estado) {

        $.post( "../AdminController/cambiarEstadoAbono", {
                cod_abono: cod_abono,
                cod_estado: cod_estado
                })
                .done(function( data ) {
                    mensaje('Aprobacion','Proceso completado');
                    $("#grid_depositos").data("kendoGrid").dataSource.read();
                    
            });        
       
    }

    function aprobar(cod_abono) {
        cambiarEstado(cod_abono, estadoAprobado);
    }
    function rechazar(cod_abono) {
        cambiarEstado(cod_abono, estadoRechazado);
    }
$(function() {	
	$("#grid_depositos").kendoGrid({
          columns: [
            { field: "cod_abono", hidden:true },
            { field: "fecha_deposito", title: "Fecha",width:"110px" },
            { field: "cliente", title: "Cliente", width:"200px"},
            { field: "banco", title: "Banco", width:"110px" },
            { field: "referencia", title: "Referencia", width:"110px" },
            { field: "monto", title: "Monto", width:"110px" },
            { field: "observaciones", title: "Observaciones", width:"210px" },
            {filterable: false, hidden: false, title: "Aprobar", template: '<button class="k-button" style="background-color: green;" onclick="aprobar(#:cod_abono#);">Aprobar</button>', width: 100 },
            {filterable: false, hidden: false, title: "Rechazar", template: '<button class="k-button" style="background-color: red;" onclick="rechazar(#:cod_abono#);">Rechazar</button>', width: 100 }
          ],
		  dataSource: {
                    type: "json",
                    transport: {
                        read: {                    
                        	url: "../AdminController/getDepositosPendientes",
                        	dataType: "json",
                        	type: "POST"                        	
                    	},
                    },
                    pageSize: 20
                },
	});
});
</script>