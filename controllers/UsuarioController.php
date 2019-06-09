<?php 
session_start();
require "../models/Usuario.php";

$usuario = new Usuario();

switch($_REQUEST["operador"])
{

    case "validar_usuario":
        if(isset($_POST["correo_u"],$_POST["clave_u"]) && !empty($_POST["correo_u"] && $_POST["clave_u"]))
        {
            if($user = $usuario->ValidarUsuario($_POST["correo_u"],$_POST["clave_u"]))
            {
                foreach($user as $campos => $valor){
                    $_SESSION["user"][$campos] = $valor;
                }
                $response = "success";
            }
            else
            {
                $response = "notfound";
            }
        }
        else
        {
            $response = "required";
        }

        echo $response;

    break;

    case "cerrar_sesion":
        unset($_SESSION["user"]);
        header("location:../");
    break;
}


?>