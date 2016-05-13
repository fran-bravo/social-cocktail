$(document).ready(function () {
    $("#categoria_id").change(function () {
        var id=$(this).val();
        var ruta=id+"/getSubCategorias";
        getSubCategoriasByCategoria(ruta);
    });
});


function getSubCategoriasByCategoria(ruta) {
    $.get(ruta,function (response) {
        alert(response);
    });
}