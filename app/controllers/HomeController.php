<?php
    namespace app\controllers;
    use app\models\User;
    use \Controller;
    use \Response;

    class HomeController extends Controller{
        public function actionIndex($id){
            //BUSQUEDA DE USUARIO EN BD
            $user = User::find($id);
            //SE ENVIA COMO PARAMETRO EL NOMBRE DE LA VISTA Y VALORES EN UN ARRAY ASOCIATIVO 
            if($user){
                Response::render("homeView", ["name"=>$user->name, "surname"=>$user->surname]);
            }else{
                Response::render("homeView");
            }
        }
        public function actionAbout(){
            echo "about";
        }
    }