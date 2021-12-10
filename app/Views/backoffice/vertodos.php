<div>
 	<div id="grid_clientes"></div>
 </div>
 <script type="text/javascript">
    function aprobar(cod_abono) {
        //cambiarEstado(cod_abono, estadoAprobado);
    }
    function cargar(pagina, titulo) {
            pagina = '../' + pagina;
            $("#pagina").load(pagina, () => {
                $("#pagina").html("<h2 class='titulo-pagina' style='padding-top:30px'>" + titulo + "</h2>" + $(
                    "#pagina").html());
            });
        }
$(function() {	
	$("#grid_clientes").kendoGrid({
        //cedula,nombres,apellidos, CONCAT(nombres,' ',apellidos) as nombrecompleto
          columns: [
            { field: "cod_usuario", hidden:true },
            { field: "cedula", title: "Cedula",width:"110px" },
            { field: "nombres", title: "Nombres", width:"200px"},
            { field: "apellidos", title: "Apellidos", width:"110px" },
            {filterable: false, hidden: false, title: "Ver Datos", 
                template: "<button class='k-button' style='background-color: green;' onclick='cargar(\"Clientes/ver/#:cod_usuario#\", \"Datos de #:nombres# \")'>Ver datos</button>", 
                width: 100 },
          ],
		  dataSource: {
                    type: "json",
                    transport: {
                        read: {                    
                        	url: "../AdminController/getListaUsuarios",
                        	dataType: "json",
                        	type: "POST"                        	
                    	},
                    },
                    pageSize: 20
                },
	});
});
</script>