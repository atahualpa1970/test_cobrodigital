<?php namespace models;

    class Transactions
    {
        private $id;
        private $nro_transaccion;
        private $monto;
        private $identificador;
        private $fecha_pago;
        private $fecha_generacion;
        private $medio_de_pago;
        private $conn;
        private $fields;
        private $values;

        public function __construct()
        {
            $this->conn = new Connect();
        }

        public function set($attrib, $content)
        {
            $this->$attrib = $content;
        }

        public function get($attrib)
        {
            return $this->$attrib;
        }

        public function list()
        {
            $sql = "SELECT * FROM transacciones";
            $data = $this->conn->consultSQL($sql);
            return $data;
        }

        public function add()
        {
            $sql = "INSERT INTO transacciones {$this->fields} VALUES {$this->values}";
            return $this->conn->consultSQL($sql);
        }

        public function delete()
        {
            $sql = "DELETE FROM transacciones WHERE id = '{$this->id}'";
            $this->conn->consultSQL($sql);
        }

        public function update()
        {
            $sql = "UPDATE transacciones SET 
                nro_transaccion = '{$this->nro_transaccion}',
                monto = '{$this->monto}',
                identificador = '{$this->identificador}',
                fecha_pago = '{$this->fecha_pago}',
                fecha_generación = '{$this->fecha_generacion}',
                medio_de_pago = '{$this->medio_de_pago}'
                WHERE id = '{$this->id}'
                ";
            $this->conn->consultSQL($sql);
        }

        public function view()
        {
            $sql = "SELECT * FROM transacciones 
                    WHERE id = '{$this->id}'";
            $data = $this->conn->consultSQL($sql);
            $row = mysqli_fetch_assoc($data);
            return $row;
        }
    };
?>