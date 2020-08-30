 <div>
 	<div id="grid_depositos"></div>
 </div>
 <script type="text/javascript">
$(function() {	
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
                    pageSize: 20
                },
	});
});
</script>