<section id="contacto">
    <div class="card-container-contacto">
        <?php foreach($contactos as $c): ?>
            <div class="card-contacto">
                <div class="container-img-contacto">
                    <img src="/aws/cana/<?=$c->imgContacto?>" alt="foto">
                </div>
                <div class="card-content-contacto">
                    <h3><?=$c->puestoContacto?></h3>
                    <h4><?=$c->nomContacto?></h4>
                    <p>Telefono: <?=$c->numContacto?></p>
                    <p>Email: <?=$c->emailContacto?></p>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>
