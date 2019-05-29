<?php
//RENDERIZA LAS VISTAS
    class Response{
        private function __construct(){}
        
        public static function render($view, $vars=[]){
        //SI EXISTEN, SE CREA UNA VARIABLE POR CADA PARAMETRO VARS
            foreach ($vars as $key => $value) {
                $$key=$value;
            }
        //REQUERIMOS LA VISTA
            require APP_PATH."views/".$view.".php";
        }
    }