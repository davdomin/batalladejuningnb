 <div>
 	<div id="grid_usuarios"></div>
 </div>
 <script type="text/javascript">
    var  estadoAprobado = 15;
    var  estadoRechazado = 16;

    function aprobarUsuario(cod_usuario) {

    $.post( "../AdminController/aprobarUnUsuario", {
        cod_usuario: cod_usuario
        })
        .done(function( data ) {
            mensaje('Aprobacion','Proceso completado');
            $("#grid_usuarios").data("kendoGrid").dataSource.read();
            
    });        

}
function rechazarUsuario(cod_usuario) {
    $.post( "../AdminController/rechazarUnUsuario", {
        cod_usuario: cod_usuario        
        })
        .done(function( data ) {
            mensaje('Aprobacion','Proceso completado');
            $("#grid_usuarios").data("kendoGrid").dataSource.read();
            
    });        

}
$(function() {	
	$("#grid_usuarios").kendoGrid({
          columns: [
            { field: "cod_usuario", hidden:true },
            { field: "cedula", title: "Cedula",width:"110px" },
            { field: "usuario", title: "Usuario", width:"200px"},
            {filterable: false, hidden: false, title: "Aprobar", template: '<button class="k-button" style="background-color: green;" onclick="aprobarUsuario(#:cod_usuario#);">Aprobar</button>', width: 100 },
            {filterable: false, hidden: false, title: "Rechazar", template: '<button class="k-button" style="background-color: red;" onclick="rechazarUsuario(#:cod_usuario#);">Rechazar</button>', width: 100 }
          ],
		  dataSource: {
                    type: "json",
                    transport: {
                        read: {
                        	url: "../AdminController/getUsuariosPendientes",
                        	dataType: "json",
                        	type: "POST"
                    	},
                    },
                    pageSize: 20
                },
	});
});
</script>