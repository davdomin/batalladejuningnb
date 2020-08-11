 <html>
    <head>
      <!--Import Google Icon Font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <script  src="https://code.jquery.com/jquery-3.5.1.min.js"   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous"></script>
      
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script src="https://kendo.cdn.telerik.com/2020.2.617/js/kendo.all.min.js"></script>      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>      
      <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2020.2.617/styles/kendo.common.min.css" />
      <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2020.2.617/styles/kendo.blueopal.min.css" />
    </head>
<body>
 <table>
  <tr>
    <td>
     
  <ul>
    <li>
      Sistema
      <ul>
        <li> <spam onclick= cargar('../User/crear')> Usuarios</a> </li>
        <li>Permisos</li>
      </ul>
    </li>
    <li>opcion2</li>
  </ul>
     
    </td>
    <td>
      <div id="pagina"></div>   
    </td>
  </tr>
 </table>
  
  

<script>
   function cargar(args) {
    $("#pagina").load(args);
   }
   
    $(document).ready(function(){                 
        $.post( "../User/getOpcionesMenu", {cod_usuario :1}).done(
          function (data) {
            console.log(data);    
          }
        );
    });

</script>
 
</body>
  </html>