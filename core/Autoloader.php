<?php
    class Autoloader{
        public function __construct(){
            $this->loadClasses();
        } 
        public function loadClasses(){
            //CARGA LAS CLASES LUEGO DE FORMATEAR LA RUTA
            spl_autoload_register(function($className){
                require_once preg_replace("/\\\\/", "/", $className).".php";
            });
        }
    }

new Autoloader();