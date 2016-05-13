$(document).ready(function () {
    $('#categoria_id').change(function () {
        var id=$('#categoria_id').val();
        var action=id+"/getSubCategorias";
        var method='GET';
        $.get(action,function (response) {
            alert(response);
        });
    });
})