 <div>
 	<div id="grid_depositos"></div>
 </div>
 <script type="text/javascript">
function aprobar(cod_abono) {
    console.log(cod_abono);
}
function rechazar(cod_abono) {
    console.log(cod_abono);
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