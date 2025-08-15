console.log(buscar);

$(document).ready(function() {
    $("#buscar").on("keyup", function() {
        let valor = $(this).val();
        buscar(valor);
    });
});

function buscar(buscar){
    if(buscar.trim() === ""){
        location.reload();
        return;
    }
    let parametros = {"buscar":buscar};
    $.ajax({
        url: 'index.php?c=empresa&a=ctrBuscador',
        type: 'POST', 
        data:parametros,
        dataType:"json",
        success: function(data){
            let html = "";
            if(data.empresas.length > 0){
                data.empresas.forEach(function(r){
                    html +=`
                        <div class="container-card">
                            <div class="container">
                                <div class="card">
                                    <div class="container-img">
                                        <img src="/aws/cana/${r.logo}" alt="logo">
                                    </div>
                                    <div id="content-card">
                                        <h2>${r.nomEmpresa}</h2>
                                        <div class="sector centrado">
                                            <h3>SECTOR: </h3>
                                            <p>${r.sector}</p>
                                        </div>
                                        <div class="content-p">
                                            <div class="socio centrado">
                                                <h3>SOCIO: </h3>
                                                <p>${r.nomSocio}</p>
                                            </div>
                                            <div class="telefono centrado">
                                                <h3>TELEFONO: </h3>
                                                <p>${r.numCelular}</p>
                                            </div>
                                        </div>
                                        <div class="correo centrado">
                                            <h3>CORREO ELECTRONICO: </h3>
                                            <p>${r.email}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $(".centro h4").text("Total de empresas: " + data.numero);
            }else{
                html = `<h3 class="no-resultado">No se encontraron resultados.</h3>`;
                $(".centro h4").remove();
            }
            console.log(parametros),
            $("#datos_buscador").html(html);

            console.log(data);
        },
        error: function(xhr, status, error){
            console.log("Ajax error: ", status, error);
            console.log("Response Text: ", xhr.responseText);
        }
    });
}