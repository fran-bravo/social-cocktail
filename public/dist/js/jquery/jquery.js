$(document).ready(function () {

    var pathname = window.location.pathname;
    var URLdomain = window.location.host

    if (pathname=="/registro" || pathname=="/login"){
        $("#body").removeClass("skin-red sidebar-mini");
        $("#body").addClass("hold-transition register-page");
    }

    var cantIngredientes=0;
    var count=0;
    var editBtn=$('li[name=rowInfo]');
    var imgSalida=$('#imgSalida');
    setTextareaHeight($("#contenido"));

    var userImagen=$("#userImagen");
    //Ocultar img de previsualizacion carga foto usuario
    imgSalida.hide();


    $("#seguirBtn").click(function (e) {
        e.preventDefault();
        e.stopPropagation();

        var action = "http://"+URLdomain+"/setSeguidor/"+$("#userId").text();
        var actionDejar="http://"+URLdomain+"/removeSeguidor/"+$("#userId").text();
        eventSeguirBtn($(this), action,actionDejar);
    });
    
    $("#dejarSeguirBtn").click(function (e) {
        e.preventDefault();
        e.stopPropagation();

        var action = "http://"+URLdomain+"/removeSeguidor/"+$("#userId").text();
        var actionSeguir = "http://"+URLdomain+"/setSeguidor/"+$("#userId").text();
        eventDejarSeguirBtn($(this),action,actionSeguir);
    });
    
    
    
    
    //SET COMENTARIO COCTEL
    $("#formSetComentarioCoctel").submit(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var form=$(this);
        var action="http://"+URLdomain+"/setComentario";

        $.ajax({
                url: action,
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function () {
                    $("#load").html("<div><img src='../imagenes/icons/ajax-loader.gif'></div>");
                }
            })
            .done(function (res) {
                var divComentarios=form.parent().siblings("[name=comentarios]");
                divComentarios.addClass("box-footer box-comments");
                divComentarios.append('' +
                    '<div hidden="hidden" class="box-comment"> ' +
                    '<img class="img-circle img-sm" src="'+userImagen.attr("src")+'" alt="User Image"> ' +
                    '<div class="comment-text"> ' +
                    '<span class="username">' +
                    $("#nombreUserLog").text() +
                    '<span class="text-muted pull-right">Hace un momento</span> ' +
                    '</span>' +
                    form.find("[name=contenido]").val()+
                    '   </div> ' +
                    '</div>');
                divComentarios.children().last().toggle("blind");
                form.find("[name=contenido]").val("")
                console.log(res);
            })
            .error(function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                var json=JSON.parse(jqXHR.responseText);
                for (var pos in json){
                    setErrorMessage(form.find(".contenidoC"),json[pos]);
                }
            })
            .always(function () {
                $("#load").empty();
            })

    });

    
    //GET COMENTARIOS BY PUBLICACION
    $("[name=getComentarios]").click(function (e) {

        var action=$(this).attr("href");
        var obj=$(this);
        e.preventDefault();
        e.stopPropagation();
        $.ajax({
                url: action,
                method: "GET",
                dataType: 'json',
                beforeSend: function () {
                    $("#load").html("<div><img src='../imagenes/icons/ajax-loader.gif'></div>");
                }
            })
            .done(function (res) {
                var divComentarios = obj.parent().parent().siblings("[name=comentarios]");
                divComentarios.addClass("box-footer box-comments");
                divComentarios.html("");
                divComentarios.attr("hidden","hidden");

                for(var i=0; i<res.length; i++ ){
                    divComentarios.append('' +
                        '<div class="box-comment"> ' +
                             '<img class="img-circle img-sm" src="http://'+URLdomain+'/imagenes/users/'+res[i].usuario.imagen+'" alt="User Image"> ' +
                            '<div class="comment-text"> ' +
                                 '<span class="username">' +
                                        res[i].usuario.name +' '+res[i].usuario.lastName+
                                        '<span class="text-muted pull-right">'+res[i].created_at+'</span> ' +
                                    '</span>' +
                                res[i].contenido+
                        '    </div> ' +
                        '</div>');
                }
                divComentarios.toggle("blind");
            })
            .error(function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                var json=JSON.parse(jqXHR.responseText);
                for (var pos in json){
                    setErrorMessage($("#"+pos),json[pos]);
                }
            })
            .always(function () {
                $("#load").empty();
            })

    });
    

    $("[name=submitComentario]").click(function (e) {
        var form = $(this).parents("form");
        var contenido=form.find(".contenidoC");
        if (contenido.val() =="" || contenido.val()== null){
            setErrorMessage(contenido,"El campo es requerido");
            return false;
        }
    });

    $(".contenidoC").focusin(function () {
        cleanElement($(this));
        var form = $(this).parents("form");
        form.off("submit");
        form.submit(function (e) {
            e.preventDefault();
            e.stopPropagation();

            var action="http://"+URLdomain+"/setComentario";

            $.ajax({
                    url: action,
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function () {
                        $("#load").html("<div><img src='../imagenes/icons/ajax-loader.gif'></div>");
                    }
                })
                .done(function (res) {
                    var divComentarios=form.parent().siblings("[name=comentarios]");
                    divComentarios.addClass("box-footer box-comments");
                    divComentarios.append('' +
                        '<div hidden="hidden" class="box-comment"> ' +
                            '<img class="img-circle img-sm" src="'+userImagen.attr("src")+'" alt="User Image"> ' +
                            '<div class="comment-text"> ' +
                                '<span class="username">' +
                                    $("#nombreUserLog").text() +
                                    '<span class="text-muted pull-right">Hace un momento</span> ' +
                                '</span>' +
                            form.find("[name=contenido]").val()+
                        '   </div> ' +
                        '</div>');
                    divComentarios.children().last().toggle("blind");
                    form.find("[name=contenido]").val("")
                    console.log(res);
                })
                .error(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.responseText);
                    var json=JSON.parse(jqXHR.responseText);
                    for (var pos in json){
                        setErrorMessage(form.find(".contenidoC"),json[pos]);
                    }
                })
                .always(function () {
                    $("#load").empty();
                })
        });




    });
    

    //SET PUBLICACION 
    $("#submitPublicacion").click(function () {
        //TODO validar los datos
    });
    
    $("#formSetPublicacion").submit(function (e) {
        var contenido=$("#contenido");
        contenido.click(function () {
            cleanElement($(this));
        });
        e.preventDefault();
        e.stopPropagation();
        var action="/setPublicacion";
        $.ajax({
                url: action,
                method: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function () {
                    $("#load").html("<div><img src='../imagenes/icons/ajax-loader.gif'></div>");
                }
            })
            .done(function (res) {
                contenido.attr("style","height: 48%");
                $("#contentIndex").prepend('' +
                    '<div id="nuevaPublicacion" hidden="hidden" class="box box-widget">' +
                    '    <div class="box-header with-border">' +
                    '        <div class="user-block"> ' +
                    '           <img class="img-circle" src="'+userImagen.attr("src")+'" alt="User Image"> ' +
                    '           <span class="username">' +
                    '               <a href="#">'+$("#nombreUserLog").text()+'</a>' +
                '                   </span> ' +
                '                   <span class="description">Pensar - Hace un momento</span> ' +
                '            </div> ' +
                '            <div class="box-tools"> ' +
                    '           <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read"> ' +
                '                   <i class="fa fa-circle-o"></i></button> <button type="button" class="btn btn-box-tool" data-widget="collapse">' +
                '                   <i class="fa fa-minus"></i> </button> <button type="button" class="btn btn-box-tool" data-widget="remove">' +
                '                   <i class="fa fa-times"></i></button> </div> </div> <div class="box-body"> <p>'+contenido.val()+'</p> ' +
                '                   <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button> ' +
                '                   <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button> ' +
                '                   <span class="pull-right text-muted">0 likes - 0 comments</span> </div> ' +
                     '</div>'
                );
                contenido.val("");
                $("#nuevaPublicacion").toggle("blind");
                console.log(res);
            })
            .error(function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                var json=JSON.parse(jqXHR.responseText);
                for (var pos in json){
                    setErrorMessage($("#"+pos),json[pos]);
                }
            })
            .always(function () {
                $("#load").empty();
            })
    });
    
//SET PROPINA DESDE COCTEL REDUCIDO
    $("a[name=setPropinaA]").click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var idCoctel=$(this).siblings("input").val();
        var actionSet="http://"+URLdomain+"/setPropina/"+idCoctel;
        var actionGet="http://"+URLdomain+"/getPropina/"+idCoctel;
        setPropina(actionSet,$(this),1);
    });


//SET PROPINA DESDE PERFIL COCTEL

    $("#setPropina").click(function (e) {
        e.preventDefault();
        e.stopPropagation();

        var idCoctel=$("#idCoctel").val();
        var actionSet="http://"+URLdomain+"/setPropina/"+idCoctel;
        var actionGet="http://"+URLdomain+"/getPropina/"+idCoctel;

        setPropina(actionSet, $(this),0);
        showPropina(actionGet);

    });



    $("#img").fancybox({});
    $(":file").filestyle({
        buttonText:"Seleccionar",
        iconName:"fa fa-file-image-o",
    });

    $("#imagen").siblings("div").find("input").attr("id","nombreFile");

    $("#cancelarPopup").click(function () {
        $("#imagen").val("");
        $("#nombreFile").val("");
        $("#divCImg").html("");
    });

    
    $('#imagen').change(function(e) {
        addImage(e);
    });

    $("#formCambiarImagenPerfil").submit(function (e) {

        var f = $(this);
        var action="/usuario/update";
        e.preventDefault();
        e.stopPropagation();
        var formData= new FormData(f[0]);

        $.ajax({
                url: action,
                method: "POST",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $("#load").html("<div><img src='../imagenes/icons/ajax-loader.gif'></div>");
                }
            })
            .done(function (res) {
                console.log(res);
                location.reload();

            })
            .error(function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                var json=JSON.parse(jqXHR.responseText);
                for (var pos in json){
                    setErrorMessage($("#"+pos),json[pos]);
                }
            })
            .always(function () {
                $("#load").empty();
            })

    });

    $("#submitImg").click(function () {
        var imagen=$("#imagen");
        if (imagen.val()==""){
            setErrorMessage(imagen,"El campo es requerido");
            return false;
        }
        if ($('#cropw').val() == 0 || $('#croph').val() == 0){
            setErrorMessage(imagen,"Seleccione un area en la imagen");
            return false;
        }
        return true;
    });

    $("#imagen").click(function () {
        cleanElement($(this));
    })
    
    addEvent();

    function addEvent() {
        editBtn.mouseover(function () {
            $(this).find("a[name=editBtn]").removeAttr("hidden");
        });
        editBtn.mouseout(function () {
            $(this).find("a[name=editBtn]").attr("hidden","hidden");
        });
        editBtn.find("a[name=editBtn]").click(function () {
            var padre=$(this).parent().parent();
            padre.addClass("box-comments");
            var valor=$(this).siblings("p[name=valor]").text();
            var campo=padre.find("b[name=titulo]");
            var div=$(this).parent();
            var divPadre = div.html();
            var nombreInput=campo.siblings('p[name=nameInput]');
            var entrada=null;
            var type="text";
            if (nombreInput.text()=="nacimiento"){
                type="date";
            }
            entrada=getInputModificarCampo(nombreInput.text(),campo.text(),type);



            $(this).parent().html(" " +
                "<form name='form"+nombreInput.text()+"'>" +
                "        <div class='row'>" +
                "           <div class='col-md-2'>" +
                "           </div>" +
                "           <div class='col-md-4'>" +
                "                   <div class='form-group'>" +
                                   entrada+
                                        " <span name='message' class='help-block'></span>"+
                "                     </div>" +
                "           </div>" +
                "           <div class='col-md-2'>" +
                "               <button name='btn"+nombreInput.text()+"' type='submit' class='btn btn-block btn-success btn-sm'><i class='fa fa-fw fa-check'></i></button>" +
                "           </div>" +
                "           <div class='col-md-2'>" +
                "               <button name='cancelar' type='button' class='btn btn-block btn-danger btn-sm'><i class='fa fa-fw fa-close'></i></button>" +
                "           </div>" +
                "           <div class='col-md-1'>" +
                                "<div id='load'></div>" +
            "               </div>" +
                "       </div>" +
                "<form> ");


            if ($("#pais_id").html()!=undefined){
                getPaisesJSON(valor);
            }


            var input=padre.find("[name="+nombreInput.text()+"]");
            var form=$("form[name=form"+nombreInput.text()+"]");

            $("button[name=cancelar]").click(function () {
                //var form=$(this).parent().parent().parent();
                form.parent().html(divPadre);
                div.parent().removeClass("box-comments");
                addEvent();
            });

            $("button[name=btn"+nombreInput.text()+"]").click(function () {
                var t=$("input[name="+nombreInput.text()+"]");
                if(t.val()==""){
                    setErrorMessage(t,"El campo es requerido");
                    return false;
                }
                return true;
            });

            input.focusin(function () {
                cleanElement(input);
            });

            form.submit(function (e) {
                e.preventDefault();
                e.stopPropagation();
                $.ajax({
                        url: "/usuario/update",
                        method: "POST",
                        data: $(this).serialize(),
                        dataType: 'json',
                        beforeSend: function () {
                            $("#load").html("<div><img src='../imagenes/icons/ajax-loader.gif'></div>");
                        }
                    })
                    .done(function (res) {
                        form.parent().html(divPadre);
                        div.parent().removeClass("box-comments");
                        addEvent();
                        var valSalida=input.val();
                        if (nombreInput.text()=="pais_id"){
                            valSalida=input.find("option:selected").text();
                        }
                        $("#val"+form.find("[name="+nombreInput.text()+"]").attr("name")).text(valSalida);
                        console.log(res);
                    })
                    .error(function (jqXHR, textStatus, errorThrown) {
                        var json=JSON.parse(jqXHR.responseText);
                        for (var pos in json){
                            setErrorMessage($("input[name="+pos+"]"),json[pos]);
                        }
                    })
                    .always(function () {
                        $("#load").empty();
                    })
            });

        });
    }

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
        var f = $(this);
        var action=f.attr("action");
        $("#ingredientes").siblings("span").empty();
        e.preventDefault();
        e.stopPropagation();
        var formData= new FormData(f[0]);

        $.ajax({
            url: action,
            method: "POST",
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function () {
                $("#load").html("<div><img src='imagenes/icons/ajax-loader.gif'></div>");
            }
        })
            .done(function (res) {
                console.log(res);
                location.reload();

            })
            .error(function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
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

function getInputModificarCampo(nombreInput, campo,type) {
    if(nombreInput=="pais_id"){
        return "<select id='pais_id' name='pais_id' class='form-control'></select>";
    }else {
        return "<input name='" + nombreInput + "' placeholder='" + campo + "' type='" + type + "' class='form-control'>";
    }
}

function getPaisesJSON(valor) {
    $.get("/paisesJSON", function (response) {
    var select=$("#pais_id");
        for(indice in response){

            if (valor==response[indice].nombre){
                select.append("<option selected value='"+response[indice].id+"'>"+response[indice].nombre+"</option>");
            }else {
                select.append("<option value='"+response[indice].id+"'>"+response[indice].nombre+"</option>");
            }
            //console.log(response[indice].nombre);
        }
    }, "json");
}

//Previsualizacion de imagen
function addImage(e){
    var file = e.target.files[0],
        imageType = /image.*/;

    if (!file.type.match(imageType))
        return;

    var reader = new FileReader();
    reader.onload = fileOnload;
    reader.readAsDataURL(file);
}

function fileOnload(e) {
    $("#imgSalida").toggle("blind");
    $("#imgSalida").remove();
    $(".ui-effects-wrapper").remove();
    $("#divCImg").append(
        '<img style="border: none" width="100%" height="100%" id="imgSalida" src="" />'
    );
    $("#divCImg").find("p").remove();
    var result=e.target.result;
    var imgSalida=$('#imgSalida');
    imgSalida.attr("src",result);
    imgSalida.hide();
    imgSalida.toggle("blind");
    imgSalida.Jcrop({
        bgColor: 'black',
        opacity: 1,
        aspectRatio: 1,
        onSelect: updateCoords,
        setSelect: [ 10,50,150,150 ],

    });
    $(".jcrop-active").removeAttr("style");


    function updateCoords(c) {
        cleanElement($("#imagen"));
        $('#cropx').val(c.x);
        $('#cropy').val(c.y);
        $('#cropw').val(c.w);
        $('#croph').val(c.h);
        $('#height').val(imgSalida.height());
        $('#width').val(imgSalida.width());
    }

}

function setPropina(action, objeto, opcion) {


    //Envia y guarda propina
    $.ajax({
            url: action,
            method: "POST",
            data: {
                _token:_token
            },
            dataType:"JSON",
            beforeSend: function () {
                $("#load").html("<div><img src='../imagenes/icons/ajax-loader.gif'></div>");
            }
        })
        .done(function (res) {
            console.log(res);
            if (opcion==0){
                objeto.attr("class","btn btn-danger btn-block disabled");
                objeto.children("b").text("Haz dejado propína");
            }
            if (opcion==1){
                objeto.attr("disabled","disabled");
                objeto.attr("style","color:green");
                objeto.off("click");
            }
        })
        .error(function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(jqXHR.responseText);
            console.log(errorThrown);
            if (jqXHR.status!=200){
                alert("Error, intente nuevamente mas tarde");
            }
        })
        .always(function () {
            $("#load").empty();
        })
}

function showPropina(action) {
    //Devuelve la cantidad de propina del coctel actualizada
    $.ajax({
            url: action,
            method: "GET",
            beforeSend: function () {
                $("#load").html("<div><img src='../imagenes/icons/ajax-loader.gif'></div>");
            }
        })
        .done(function (res) {
            $("#showPropina").text("$ "+res);
        })
        .error(function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText);
        })
        .always(function () {
            $("#load").empty();
        })
}

//ajusta tamaño de textArea
function setTextareaHeight(textareas) {
    textareas.each(function () {
        var textarea = $(this);

        if ( !textarea.hasClass('autoHeightDone') ) {
            textarea.addClass('autoHeightDone');

            var extraHeight = parseInt(textarea.css('padding-top')) + parseInt(textarea.css('padding-bottom')), // to set total height - padding size
                h = textarea[0].scrollHeight - extraHeight;

            // init height
            textarea.height('auto').height(h);

            textarea.bind('keyup', function() {

                textarea.removeAttr('style'); // no funciona el height auto

                h = textarea.get(0).scrollHeight - extraHeight;

                textarea.height(h+'px'); // set new height
            });
        }
    })
}

function eventSeguirBtn(boton, action, actionDejar) {


    $.ajax({
            url: action,
            method: "POST",
            data: {
                _token:_token
            },
            dataType: 'json',
            beforeSend: function () {
                $("#load").html("<div><img src='../imagenes/icons/ajax-loader.gif'></div>");
            }
        })
        .done(function (res) {
            boton.removeClass("btn-success");
            boton.addClass("btn-danger");
            boton.html("<b>Dejar de seguir</b>");
            boton.attr("id","dejarSeguirBtn");

            boton.off("click");

            $("#dejarSeguirBtn").click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                eventDejarSeguirBtn($(this),actionDejar,action);
            });

            console.log(res);
        })
        .error(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText);
            console.log(jqXHR.responseText);
        })
        .always(function () {
            $("#load").empty();
        })
}

function eventDejarSeguirBtn(boton,action,actionSeguir) {
    $.ajax({
            url: action,
            method: "POST",
            data: {
                _token:_token
            },
            dataType: 'json',
            beforeSend: function () {
                $("#load").html("<div><img src='../imagenes/icons/ajax-loader.gif'></div>");
            }
        })
        .done(function (res) {
            boton.removeClass("btn-danger");
            boton.addClass("btn-success");
            boton.html("<b>Seguir</b>");
            boton.attr("id","seguirBtn");

            boton.off("click");

            $("#seguirBtn").click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                eventSeguirBtn($(this),actionSeguir,action);
            });

            console.log(res);
        })
        .error(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText);
            console.log(jqXHR.responseText);
        })
        .always(function () {
            $("#load").empty();
        })
}