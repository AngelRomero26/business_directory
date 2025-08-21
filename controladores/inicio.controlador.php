  <!-- ------SOLO USAR CUANDO HAYA UNA VISTA DE INICIO DIFERENTE------ -->
<?php
    require "modelos/empresa.modelo.php";

    class InicioControlador{

        private $modelo;

        public function __CONSTRUCT(){
            $this->modelo = new Empresa();
        }

        public function Inicio(){
            $vistaActual= "Inicio";
            require_once "vistas/paginas/modulos/encabezado.php";
            require_once "vistas/paginas/inicio.php";
            require_once "vistas/paginas/modulos/pie.php";
        }
    }
