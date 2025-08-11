<section>
    <?php if(!empty($empresas)) : ?>
        <?php foreach($empresas as $e):?>
            <div class="container-card">
                <div class="container">
                    <div class="card">
                        <input type="hidden" name="ID" <?=$e->id_socio?> >
                        <div class="container-img">
                            <img src="/aws/cana/<?=$e->logo?>"  alt="logo">
                        </div>
                        <div id="content-card">
                            <h2> <?=$e->nomEmpresa?> </h2>
                            <div class="sector centrado">
                                <h3>SECTOR: </h3>
                                <p> <?=$e->sector?> </p>
                            </div>

                            <div class="content-p">
                                <div class="socio centrado">
                                    <h3>SOCIO: </h3>
                                    <p> <?=$e->nomSocio?> </p>
                                </div>
                                <div class="telefono centrado">
                                    <h3>TELEFONO: </h3>
                                    <p> <?=$e->numCelular?> </p>
                                </div>
                            </div>

                            <div class="correo centrado">
                                <h3>CORREO ELECTRONICO: </h3>
                                <p> <?=$e->email?></p>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        <?php endforeach;?>
    <?php else: ?>
        <p> No hay empresas</p>
    <?php endif; ?>
</section>

