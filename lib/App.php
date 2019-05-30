<?php
    class App{
        public function __construct(){
            $url = $this->parseUrl();

            //OBTENGO LA ACCION ASOCIADA A LA URL Y SU RESPECTIVO METODO Y CONTROLADOR
            try{
                $act = Router::getAction($url);
                $controllerName = $act["controller"];
                $method = $act["method"];

                require APP_PATH."controllers/".$controllerName.".php";
                $controller = new $controllerName();
                $controller->$method();

            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
        public function parseUrl(){
            //OBTENGO LA URL SI EXISTE
            if(isset($_GET["url"])){
                return $_GET["url"];
            }
        }
    }