<?php

    require "modelos/empresa.modelo.php";

    class InicioControlador{

        private $modelo;

        public function __CONSTRUCT(){
            $this->modelo = new Empresa();
        }

        public function Inicio(){
            $vistaActual= "Inicio";
            require_once "vistas/paginas/encabezado.php";
            // require_once "vistas/paginas/inicio.php";
            require_once "vistas/paginas/pie.php";

        }

        public function esVista(){

        }


    }

?>