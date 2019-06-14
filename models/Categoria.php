<?php 
require "../config/Conexion.php";

class Categoria{
    public $conexion;

    function __construct()
    {
        $this->conexion = Conexion::ConectarDB();
    }

    //FUNCION PARA LISTAR LOS DATOS DE LAS CATEGORIAS

    function ListarCategorias()
    {
        $query = "SELECT * FROM categorias";
        $result = $this->conexion->prepare($query);
        if($result->execute()){
            if($result->rowCount() > 0){
                while($fila = $result->fetch(PDO::FETCH_ASSOC)){
                    $datos[] = $fila;
                }
                return $datos;
            }
        }
        return false;
    }

    //FUNCION PARA REGISTRAR UNA CATEGORIA
    function RegistrarCategoria($nombre,$descripcion)
    {
        $query = "INSERT INTO categorias(nombre_c, descripcion_c) VALUES(?, ?)";
        $result = $this->conexion->prepare($query);
        $result->bindParam(1,$nombre);
        $result->bindParam(2,$descripcion);
        if($result->execute())
        {
            return true;
        }
        return false;

    }
}




?>