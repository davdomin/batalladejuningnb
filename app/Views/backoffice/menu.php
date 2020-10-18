<!DOCTYPE html>
<html lang="es">
    <head>      
       <meta charset="utf-8"/>       
       <meta name="viewport" content="width=device-width, initial-scale=1" />
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
    <div id="top_menu">
     <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

      <a class="navbar-brand" href="../Home/Index">BJGNB</a>      

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <div class="nav-wrappers">
            <ul id="lista_menu" class='navbar-nav mr-auto mt-2 mt-lg-0'></ul>          
        </div> 
       </div>
       <div id='cargar_imagen'>
          <img id ="foto_cargada" class="rounded-circle"/>
      </div>
       <div id="info_tope" class="importante"> Saldo Acumulado : <?php 
          $f = new \NumberFormatter("it-IT", \NumberFormatter::CURRENCY);
          echo $f->formatCurrency(12345, "USD")
         ?></div>
      </nav>
    </div>

      <div class="container">
       <div id="dialog"></div>
       <div id="mensaje_html" style="visibility: hidden;">
          <div class="alert alert-success" id="msj_html">          
        </div>
       </div>
         <div class="form-group"> 
           <div id="pagina" >
            <div class="container-fluid">
              <div id="dashboard" style="margin-top:50px; background-color:#fff; padding:10px; ">
              <div class="row">
                  <div id ="divSaldo" class="col-sm">
                    <div id="saldo">
                      <div class="card" style="width: 18rem;">
                      <!--
                        <img class="card-img-top" src="../img/money.png" alt="Card image cap">
                        -->
                        <div class="card-body">
                          <h5 class="card-title">Saldo</h5>
                          <h3 class="card-text">Bs. <?php echo $saldo_actual; ?></h3>
                          <button onclick="cargar('Clientes/misdepositos','Mis movimientos')" class="btn btn-primary">Ver detalle</button>
                        </div>
                      </div>
                    </div> <!-- saldo -->
                  </div>                
                <div class="clearfix"></div>
                <div class="col-sm">
                  <div class="card">
                      <div class="card-body">
                          <h3 class="card-title">Mis Datos</h3>
                          <p class="card-text">
                            <table class="table">
                            <tbody>
                              <tr>
                                <td colspan="3"><img id="imgTable" src=""  class="rounded float-left" style="max-width:200px; margin:auto"/></td>
                              </tr>
                              <tr>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $apellidos; ?></td>
                                <td><button onclick="cargar('Clientes/actualizar','Actualizar datos')" class="btn btn-primary">Actualizar datos </button></td>
                              </tr>
                              <tr>
                                <td>Total bloqueado</td>
                                <td><?php echo $bloqueado; ?></td>
                              </tr>
                              <tr>
                                <td>Saldo</td>
                                <td><?php echo $saldo_actual; ?></td>
                              </tr>
                              <tr>
                                <td><button onclick="cargar('Clientes/depositar','Depositar')" class="btn btn-primary">Depositar </button></td>
                                <td><button onclick="cargar('user/cerrarSesion','Cerrar sesión')" class="btn btn-danger">Cerrar session </button></td>
                              </tr>
                            </table>
                          </p>
                        </div>

                  </div>
                </div>

              </div><!-- datos personales -->

            </div>            
           </div>
         </div>
      </div>


<script>
 // var total = <?php echo $total_acumulado ? $total_acumulado: 0; ?>;
  var login_path = '<?php echo env('index_url') ?>';
  var id_login = <?php echo $id_login ?>;
  
  
    if (id_login  == -1) {
      location.href = login_path;
    }

    $(document).ready(function(){     
       $("#foto_cargada").attr("src", "<?php echo $foto_guardada; ?>"  );
       $("#imgTable").attr("src", "<?php echo $foto_guardada; ?>"  );       
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