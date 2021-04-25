<?php namespace controllers;

class entesController
    {
        public function read($file)
        {
            $data_read = file($file);
            foreach ($data_read as $key => $value)
            {
                $datos = substr($value, 0, 8);
                if ($datos == "DATOS   ")
                {
                    $data_process[$key]['nro_transaccion'] = substr($value, 40, 8);
                    $data_process[$key]['monto'] = number_format(substr($value, 77, 11), 2, ",", "");
                    $data_process[$key]['identificador'] = substr($value, 58, 19);
                    $date = strtotime(substr($value, 224, 2)."-".substr($value, 226, 2)."-".substr($value, 228, 2));
                    $data_process[$key]['fecha_pago'] = date('Y-m-d', $date);
                    $data_process[$key]['fecha_generacion'] = date('Y-m-d', strtotime('now'));
                    $data_process[$key]['medio_de_pago'] = substr($value, 247, 2);
                }
            }
            return $data_process;
        }
    }
?>