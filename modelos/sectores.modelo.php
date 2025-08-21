<?php
    require_once "conexion.php";

    class Sector{

        private $pdo;
        
        public function __CONSTRUCT(){
            $this->pdo = Conexion::Conectar();
        }

        public function mdlMostrarSectores($sectorReal){
            try{
                $stmt = $this->pdo->prepare(
                    "SELECT     
                        socios.id_socio, 
                        socios.nomSocio, 
                        socios.numCelular, 
                        socios.email,

                        empresas.nomEmpresa,
                        empresas.sector,
                        empresas.logo

                    FROM socios
                    JOIN empresas ON empresas.socio_id = socios.id_socio
                    WHERE empresas.sector = :sector 
                ;");

                $stmt->bindParam(':sector', $sectorReal, PDO::PARAM_STR);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

    public function mdlMostrarEmpresasSinSector() {
        try {
            $stmt = $this->pdo->prepare(
                "SELECT     
                    socios.id_socio,
                    socios.nomSocio,
                    socios.numCelular,
                    socios.email,

                    empresas.nomEmpresa,
                    empresas.sector,
                    empresas.logo

                FROM socios
                JOIN empresas ON empresas.socio_id = socios.id_socio
                WHERE empresas.sector IS NULL OR empresas.sector = ''
            ;");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }catch(Exception $e) {
            die($e->getMessage());
        }
    }
}