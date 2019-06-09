<?php 

require "models/Usuario.php";

$usuario = new Usuario();

$num_doc = "777777";
$nombre_u = "Carla";
$apellido_u = "Perez";
$correo_u = "mail@mail.com";
$clave_u = "franzedel";

/*
  if($usuario->RegistrarUsuario($num_doc,$nombre_u,$apellido_u,$correo_u,$clave_u)){
      echo "Registro Exitoso";
  }else{
      echo "Error :(";
 }

*/ 
    if($usuario->ValidarUsuario($correo_u,$clave_u)){
      echo "Usuario encontrado";
    }else{
        echo "Usuario No encontrado";
    }


?>