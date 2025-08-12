console.log(buscar);

$(document).ready(function() {
    $("#buscar").on("keyup", function() {
        let valor = $(this).val();
        buscar(valor);
    });
});

function buscar(buscar){
    
    let parametros = {"buscar":buscar};
    $.ajax({
        data:parametros,
        type: 'POST', 
        url: 'index.php?c=empresa&a=ctrBuscador',
        success: function(data){
            console.log(parametros),
            $("#datos_buscador").html(data);
            console.log(data);
        },
        error: function(xhr, status, error){
            console.log("Ajax error: ", status, error);
            console.log("Response Text: ", xhr.responseText);
        }
    });
}