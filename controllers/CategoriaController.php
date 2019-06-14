<?php 
require "../models/Categoria.php";

$categoria = new Categoria();

switch($_REQUEST["operador"]){
    case "listar_categorias":
        $datos = $categoria->ListarCategorias();
        if($datos){
            for($i = 0; $i<count($datos); $i++){
                $list[] = array(
                    "op" => '<div class="btn-group">
                                <button class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon-gear"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"><i class="icon-edit"></i> Editar</a>
                                    <a class="dropdown-item"><i class="icon-trash"></i> Eliminar</a>
                                </div>
                            </div>',
                    "id" => $datos[$i]['categoria_id'],
                    "nombre" => $datos[$i]['nombre_c'],
                    "descripcion" => $datos[$i]['descripcion_c'],
                    "estado" => ($datos[$i]['estado'] == 1)?'<div class="tag tag-success">Activo</div>':
                                                            '<div class="tag tag-danger">Inactivo</div>'
                );
            }
            $resultados = array(
                "sEcho" => 1,
                "iTotalRecords" => count($list),
                "iTotalDisplayRecords" => count($list),
                "aaData" => $list
            );
        }
        echo json_encode($resultados);
        
    break;

    case "registrar_categoria":
        if(isset($_POST["nombre"],$_POST["descripcion"]) && !empty($_POST["nombre"]) && !empty($_POST["descripcion"]))
        {
            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            if($categoria->RegistrarCategoria($nombre,$descripcion))
            {
                $response = "success";
            } else {
                $response = "error";
            }
        }
        else{
            $response = "required";
        }

        echo $response;
    break;
}

?>