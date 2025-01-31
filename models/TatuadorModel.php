<?php

    require_once "./database/DBHAndler.php";
    class TatuadorModel {
        private $nombreTabla = "tatuadores";
        private $conexion;             
        private $dbHandler;             

        public function __construct() {

            $this->dbHandler = new DBHandler("localhost","root","","tattoos_bd","3306");
        }
        /**
         * MÉTODO PARA INSERTAR UNA CITA EN LA BASE DE DATOS
         * @param mixed $id
         * @param mixed $descripcion
         * @param mixed $fechaCita
         * @param mixed $cliente
         * @param mixed $tatuador
         * @return bool
         */
        public function inserTatuador($nombre, $email, $password, $foto) {
            $this->conexion = $this->dbHandler->conectar();
            
            $creadoEn = date("Y-m-d");
            $sql = "INSERT INTO $this->nombreTabla (nombre, email, password, foto, creado_en) VALUES (?, ?, ?, ?,?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt-> bind_param("sssss", $nombre, $email, $password, $foto, $creadoEn);

            try {
                return $stmt->execute();
            } catch(Exception $e) {
                return false;
            } finally {
                $this->dbHandler->desconectar();
            }
        }

        public function getAllTatuadores() {
            $this->conexion = $this->dbHandler->conectar();
            
            $creadoEn = date("Y-m-d");
            $sql = "SELECT * FROM $this->nombreTabla";
            $stmt = $this->conexion->prepare($sql);

            $stmt->execute();
            $resultado = $stmt->get_result(); //EXTRAEMOS EL RESULTADO OBTENIDO

            $tatuadores = [];
            while($fila = $resultado->fetch_assoc()){
                $tatuadores[] = $fila;
            }
            $stmt->close();
            $this->dbHandler->desconectar();

            return $tatuadores;
        }

        public function getByNombre($nombreTatuador): mixed {
            $this->conexion = $this->dbHandler->conectar();
            
            $sql = "SELECT * FROM $this->nombreTabla WHERE nombre = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt-> bind_param("s", $nombreTatuador);

            $stmt->execute();
            $resultado = $stmt->get_result(); 

            $tatuadores = [];
            while($fila = $resultado->fetch_assoc()){
                $tatuadores[] = $fila;
            }
            $stmt->close();
            $this->dbHandler->desconectar();

            return $tatuadores[0];
        }
    }
    
?>
