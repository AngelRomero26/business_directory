<?php
    require_once "conexion.php";

    class Contacto{

        private $pdo;
        public function __CONSTRUCT(){
            $this->pdo = Conexion::Conectar();
        }

        public function mdlMostrarContactos(){

            try{
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM contactos;"
                );
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

    }