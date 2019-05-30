<?php
    class App{
        protected $controller = "HomeController";
        protected $method = "actionIndex";
        protected $params = [];

        public function __construct(){
            //OBTENGO CONTROLADOR, METODO Y PARAMETROS
            $url = $this->parseUrl(); 
            $controllerName = ucfirst(strtolower($url[0]))."Controller";
            
            //VERIFICO SI EXISTE EL ARCHIVO CON EL NOMBRE DEL CONTROLADOR Y LO GUARDO EN EL ATRIBUTO CONTROLLER
            if(file_exists(APP_PATH."controllers/".$controllerName.".php")){
                $this->controller = "app\\controllers\\".$controllerName;
                unset($url[0]);
            }
            require APP_PATH."controllers/".$controllerName.".php";
            $this->controller = new $this->controller;

            //VERIFICO SI EXISTE METODO Y LO GUARDO EN EL ATRIBUTO METODO
            if(isset($url[1])){
                $methodName = "action".ucfirst(strtolower($url[1]));
                if(method_exists($this->controller, $methodName)){
                    $this->method = $methodName;
                    unset($url[1]);
                }
            }

            //VERIFICO SI EXISTEN PARAMETROS Y LOS AÑADO AL CONTROLADOR Y AL METODO
            $this->params = $url ? array_values($url): $this->params;

            call_user_func_array([$this->controller,$this->method], $this->params);
        }
        public function parseUrl(){
            //OBTENGO LA URL SI EXISTE Y RETORNO SUS PARTES EN UN ARRAY
            if(isset($_GET["url"])){
                return explode("/", filter_var(rtrim($_GET["url"], "/"),FILTER_SANITIZE_URL));
            }
        }
    }