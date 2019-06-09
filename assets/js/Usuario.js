function ValidarUsuario() {
    correo_u = $('#user_correo').val();
    clave_u = $('#user_clave').val();

    parametros = {
        "correo_u": correo_u,
        "clave_u": clave_u
    }

    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'controllers/UsuarioController.php?operador=validar_usuario',
        beforeSend: function() {},
        success: function(response) {
            //console.log(response);
            if (response == "success") {
                location.href = "pages/welcome.php";
            } else if (response == "notfound") {
                msg = '<div class="alert alert-danger mb-2" role="alert"><strong> Oh no !</strong> ' +
                    'Los datos son incorrectos.</div>';
            } else if (response == "required") {
                msg = '<div class="alert alert-danger mb-2" role="alert"><strong> Oh no !</strong> ' +
                    'Tiene que completar todos los datos.</div>';
            }
            $('#status-login').html(msg);
            LimpiarController();
        }

    });
}

function LimpiarController() {
    $('#user_correo').val("");
    $('#user_clave').val("");
}