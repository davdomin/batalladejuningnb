 <html>
    <head>
      <!--Import Google Icon Font-->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <script  src="https://code.jquery.com/jquery-3.5.1.min.js"   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous"></script>
      
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script src="https://kendo.cdn.telerik.com/2020.2.617/js/kendo.all.min.js"></script>      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>      
      <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2020.2.617/styles/kendo.common.min.css" />
      <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2020.2.617/styles/kendo.blueopal.min.css" />
    </head>
<body>
     <div class="container">
         <div class="col s2">
            <div id="menu_principal">
              <ul id="lista_menu" class="collapsible"></ul>
           </div>
         </div>
          <div class="col s10">
           <div id="pagina"></div>              
          </div>
      </div>  

<script>
   function cargar(c) {
     console.log(c);
    //$("#pagina").load(pagina);
   }
   
   function agregarMenu(tag, item,p) {    
     $("#"+tag).append("<li id='li"+item.id+"'>  <div onclick='cargar(1)' class='collapsible-header'>"+ item.nombre +"</div></li>");
     if (item.tiene_hijos==0) return;
     var childtag = 'ul'+item.id;
     $("#li"+item.id).append("<div class='collapsible-body'> <ul id='"+ childtag +"'> </ul><div>");
     
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
     $('.collapsible').collapsible();
     cargarOpciones();        
    });
    

</script>
 
</body>
  </html>