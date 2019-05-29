<?php
    class MainController{
        public function index(){
            //SE ENVIA COMO PARAMETRO EL NOMBRE DE LA VISTA Y VALORES EN UN ARRAY ASOCIATIVO 
            Response::render("home", ["values"=>"usuario"]);
        }
        public function about(){
            echo "about";
        }
    }