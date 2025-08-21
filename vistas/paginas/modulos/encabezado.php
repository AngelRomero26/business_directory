<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canacintra</title>
    <link rel="icon" href="/aws/cana/assets/img/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="http://localhost/aws/cana/assets/css/styles.css">   
</head>
<body>
    <header>
        <div class="container-nav">
            <div class="logo"><a href="index.php"><img src="/aws/cana/assets/img/logo_canacintra_home.png" alt="logo_principal" id="logoP"></a></div>
            <nav>
                <ul>
                    <?php 
                        $vistaActual = $_GET['c'] ?? null; 

                        if ($vistaActual !== "sectores" && $vistaActual !== "contacto" ): ?>
                            <li><a href="index.php?c=sectores">Sectores</a></li> 
                            <li><a href="index.php?c=contacto">Contacto</a></li> 
                          
                        <?php else: ?> 

                            <a href="#" onclick="window.history.back(); return false;"><i class="bi bi-arrow-left"></i></a>

                        <?php endif; ?>
                        
                </ul>
            </nav>
        </div>
    </header>