<section id="buscador">
    <fieldset>
        <div class="container-input">
            <input onkeyup="buscar(this.value);" id="buscar" class="buscadorinpt" type="text" name="buscar" placeholder="Buscar empresa, sector o socio">
            <button type="submit"><i class="bi bi-search"></i></button>
        </div>
    </fieldset> 
</section>
<section id="totalEmpresas">
    <div class="centro">
        <h4>Total de empresas: <?= $totalEmpresas->Empresas ?></h4>
    </div>
</section>
<main>
    <!-- CONTENEDOR DE TARJETAS -->
    <div id="datos_buscador">
        <?php foreach($empresas as $r) : ?>
            <div class="container-card">
                <div class="container">
                    <div class="card">
                        <input type="hidden" name="ID" <?=$r->id_socio?> >
                        <div class="container-img">
                            <img src="/aws/cana/<?=$r->logo?>"  alt="logo">
                        </div>
                        <div id="content-card">
                            <h2> <?=$r->nomEmpresa?> </h2>
                            <div class="sector espaciado">
                                <h3>SECTOR: </h3>
                                <p> <?=$r->sector?> </p>
                            </div>
                            <div class="content-p">
                                <div class="socio espaciado">
                                    <h3>SOCIO: </h3>
                                    <p> <?=$r->nomSocio?> </p>
                                </div>
                                <div class="telefono espaciado">
                                    <h3>TELEFONO: </h3>
                                    <p> <?=$r->numCelular?> </p>
                                </div>
                            </div>
                            <div class="correo espaciado">
                                <h3>CORREO ELECTRONICO: </h3>
                                <p> <?=$r->email?></p>
                            </div>
                            <!-- <div class="direcciones">
                                <div class="box1">
                                    <p>colonia: <?=$r->colonia ?></p>
                                    <p>calle: <?=$r->calle?></p>
                                    <p>C.P: <?=$r-> codigo_postal?></p>
                                </div>
                                <div class="box2">
                                    <p>No. E: <?=$r->no_exterior?></p>
                                    <p>No. I: <?=$r->no_interior?></p>
                                    <p>mun: <?=$r->municipio?></p>
                                </div>
                            </div> -->
                        </div>
                    </div>                
                </div>
            </div>
        <?php endforeach;?>
    </div>
</main>

