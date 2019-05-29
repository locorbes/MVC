<?php
    class Router{
        private static $routes = [];

        private function __construct(){
            
        }
        //AGREGA AL ARRAY STATIC::ROUTE CON LOS INDECES CONTROLLER Y METHOD
        public static function add($route, $controller, $method){
            static::$routes[$route] = ['controller'=>$controller, 'method'=>$method];
        }
        //SI EXISTE LA RUTA EN EL ARRAY STATIC::ROUTE, RETORNA EL ARRAY ROUTES
        public static function getAction($route){
            if(array_key_exists($route, static::$routes)){
                return static::$routes[$route];
            }else{
                throw new Exception("La ruta ".$route." no ha sido encontrada.");
            }
        }
    }