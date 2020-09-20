  <!DOCTYPE html>
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
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
       <script src="js/util.js"></script>

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    

      <link rel="stylesheet" href="css/style.css">

    </head>

    <body>          
          <div id="window" style="display: none;"></div>
          
          <header class="header">
            <div class ="logo">
              <img src="img/inicial.jpg" />
            </div>
            <div class ="title">
              <h1>Batalla de Junin GNB</h1>   
            </div>
          </header>
            <div class="bg">
        <div class="card  white darken-1" id="for_login">
        <img src="img/login.png" />
            <span class="card-title">Iniciar sesión</span>        
            <div class="row">
                <div class="row">
                  <div class="input-field col s10">
                    <input placeholder="Placeholder" id="txtUsuario" type="text" class="validate k-textbox">
                    <label for="txtUsuario">Usuario</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s10">
                    <input id="txtPassword" type="password" class="validate k-textbox">
                    <label for="txtPassword">Contraseña</label>
                  </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button id="btnIniciar" class="boton-pequeno">Login</button>                        
                        <button id="btnRegistro" class="boton-pequeno">Registrarse</button>
                    </div>

                </div>
            </div>
        </div>
      <!--JavaScript at end of body for optimized loading-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      </div>
    </body>
    <script>
        function onClick(data) {
            var usuario = $("#txtUsuario").val();
            var password = $("#txtPassword").val();
            $.post( "User/sesion", {
                usuario: usuario,
                password: password
                })
                .done(function( data ) {
                  data = $.parseJSON(data);
                    if (!data) {
                        M.toast({html: 'Acceso denegado', classes: 'rounded'});
                        return;
                    }                     
                    M.toast({html: 'Bienvenido', classes: 'rounded'});
                    location.href = 'Home/index';                    
                    
            });            
        }

        function abrirVentana() {
              //Aca crea la ventana

              var myWindow = $("#window"),
                undo = $("#undo");

            undo.click(function() {
                myWindow.data("kendoWindow").open();
                undo.fadeOut();
            });

            function onClose() {
                undo.fadeIn();
            }

            myWindow.kendoWindow({
                width: "900px",
                title: "Registro de usuario",
                visible: false,
                actions: [
                    "Pin",
                    "Minimize",
                    "Maximize",
                    "Close"
                ],
                close: onClose
            }).data("kendoWindow").center().open();
        }  //acá termina abrir ventanax
        
        $(function() {
          $("#window").load('./Clientes/crear');
            $("#btnIniciar").kendoButton({
                icon: "login",
                click: onClick
            });
            $("#btnRegistro").kendoButton({
                icon: "user",
                click: () => {
                  abrirVentana();
                }
            });





        });


    </script>
    <style>
      body, html {
  height: 100%;
}

.bg {
  /* The image used */
  
 bottom:5px;
 right:5px;
 background: rgba(0, 0, 0, 1); 
 z-index:99;
 color:white;

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
#for_login { 
 opacity:1.0 !important;
 background-color: rgba(255,0,0, 1) !important;
 z-index:1;
 color:white;
}

    </style>
  </html>
        