<?php
    class MainController{
        public function index(){
            //BUSQUEDA DE USUARIO EN BD
            $user = User::find(1);
            //SE ENVIA COMO PARAMETRO EL NOMBRE DE LA VISTA Y VALORES EN UN ARRAY ASOCIATIVO 
            if($user){
                Response::render("home", ["name"=>$user->name, "surname"=>$user->surname]);
            }else{
                Response::render("home");
            }
        }
        public function about(){
            echo "about";
        }
    }