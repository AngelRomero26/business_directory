<?php
    require_once "modelos/conexion.php";

    if(!isset($_GET['c'])){

        require_once "controladores/empresa.controlador.php";

        $controlador = new EmpresaControlador();

        call_user_func(array($controlador, "Inicio"));

    }else{

        $controlador = $_GET['c'];

        require_once "controladores/$controlador.controlador.php";

        $controlador = ucwords($controlador)."Controlador";

        $controlador = new $controlador;

        $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";

        call_user_func(array($controlador, $accion));
    }
