<?php namespace config;

    class Router
    {
        public static function run(Request $request)
        {
            $controller = $request->getController() . "Controller";
            $route = ROOT . "controllers" . DS . $controller . ".php";
            $method = $request->getMethod();
            $argument = $request->getArgument();
            if (is_readable($route)) 
            {
                require_once($route);
                $name = "controllers\\" . $controller;
                $controller = new $name;
                if (!isset($argument)) {
                    call_user_func(array($controller, $method));
                } else {
                    call_user_func_array(array($controller, $method), $argument);
                }
            }
        }
    }
?>