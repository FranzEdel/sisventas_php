var table;

init();

//Funcion que se ejecutara al inicio
function init() {
    LlenarTablaCategoria();
}

//FUNCION PARA LLENAR TABLA CATEGORIA
function LlenarTablaCategoria() {
    table = $('#table_categoria').DataTable({
        pageLength: 10,
        responsive: true,
        processing: true,
        ajax: "../controllers/CategoriaController.php?operador=listar_categorias",
        columns: [
            { data: 'op' },
            { data: 'id' },
            { data: 'nombre' },
            { data: 'descripcion' },
            { data: 'estado' },
        ]
    });
}

//FUNCION  PARA REGISTRAR UNA CATEGORIA
function RegistrarCategoria() {
    nombre = $('#nombre_cat').val();
    descripcion = $('#descripcion_cat').val();
    parametros = {
        "nombre": nombre,
        "descripcion": descripcion
    }
    $.ajax({
        data: parametros,
        url: "../controllers/CategoriaController.php?operador=registrar_categoria",
        type: 'POST',
        beforeSend: function() {},
        success: function(response) {
            //console.log(response);
            if (response == "success") {
                table.ajax.reload();
                LimpiarControles();
                $('#create_categoria').modal('hide');
                toastr.success("Se guardo correctamente los datos", "Registro exitoso");
            } else if (response == "required") {
                toastr.error("Complete  todos los datos por favor", "Campos incompletos !!");
            } else {
                toastr.info("comuniquese con su Proveedor", "Error !!");
            }
        }
    })

}

function LimpiarControles() {
    $('#nombre_cat').val('');
    $('#descripcion_cat').val('');
}