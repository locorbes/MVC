<?php
    chdir(dirname(__DIR__));

    //DEFINO RUTAS EN CONSTANTES
    define("CORE_PATH", "core/");
    define("APP_PATH", "app/");
    
    require CORE_PATH."Autoloader.php";

    $app = new App();
    