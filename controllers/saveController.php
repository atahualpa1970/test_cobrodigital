<?php namespace controllers;

    use models\Transactions;

    class saveController
    {
        public function save($data)
            {
                foreach ($data as $value)
                {
                    $array_values[] = "('" . implode("', '", array_values($value)) . "')";
                }   
                $fields = "(" . implode(", ", array_keys($data[1])) . ")";
                $values = implode(",", $array_values);

                $data_save = new Transactions;
                $data_save->set('fields', $fields);
                $data_save->set('values', $values);
                return $data_save->add();
            }
    }
            
?>