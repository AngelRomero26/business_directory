<?php

    require_once "modelos/contacto.modelo.php";
    class ContactoControlador{

        private $modelo;

         public function __CONSTRUCT(){
            $this->modelo = new Contacto();
        }

        public function Inicio(){
            $contactos = $this->ctrMostrarContactos();
       
            require_once "vistas/paginas/encabezado.php";
            require_once "vistas/paginas/contacto.php";
            require_once "vistas/paginas/pie.php";


        }

        public function ctrMostrarContactos(){
            return $this->modelo->mdlMostrarContactos();
        }
    }