<img src="img/login.png" />
<span class="card-title">Iniciar sesión</span>        
<div class="row">
    <div class="row">
        <div class="input-field col s10">
        <input placeholder="Cedula" id="txtCedula" type="text" class="validate k-textbox">
        <label for="txtCedula">Cedula</label>
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
<script>
function onClick(data) {
    var cedula = $("#txtCedula").val();
    var password = $("#txtPassword").val();
    $.post( "User/sesion", {
        cedula: cedula,
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
}  //acá termina abrir ventanax
$(function() {
    $("#btnIniciar").kendoButton({
        icon: "login",
        click: onClick
    });
    $("#btnRegistro").kendoButton({
        icon: "user",
        click: () => {
            $("#content").load('./Clientes/crear'); 
        }
    });
});
</script>


