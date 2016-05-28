$(document).ready(function () {

    var cantIngredientes=0;
    var count=0;


    $("#marca_id").change(function () {
        emptyMessagesErrorIngredients();
    });

    $("#cantidad").focusin(function () {
        emptyMessagesErrorIngredients();
    });

    $("#unidadMedida").change(function () {
        emptyMessagesErrorIngredients();
    });

    $("#categoria_id").change(function () {
        emptyMessagesErrorIngredients();
        $("#load").html("<div><img src='imagenes/icons/ajax-loader.gif'></div>");
        var id=$(this).val();
        var ruta=id+"/getSubCategorias";

        getSubCategoriasByCategoria(ruta);

    });


    $("#subCategoria_id").change(function () {
        emptyMessagesErrorIngredients();
        $("#load").html("<div><img src='imagenes/icons/ajax-loader.gif'></div>");
        var id=$(this).val();

        setMarcasBySubCategoria(id);
        enableCantidad();
        setTipoIngredienteBySubCategoria(id);

    });


    $("#addIngrediente").click(function () {
        emptyMessagesErrorIngredients();
        if (validateElements()){
            if (count<10){
                addIngredientToTable(cantIngredientes);
                addSelectorsToFinal();
                showIngredient(cantIngredientes);

                var id="#"+cantIngredientes;

                addEventClickDelete();


                if (count>=9){
                    //$("#selectores").fadeOut();
                    disabledSelectors();
                    messageErrorIngredients("Cantidad de ingredientes maxima alcanzada");
                    disableAddIngredient();
                }
                cantIngredientes++;
                count++;

                defaultSelectors();

            }else {

            }

            function addEventClickDelete() {
                $(id).on("click", "a.delete",function () {
                    //TODO hacer que el fadeOut termine antes de que lo elimine
                    $(id).fadeOut();
                    enableCategoria();
                    defaultCategoria();
                    //$("#selectores").fadeIn();
                    enableAddingredient();
                    emptyMessagesErrorIngredients();
                    $(id).remove();
                    count--;
                });
            }
        }else {
            messageErrorIngredients("Complete todos los campos");
        }


    });
});

function enableAddingredient() {
    $("#addIngrediente").removeAttr("disabled");
}

function disableAddIngredient() {
    $("#addIngrediente").prop("disabled","disabled");
}

function messageErrorIngredients(message) {
    $("#messageIngredients").prepend("<p class='text-red'>"+message+"</p>");
}

function emptyMessagesErrorIngredients() {
    $("#messageIngredients").empty();
}

function validateElements() {
    return validateElement(getCategoria()) && validateElement(getSubCategoria()) &&
        validateMarca(getMarca()) && validateCantidad() && validateUnidadMedida();
}

function validateElement(val) {
    if (isNull(val))
        return false;
    if (isNotNumeric(val))
        return false;
    if (isMenorCero(val))
        return false;
    if (isDecimal(val))
        return false;

    return true;
}

function validateMarca(val) {
    if (!isNull(val)){
        if (isNotNumeric(val))
            return false;
        if (isMenorCero(val))
            return false;
        if (isDecimal(val))
            return false;
    }
    return true;
}

function validateCantidad() {
    var val=getCantidad();

    if (isNull(val))
        return false;
    if (isNotNumeric(val))
        return false;
    if (isMenorCero(val))
        return false;

    return true;
}

function validateUnidadMedida() {
    var val=getUnidadMedida();

    if (isNull(val))
        return false;

    return true;
}

function isNull(val) {
    return val===null;
}

function isNotNumeric(val) {
    return isNaN(val);
}

function isMenorCero(val) {
    return val<=0
}

function isDecimal(val) {
    return val % 1 != 0;
}

function getCategoria() {
    return $("#categoria_id").val();
}

function getSubCategoria() {
    return $("#subCategoria_id").val();
}

function getMarca() {
    return $("#marca_id").val();
}

function getCantidad() {
    return $("#cantidad").val();
}

function getUnidadMedida() {
    return $("#unidadMedida").val();
}

function addIngredientToTable(cantidadIngredientes) {
    var cant=cantidadIngredientes++;
    var row=getRowIngredient(cant);
    $("#tbIngredientes").append(row);
}

function addSelectorsToFinal() {
    $("#selectores").appendTo($("#tbIngredientes"));
}

function showIngredient(cantidadIngredientes) {
    var temp=cantidadIngredientes;
    $("#"+temp+"").fadeIn();
}

function getRowIngredient(cantIngredientes) {
    var texts=getTextIngredientes();
    var values=getValuesIngrediente();
    var tr="<tr hidden id='"+ cantIngredientes +"'> " +
        "<td>"+ texts["categoria"] +
            "<input name='categoria_"+cantIngredientes+"' hidden value='"+values["categoria"]+"'>" +
        "</td> " +
        "<td>"+texts["subCategoria"]+"" +
        "   <input name='subCategoria_"+cantIngredientes+"' hidden value='"+values["subCategoria"]+"'>" +
        "</td> " +
        "</td> " +
        "<td>"+texts["marca"]+"" +
        "   <input name='marca_"+cantIngredientes+"' hidden value='"+values["marca"]+"'>" +
        "</td> " +
        "</td> " +
        "<td>"+texts["cantidad"]+"" +
        "   <input name='cantidad_"+cantIngredientes+"' hidden value='"+values["cantidad"]+"'>" +
        "</td> " +
        "</td> " +
        "<td>"+texts["unidad"]+
          "<input name='unidad_"+cantIngredientes+"' hidden value='"+values["unidad"]+"'>" +
        "</td> " +
        "</td> " +
        "<td>" +
        "<a class='aremove aing delete' title='Eliminar' >" +
            "<i class='fa fa-fw fa-remove'></i>" +
        "</a>" +
        "</td> " +
        "</tr>";

    return tr.toString();
}

function getTextIngredientes() {
    var categoria=$("#categoria_id option:selected").text();
    var subCategoria=$("#subCategoria_id option:selected").text();
    var marca=$("#marca_id option:selected").text();
    var cantidad=$("#cantidad").val();
    var unidad=$("#unidadMedida option:selected").text();

    var texts={
        "categoria":categoria,
        "subCategoria":subCategoria,
        "marca":marca,
        "cantidad":cantidad,
        "unidad":unidad
    };

    return texts;
}

function getValuesIngrediente() {
    var categoria=$("#categoria_id").val();
    var subCategoria=$("#subCategoria_id").val();
    var marca=$("#marca_id").val();
    var cantidad=$("#cantidad").val();
    var unidad=$("#unidadMedida").val();

    var valores={
        "categoria":categoria,
        "subCategoria":subCategoria,
        "marca":marca,
        "cantidad":cantidad,
        "unidad":unidad
    };

    return valores;
}

function getTipoIngredienteBySubCategoria(ruta) {
    $.get(ruta, function (response) {

        enableUnidadMedida();

        var uniLiquido =["CL","ML","L","Oz"];
        var uniSolido=["Unidad","MG","G"];

        $("#unidadMedida").append(
            "<option disabled selected value=''>Seleccione</option>"
        );

        if (response.tipo === "Líquido"){
            for (var i=0; i<uniLiquido.length; i++){
                $("#unidadMedida").append(
                    "<option value='"+uniLiquido[0]+"'>"+uniLiquido[i]+"</option>"
                );
            }
        }else{
            for (var i=0; i<uniSolido.length; i++){
                $("#unidadMedida").append(
                    "<option value='"+uniSolido[0]+"'>"+uniSolido[i]+"</option>"
                );
            }
        }
            $("#load").empty();
    },
        "json");
}

function setTipoIngredienteBySubCategoria(id) {
    var ruta=id+"/getSubCategoria";
    getTipoIngredienteBySubCategoria(ruta);
}

function setMarcasBySubCategoria(id) {
    var ruta=id+"/getMarcas";
    getMarcasBySubCategoria(ruta);
}

function getSubCategoriasByCategoria(ruta) {
    $.get(ruta,function (response) {

            enableSubCategoria();
            defaultMarca();
            defaultUnidadMedida();
            defaultCantidad();

            $("#subCategoria_id").append("<option disabled selected value=''>Seleccione</option>");
            $.each(response,function (i) {
                $("#subCategoria_id").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
            });
            $("#load").empty();
        },
        "json"
    );
}

function getMarcasBySubCategoria(ruta) {
    $.get(ruta,function (response) {
        if (response.length > 0){
            enableMarca();
            $("#marca_id").append("<option disabled selected value=''>Seleccione</option>");
            $.each(response,function (i) {
                $("#marca_id").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
            });
        }else {
            defaultMarca();
        }
    },"json");
}

function disabledSelectors() {
    defaultSelectors();
    disableCategoria();
}

function enableUnidadMedida() {

    enableElementById("unidadMedida");
}

function enableMarca() {
    enableElementById("marca_id");
}

function enableSubCategoria() {
    enableElementById("subCategoria_id");
}

function enableCategoria() {
    $("#categoria_id").removeAttr("disabled");
}

function enableCantidad() {
    $("#cantidad").removeAttr("disabled");
}

function enableElementById(id) {
    $("#"+id).removeAttr("disabled");
    $("#"+id).empty();
}

function defaultMarca() {
    defaultElementById("marca_id");
}

function defaultUnidadMedida() {
    defaultElementById("unidadMedida")
}

function defaultCantidad() {
    $("#cantidad").val("");
    $("#cantidad").prop("disabled","disabled");
}

function defaultSubCategoria() {
    defaultElementById("subCategoria_id")
}

function defaultCategoria() {
    $("#categoriaDefault").prop("selected","selected");
}

function defaultElementById(id) {
    $("#"+id).empty();
    $("#"+id).prop("disabled","disabled");
}

function disableCategoria() {
    $("#categoria_id").prop("disabled","disabled");

}

function defaultSelectors() {
    defaultMarca();
    defaultCantidad();
    defaultUnidadMedida();
    defaultSubCategoria();
    defaultCategoria();
}