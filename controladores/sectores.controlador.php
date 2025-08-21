<?php 
    require_once "modelos/sectores.modelo.php";

    class SectoresControlador{

        public function __CONSTRUCT(){
            $this->modelo = new Sector();
        }

        public function Inicio(){   
            require_once "vistas/paginas/modulos/encabezado.php";
            require_once "vistas/paginas/sectores.php";
            require_once "vistas/paginas/modulos/pie.php";
        }

        public function ctrFiltrado(){

            $sectorAbrev = $_GET['sector'] ?? null;
            $empresas = [];

            $sectores = [
                'siABT' => 'Sector De Industria De Alimentos, Bebidas y Tabacos',
                'siBC' => 'Sector Industrial De Bienes De Capital',
                'sID' => 'Sector De Las Industrias Diversas',
                'siAPCE' => 'Sector De La Industria Elaboradora de Articulos De Papel, Cartón y Escritorio',
                'siEV' => 'Sector Industrial De Economía Verde',
                'siFPMPC' => 'Sector Industrial de Fabricantes de Productos y Materiales para la Construcción',
                'siMM' => 'Sector Industrial Metal Mecanica',
                'siTICS' => 'Sector Industrial De Tecnología Para La Información y Economía Del Conocimiento',
                'siQP' => 'Sector De La Industria Química y Paraquímica',
                'siAU' => 'Sector De La Industria Automotriz',
                'siMD' => 'Sector Industrial Médico',
                'siAG' => 'Sector Industrial Agroindustrial',
                'siMB' => 'Sector Industrial Mueblero',
                'siTS' => 'Sector de Industriales Técnicos y de Servicio',
                'SN' => 'Sin Clasificar'
            ];

            if($sectorAbrev === 'SN') {   
                $empresas = $this->modelo->mdlMostrarEmpresasSinSector();
                
            }elseif($sectorAbrev && isset($sectores[$sectorAbrev])){
                $sectorReal = $sectores[$sectorAbrev];
                $empresas = $this->modelo->mdlMostrarSectores($sectorReal);
            }

            require_once "vistas/paginas/modulos/encabezado.php";
            require "vistas/paginas/filtrado.php";
            require_once "vistas/paginas/modulos/pie.php";
        }
    }