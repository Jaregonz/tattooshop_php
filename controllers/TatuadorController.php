<?php

    require_once "./models/TatuadorModel.php";

    class TatuadorController {

        private $tatuadorModel;
        public function __construct() {
            $this->tatuadorModel = new TatuadorModel();
        }

        /**
         * Método para mostrar el view de AltaCita -> Contiene la página para dar de alta una cita
         */
        public function showAltaTatuador($errores = []) {
            require_once "./views/tatuadoresViews/TatuadorAltaView.php";
        }

        public function insertTatuador($datos = []) {

            $input_nombre = $datos["input_nombre"] ?? "";
            $input_email = $datos["input_email"] ?? "";
            $input_password = $datos["input_password"] ?? "";
            $input_foto = $datos["input_foto"] ?? "";

            $errores = [];
            if($input_nombre == "" || $input_nombre == "" || $input_password == "" || $input_foto == "") {

                // COMPROBAMOS QUÉ CAMPO ESTÁ VACÍO Y LO AÑADÁIS A UN ARRAY DE ERRORES
                if($input_nombre == "") {
                    $errores["error_nombre"] = "El campo nombre es obligatorio";
                }

                if($input_email == "") {
                    $errores["error_email"] = "El campo email es obligatorio";
                }

                if($input_password == "") {
                    $errores["error_password"] = "La contraseña es obligatoria";
                }
                
                if($input_foto == "") {
                    $errores["error_foto"] = "El campo foto  es obligatorio";
                }

            }

            // SI $errores NO ESTÁ EMPTY, SIGNIFICA QUE HA HABIDO ERRORES
            if(!empty($errores)) {
                $this->showAltaTatuador($errores);
            } else {
        
                $operacionExitosa = $this->tatuadorModel->inserTatuador($input_nombre, $input_email, $input_password, $input_foto);


                if($operacionExitosa) {
                    require_once "./views/tatuadoresViews/TatuadorAltaCorrectaView.php";
                } else {
                    // LLAMAR A ALGÚN SITIO Y MOSTRAR UN MENSAJE DE ERROR
                    $errores["error_db"] = "Error al insertar la cita, intentelo de nuevo más tarde";
                    $this->showAltaTatuador($errores);
                }

            }

        }

    }

?>