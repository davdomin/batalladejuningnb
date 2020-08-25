
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
    </head>

    <body>
          <div class="bg">
        <h1>Batalla de Junin GNB</h1>
        <div class="card  white darken-1" id="for_login">
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
                    <div class="input-field col s10">
                        <button id="btnIniciar">Iniciar sesión</button>
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
        
        $(function() {
            $("#btnIniciar").kendoButton({
                icon: "login",
                click: onClick
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
 background: rgba(64, 64, 64, 0.5);
 background-image: url("img/background.jpg");
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
 background-color: rgba(255,0,0, .5) !important;
 z-index:1;  
}

    </style>
  </html>
        