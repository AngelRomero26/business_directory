$(document).ready(function() {
    $("#buscar").on("keyup", function() {
        let valor = $(this).val();
        buscar(valor);
    });
});

function buscar(buscar){
    let parametros = {"buscar":buscar};

    if(buscar.trim() === ""){
        $("datos_buscador").empty();
        return;
    }

    $.ajax({
        data:parametros,
        type: 'POST', 
        url: 'index.php?c=empresa&a=ctrBuscador',
        success: function(data){
            $("#datos_buscador").html(data);
        }
    });
}