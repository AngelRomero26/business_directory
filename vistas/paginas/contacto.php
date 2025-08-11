<section>
    <div class="card-container-contacto">
        <?php foreach($contactos as $c): ?>
            <div class="card-contacto">
                <img src="/aws/cana/<?=$c->imgContacto?>" alt="foto 1">
                <div class="card-content-contacto">
                    <h3><?=$c->puestoContacto?></h3>
                    <h4><?=$c->nomContacto?></h4>
                    <p><?=$c->desContacto?> voluptatibus aut, magni nostrum illo ullam iure.</p>
                    <p>num tel: <?=$c->numContacto?></p>
                    <p>correo: <?=$c->emailContacto?></p>
                    <!-- <a href="" class="btn">Read More</a> -->
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>
