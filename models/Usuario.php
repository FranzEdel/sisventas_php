<?php

require "../config/Conexion.php";

class Usuario {

    public $conexion;

    function __construct()
    {
        $this->conexion  = Conexion::ConectarDB();
    }

    function RegistrarUsuario($num_doc,$nombre_u,$apellido_u,$correo_u,$clave_u)
    {
        $query = "INSERT INTO usuarios(num_doc,nombre_u,apellido_u,correo_u,clave_u) VALUES (?,?,?,?,?)";

        $result = $this->conexion->prepare($query);
        $result->bindParam(1,$num_doc);
        $result->bindParam(2,$nombre_u);
        $result->bindParam(3,$apellido_u);
        $result->bindParam(4,$correo_u);
        
        $clave_hash = password_hash($clave_u,PASSWORD_DEFAULT);
        $result->bindParam(5,$clave_hash);

        if($result->execute())
        {
            return true;
        }
        return false;
    }

    function ValidarUsuario($correo_u,$clave_u)
    {
        $query = "SELECT * FROM usuarios WHERE correo_u = ?";
        $result = $this->conexion->prepare($query);
        $result->bindParam(1,$correo_u);
        $result->execute();
        $fila = $result->fetch();
        //var_dump($fila);
        //echo $clave_u;
        if(password_verify($clave_u,$fila['clave_u'])){
            return $fila;
        }
        else{
            return false;
        }
        
    }
}

?>