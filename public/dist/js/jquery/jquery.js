$(document).ready(function () {
    $("#categoria_id").change(function () {
        var id=$(this).val();
        var ruta=id+"/getSubCategorias";
        getSubCategoriasByCategoria(ruta);
    });
});


function getSubCategoriasByCategoria(ruta) {
    $.get(ruta,function (response) {

        $("#subCategoria_id").removeAttr("disabled");
        $("#subCategoria_id").empty();
        $("#subCategoria_id").append("<option disabled selected value=''>Seleccione una Sub Categoria</option>");
        $.each(response,function (i) {
            $("#subCategoria_id").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
        });

    },"json");
}