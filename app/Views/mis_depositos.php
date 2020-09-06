 <div>
    <div id="saldos">  
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Saldo Actual</th>
              <th scope="col">Saldo Bloqueado</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row"><span id="saldo_actual"> <?php echo $saldo_actual; ?> </span></td>
              <td scope="row"><span id="saldo_bloqueado"><?php echo $saldo_bloqueado; ?></span></td>
            </tr>
            </tr>
          </tbody>
        </table>
    </div>
 	<div id="grid_depositos"></div>
 </div>
 <script type="text/javascript">
$(function() {	
    var saldo_actual = <?php echo $saldo_actual; ?>;
    var saldo_bloqueado = <?php echo $saldo_bloqueado; ?>;

    $("#saldo_actual").html(kendo.toString(saldo_actual, "n"));
    $("#saldo_bloqueado").html(kendo.toString(saldo_bloqueado, "n"));

	$("#grid_depositos").kendoGrid({
		  dataSource: {
                    type: "json",
                    transport: {
                        read: {                    
                        	url: "../Clientes/getDepositos",
                        	dataType: "json",
                        	type: "POST"                        	
                    	},
                    },
                },
            
                columns: [
                    {field: "fecha_deposito", title:"Fecha" }, 
                    {field: "referencia", title:"Referencia" },                     
                    {field: "estado", title:"Estado" }, 
                    {field: "monto", title:"Monto" }, 
                    {field: "banco", title:"Banco" },
                    {field: "observaciones", title:"Observaciones" },
                
                ]
            
	});
});
</script>