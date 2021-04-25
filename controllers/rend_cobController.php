<?php namespace controllers;

    class rend_cobController
    {
        public function read($file)
        {
            $data_read = file($file);
            foreach ($data_read as $key => $value)
            {
                $datos = substr($value, 0, 4);
                if ($datos == "0360" || $datos == "0370")
                {
                    $data_process[$key]['nro_transaccion'] = substr($value, 52, 15);
                    $data_process[$key]['monto'] = number_format(substr($value, 75, 14), 2, ",", "");
                    $data_process[$key]['identificador'] = substr($value, 4, 22);
                    $date = strtotime(substr($value, 67, 4)."-".substr($value, 71, 2)."-".substr($value, 73, 2));
                    $data_process[$key]['fecha_pago'] = date('Y-m-d', $date);
                    $data_process[$key]['fecha_generacion'] = date('Y-m-d', strtotime('now'));
                    $data_process[$key]['medio_de_pago'] = "";
                }
            }
            return $data_process;
        }
    }
?>