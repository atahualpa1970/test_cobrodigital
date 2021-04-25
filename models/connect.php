<?php namespace models;

use mysqli;

class Connect
    {
        private $config = array(
            "host" => "localhost",
            "username" => "cobrodigital",
            "password" => "TestSSR",
            "dbname" => "cobrodigital"
        );

        private $conn;

        public function __construct()
        {
            $this->conn = new mysqli(
                $this->config['host'],
                $this->config['username'],
                $this->config['password'],
                $this->config['dbname']
            );
        }

        public function consultSQL($sql)
        {
            $data = $this->conn->query($sql);
            return $data;
        }
    }
?>