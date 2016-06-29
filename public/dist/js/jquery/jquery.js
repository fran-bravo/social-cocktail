$(document).ready(function () {

    var pathname = window.location.pathname;

    if (pathname=="/registro" || pathname=="/login"){
        $("#body").removeClass("skin-red sidebar-mini");
        $("#body").addClass("hold-transition register-page");
    }

    var cantIngredientes=0;
    var count=0;

    $('li[name=rowInfo]').mouseover(function () {
        $(this).find("a[name=editBtn]").removeAttr("hidden");
    });
    $('li[name=rowInfo]').mouseout(function () {
        $(this).find("a[name=editBtn]").attr("hidden","hidden");
    });

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

    $("#loginForm").submit(function (e) {

        var action=$(this).attr("action");
        e.preventDefault();
        e.stopPropagation();
        $.ajax({
                url: action,
                method: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function () {
                    $("#load").html("<div><img src='imagenes/icons/ajax-loader.gif'></div>");
                }
            })
            .done(function (res) {
                if (res=="1"){
                    window.location.href = "/";
                }else {
                    setErrorMessage($("#email"),"Email y/o contraseña erroneos");
                }
            })
            .error(function (jqXHR, textStatus, errorThrown) {

            })
            .always(function () {
                $("#load").empty();
            })

    });


    $("#createUserByUser").submit(function (e) {

        var action=$(this).attr("action");
        e.preventDefault();
        e.stopPropagation();
        $.ajax({
                url: action,
                method: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function () {
                    $("#load").html("<div><img src='imagenes/icons/ajax-loader.gif'></div>");
                }
            })
            .done(function (res) {
                window.location.href = "/";
            })
            .error(function (jqXHR, textStatus, errorThrown) {
                var json=JSON.parse(jqXHR.responseText);
                for (var pos in json){
                    setErrorMessage($("#"+pos),json[pos]);
                }
            })
            .always(function () {
                $("#load").empty();
            })

    });


    $("#formCreateCoctel").submit(function (e) {
        var action=$("#formCreateCoctel").attr("action");
        $("#ingredientes").siblings("span").empty();
        e.preventDefault();
        e.stopPropagation();
        $.ajax({
            url: action,
            method: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function () {
                $("#load").html("<div><img src='imagenes/icons/ajax-loader.gif'></div>");
            }
        })
            .done(function (res) {
                //console.log(res);
                location.reload();

            })
            .error(function (jqXHR, textStatus, errorThrown) {
                var json=JSON.parse(jqXHR.responseText);
                for (var pos in json){
                    setErrorMessage($("#"+pos),json[pos]);
                }
            })
            .always(function () {
                $("#load").empty();
            })

    });

    $("#terms").focusin(function () {
        cleanElement($(this));
    });

    $("#password_confirmation").focusin(function () {
        cleanElement($(this));
    });

    $("#password").focusin(function () {
        cleanElement($(this));
    });

    $("#email").focusin(function () {
        cleanElement($(this));
    });

    $("#lastName").focusin(function () {
        cleanElement($(this));
    });

    $("#name").focusin(function () {
        cleanElement($(this));
    });

    $("#nombre").focusin(function () {
        cleanElement($(this));
    });

    $("#tipoCoctel").change(function () {
        cleanElement($(this));
    });

    $("#metodo").change(function () {
        cleanElement($(this));
    });

    $("#cristal").change(function () {
        cleanElement($(this));
    });

    $("#preparacion").focusin(function () {
        cleanElement($(this));
    });

    $("#crearCoctel").click(function () {
        var nombre=$("#nombre").val();
        var salida=true;
        if (!validateNombre()){
            salida=false;
        }
        if (isEmptyElement($("#tipoCoctel"))){
            salida=false;
        }
        if (isEmptyElement($("#cristal"))){
            salida=false;
        }
        if (isEmptyElement($("#metodo"))){
            salida=false;
        }
        if (isEmptyElement($("#preparacion")) || isCorrectTam($("#preparacion"),500)){
            salida=false;
        }

        return salida;
    });
});

function isCorrectTam(elemento,tam) {
    var val=elemento.val();

    if (val.length>tam){
        setErrorMessage(elemento,"Tamaño maximo de caracteres 500")
        return true;
    }
    return false;
}

function isEmptyElement(elemento) {
    var val=elemento.val();
    if(val!=null && val!=""){
        return false;
    }else {
        setErrorMessage(elemento,"Campo requerido");
        return true;
    }
}

function setErrorMessage(elemento,mensaje) {
    elemento.parent().addClass("has-error");
    elemento.siblings("span[name='message']").empty();
    elemento.siblings("span[name='message']").append(mensaje);
}

function cleanElement(elemento) {
    elemento.parent().removeClass("has-error");
    elemento.siblings("span").empty();
}

function validateNombre() {
    var nombre=$("#nombre").val();
    if (nombre==""){
        $("#nombre").parent().addClass("has-error");
        $("#messageNombre").empty();
        $("#messageNombre").append("Campo requerido");
        return false;
    }
    if (nombre.length>40){
        $("#nombre").parent().addClass("has-error");
        $("#messageNombre").empty();
        $("#messageNombre").append("Longitud máxima 40 caracteres");
        return false;
    }

    return true;
}

function isNombreUsed(nombre) {
    if (nombre!="") {
        var salida=false;
        var ruta = "validate/nombreCoctel/" + nombre;

       $.get(ruta, function (response) {
            if (response=="1") {
                $("#nombre").parent().addClass("has-error");
                $("#messageNombre").empty();
                $("#messageNombre").append("El nombre ya esta en uso");
                $("#load").empty();
                salida=true;
            }else {
                $("#load").empty();
                salida=false;
            }

        }, "json");
        alert(salida);
        return salida;
    }
}

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
    // "ingredientes[]"
    var texts=getTextIngredientes();
    var values=getValuesIngrediente();
    var tr="<tr hidden id='"+ cantIngredientes +"'> " +
        "<td>"+ texts["categoria"] +
            "<input name='ingredientes["+cantIngredientes+"][categoria_id]' hidden value='"+values["categoria"]+"'>" +
        "</td> " +
        "<td>"+texts["subCategoria"]+"" +
        "   <input name='ingredientes["+cantIngredientes+"][subcategoria_id]' hidden value='"+values["subCategoria"]+"'>" +
        "</td> " +
        "</td> " +
        "<td>"+texts["marca"]+"" +
        "   <input name='ingredientes["+cantIngredientes+"][marca_id]' hidden value='"+values["marca"]+"'>" +
        "</td> " +
        "</td> " +
        "<td>"+texts["cantidad"]+"" +
        "   <input name='ingredientes["+cantIngredientes+"][cantidad]' hidden value='"+values["cantidad"]+"'>" +
        "</td> " +
        "</td> " +
        "<td>"+texts["unidad"]+
          "<input name='ingredientes["+cantIngredientes+"][unidad_medida]' hidden value='"+values["unidad"]+"'>" +
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