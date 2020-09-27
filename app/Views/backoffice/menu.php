<!DOCTYPE html>
<html lang="es">
    <head>      
       <meta charset="utf-8"/>       
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!--Import Google Icon Font-->
      <!--Let browser know website is optimized for mobile-->
         <script  src="https://code.jquery.com/jquery-3.5.1.min.js"   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous"></script>      
          <!-- Compiled and minified CSS -->          
         

          <!--boostrap-->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
         <!--kendo-->
         <link href="https://kendo.cdn.telerik.com/2020.2.617/styles/kendo.common.min.css" rel="stylesheet" />
         <link href="https://kendo.cdn.telerik.com/2020.2.617/styles/kendo.default.min.css" rel="stylesheet" />
         <script src="https://kendo.cdn.telerik.com/2020.2.617/js/kendo.all.min.js"></script>
         <script src="../js/util.js"></script>
         <link rel="stylesheet" href="../css/style.css">
    </head>
<body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="#">BJGNB</a>
       <div class="nav-wrappers">
          <ul id="lista_menu" class='navbar-nav mr-auto'></ul>          
       </div>       
       <div id="info_tope" class="importante"> Monto Acumulado : <div id="total_acumulado"></div> </div>
      </nav>

      <div class="container">
       <div id="dialog"></div>
       <div id="mensaje_html" style="visibility: hidden;">
          <div class="alert alert-success" id="msj_html">          
        </div>
       </div>
         <div class="form-group">
           <div id="pagina" >
            <div class="container-fluid">
             <img src="../img/background.jpg" class="img-fluid img-centro">
            </div>            
           </div>
         </div>
      </div>


<script>
  var total = <?php echo $total_acumulado ? $total_acumulado: 0; ?>;
  var login_path = '<?php echo env('index_url') ?>';
  var id_login = <?php echo $id_login ?>;
  
  console.log(id_login);
    if (id_login  == -1) {
      location.href = login_path;
    }

    $(document).ready(function(){     
       cargarOpciones();
       kendo.culture("en-US"); 
      $("#total_acumulado").html(kendo.toString(total, "n"));
    });   

   function cargar(pagina, titulo) {
    pagina= '../'+pagina;    
    $("#pagina").load(pagina, ()=>{
      $("#pagina").html( "<h2 class='titulo-pagina'>"+titulo+"</h2>"+ $("#pagina").html());
    });    
   }
   
   function agregarMenu(tag, item,p) {
    var evento ="";
    if (p==1) {
        var titulo =  "'"+ item.nombre+"'";        
        titulo = titulo.replace(" ","&nbsp;");
        evento="onClick=cargar('" + item.controller.trim() +"/"+item.metodo +"',"+ titulo+")";
        $("#"+tag).append("<li  class='dropdown-item'> <spam " + evento +">"+  item.nombre + "</spam></li>");
    } else {    
        $("#"+tag).append("<li class='nav-item dropdown'>"
            + "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"
             + item.nombre + "</a>"
             + " <div class='dropdown-menu' aria-labelledby='navbarDropdown' id='li"+item.id+"'></div>"
             +"</li>");
    }
     
     
     if (item.tiene_hijos==0) return;
     var childtag = 'ul'+item.id;
     $("#li"+item.id).append("<ul id='"+ childtag +"' class='dropdown-content'> </ul>");
     
     $.post( "../User/getOpcionesMenu", {cod_usuario : id_login, cod_padre:item.id},function (data) {
      $.each(data, function( key, child) {         
         agregarMenu(childtag,child,1);
       });  
      }, "json");         
   }
   
   function cargarOpciones() {
      
     $.post( "../User/getOpcionesMenu", {cod_usuario : id_login, cod_padre:0},function (data) {
      $.each(data, function( key, item) {         
         agregarMenu("lista_menu",item,0);
       });  
      }, "json");
   }
   
</script>
<style> 
.navbar-custom { 
    background-color: red; 
}
.navbar-custom .navbar-brand, 
.navbar-custom .navbar-text { 
  color: green; 
 } 
</style>
 
</body>


  </html>