<?php namespace config;

    class Request
    {
        private $controller;
        private $method;
        private $argument;

        public function __construct()
        {
            if (isset($_GET['url']))
            {
                $route = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL); 
                $route = explode("/", $route);
                $route = array_filter($route);
                $this->controller = strtolower(array_shift($route));
                $this->method = strtolower(array_shift($route));
                if (!$this->method) {
                    $this->method = "index";
                }
                $this->argument = $route;
            }    
        }

        public function getController()
        {
            return $this->controller;
        }
        
        public function getMethod()
        {
            return $this->method;
        }

        public function getArgument()
        {
            return $this->argument;
        }
    }
?>