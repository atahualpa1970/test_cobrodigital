<?php namespace controllers;

    class exportController
    {
        public function export($data, $filename, $type)
        {
            switch($type)
            {
                case "TXT":
                    $data_export = "";
                    $filename = "./extras/exports/" . $filename . ".txt";
                    foreach ($data as $value)
                    {
                        $data_export .= str_pad($value['nro_transaccion'], 15, "0", STR_PAD_LEFT);
                        $data_export .= str_pad(str_replace(",", "", $value['monto']), 14, "0", STR_PAD_LEFT);
                        $data_export .= str_pad($value['identificador'], 22, " ", STR_PAD_RIGHT);
                        $data_export .= date("Ymd", strtotime($value['fecha_pago']));
                        $data_export .= str_pad($value['medio_de_pago'], 2, " ", STR_PAD_RIGHT);
                        $data_export .= PHP_EOL;                        
                    }
                    $this->save_file($data_export, $filename);
                break;

                case "CSV":
                    $data_export = "";
                    $filename = "./extras/exports/" . $filename . ".csv";
                    foreach ($data as $value)
                    {
                        $data_export .= str_pad($value['nro_transaccion'], 15, "0", STR_PAD_LEFT) . ",";
                        $data_export .= str_pad(str_replace(",", ".", $value['monto']), 14, "0", STR_PAD_LEFT) . ",";
                        $data_export .= str_pad($value['identificador'], 22, " ", STR_PAD_RIGHT) . ",";
                        $data_export .= date("Ymd", strtotime($value['fecha_pago'])) . ",";
                        $data_export .= str_pad($value['medio_de_pago'], 2, " ", STR_PAD_RIGHT);
                        $data_export .= PHP_EOL;                        
                    }
                    $this->save_file($data_export, $filename);
                break;

                case "XLS":
                    $data_export = "";
                    $filename = "./extras/exports/" . $filename . ".xls";

                    $mostrar_columnas = false;
                    foreach ($data as $value)
                    {
                        if(!$mostrar_columnas)
                        {
                            $data_export .= implode("\t", array_keys($value)) . "\n";
                            $mostrar_columnas = true;
                        }
                        $data_export .= implode("\t", array_values($value)) . "\n";
                        
                    }
                    $this->save_file($data_export, $filename);
                break;
            }
        }

        public function save_file($data_export, $filename)
        {
            $file = fopen($filename, 'w');
            fwrite($file, $data_export);
            fclose($file);
        }
    }
?>