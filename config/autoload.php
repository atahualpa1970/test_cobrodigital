<?php namespace config;

    // autoloader para cargar las clases y a partir de "namespace\Clase"
    class Autoload
    {
        public static function run()
        {
            spl_autoload_register(
                function($class)
                {
                    $route = str_replace("\\", "/", $class) . ".php";
                    include_once($route);
                }
            );
        }
    }
?>