 <html>
    <head>
      <!--Import Google Icon Font-->

      <!--Let browser know website is optimized for mobile-->
      <script  src="https://code.jquery.com/jquery-3.5.1.min.js"   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous"></script>
      
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
<body>
     <div class="container">
       <div class="row">
         <div class="col s2">
            <div id="menu_principal">
              <ul id="lista_menu" class='sidenav sidenav-fixed'></ul>
           </div>
         </div>
          <div class="col s10">
           <div id="pagina"></div>              
          </div>
       </div>
      </div>
     
      <div id="treelist"></div>


<script>
   function cargar(pagina) {
    pagina= '../'+pagina;
    $("#pagina").load(pagina);
   }
   
   function agregarMenu(tag, item,p) {
    var evento ="";
    if (p==1) {
        evento="onClick=cargar('" + item.controller.trim() +"/"+item.metodo +"')";
        $("#"+tag).append("<li id='li"+item.id+"'>  <span "+ evento+">"+ item.nombre + "<span></li>");
    } else {    
        $("#"+tag).append("<li id='li"+item.id+"'>  <a class='collapsible-header'>"+ item.nombre + "<a></li>");
    }
     
     
     if (item.tiene_hijos==0) return;
     var childtag = 'ul'+item.id;
     $("#li"+item.id).append("<div class='collapsible-body'> <ul id='"+ childtag +"' class='collapsible collapsible-accordion'> </ul></div>");
     
     $.post( "../User/getOpcionesMenu", {cod_usuario :1, cod_padre:item.id},function (data) {
      $.each(data, function( key, child) {         
         agregarMenu(childtag,child,1);
       });  
      }, "json");         
   }
   
   function cargarOpciones() {
      
     $.post( "../User/getOpcionesMenu", {cod_usuario :1, cod_padre:0},function (data) {
      $.each(data, function( key, item) {         
         agregarMenu("lista_menu",item,0);
       });  
      }, "json");
   }
   
    $(document).ready(function(){     
     cargarOpciones();
      $('.sidenav').sidenav();       
    });
    

</script>
 
</body>
  </html>