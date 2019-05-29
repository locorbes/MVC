<?php
    chdir(dirname(__DIR__));

    //DEFINO RUTAS EN CONSTANTES
    define("SYS_PATH", "lib/");
    define("APP_PATH", "app/");
    
    //REQUIERO LOS ARCHIVOS NECESARIOS MEDIANTE LAS RUTAS CONSTANTES
    require SYS_PATH."Router.php";
    require APP_PATH."routes/routes.php";
    require SYS_PATH."Response.php";

    //OBTENGO LA URL SI EXISTE SINO REDIRECCIONA A HOME
    if(isset($_GET["url"])){
        $url = $_GET["url"];
    }else{
        $url = "home";
    }

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