<?php
    include "modelos/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles.css">
    <title>CANA</title>
</head>

<body>
    <div id="container">

        <header>
            <nav class="navbar">
                <div class="logo">Logo</div>
                <!-- <ul class="nav-links">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul> -->
            </nav>
        </header>

        <?php 

            function safe($value) {
                return htmlspecialchars($value ?? 'NO REGISTRADO', ENT_QUOTES, 'UTF-8');
            }
            $conexion = Conexion::conectar();

            $consulta = "SELECT 
            socios.nombre_socio,
            socios.num_celular,
            socios.correo_electronico,

            empresas.nombre_empresa,
            empresas.sector,
            empresas.logo

            FROM socios
            JOIN empresas ON empresas.socio_id = socios.id_socio
            ORDER BY socios.id_socio
            ";

            $ejecutar = $conexion -> query($consulta);

            while ($fila = $ejecutar->fetch(PDO::FETCH_ASSOC)) {
                //print_r($fila);
                //echo $fila["nombre_socio"];
                echo '
                    <!-- CONTENEDOR DE TARJETAS -->
                    <div class="container-targed">
                        <div class="container-images">';
                        
                            if(!empty($fila["logo"])){
                                echo '<img src= "' .htmlspecialchars($fila["logo"]). '" alt="logo_empresa">';
                            }else{
                                echo '<h3>Sin logo<h3>';
                            }
                        echo '</div>

                        <div class="container-information">
                            <div id="container-empresa">
                                <h2>' .htmlspecialchars($fila["nombre_empresa"]) .'</h2>
                            </div>
                            <div id="container-socio">
                                <h3 id="sector">' .safe($fila["sector"]) . '</h3>
                                <div id="contacto">
                                    <h3>' .htmlspecialchars($fila["nombre_socio"]) .'</h3>
                                    <h3> Telefono: ' .htmlspecialchars($fila["num_celular"]) .'</h3>
                                </div>
                                <h3> Correo electronico: ' .safe($fila["correo_electronico"]) .'</h3>
                            </div>
                        </div>
                    </div>
                ';/*fin comillas */
            /*fin while */}      
        /*fin php */?>
    </div>
            
    <div class="box1"></div>
    <div class="box2"></div>
    <div class="box3"></div>
    <div class="box4"></div>


</body>

</html>