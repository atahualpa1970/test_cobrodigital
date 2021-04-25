<?php

    // Variables para el concatenado de url
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', realpath(dirname(__FILE__)) . DS);

    // Autoload para carga de clases
    require_once ("config/autoload.php");
    config\Autoload::run();

    // Rutas para APIs
    config\Router::run(new config\Request());
       
    // Procesar archivo 888ENTES
    $file = "extras/txt_import/888ENTES5723_308.txt";
    $entes = new controllers\entesController;
    print "<h3>Leyendo archivo: " . $file . "</h3>";
    $entes_data = $entes->read($file);

    $entes_save = new controllers\saveController;
    print "<h4>Guardando en BD</h4>";
    $entes_save->save($entes_data);

    $filename = "888entes";
    $entes_export = new controllers\exportController;
    print "<h4>Exportando a TXT, CSV y Excell(" . $filename .")</h4>";
    $entes_export->export($entes_data, $filename, "TXT");
    $entes_export->export($entes_data, $filename, "CSV");
    $entes_export->export($entes_data, $filename, "XLS");
    

    // Procesar archivo REND.COB
    $file = "extras/txt_import/REND.COB-COBC8496.COB-20191125.TXT";
    $rendcob = new controllers\rend_cobController;
    print "<h3>Leyendo archivo: " . $file . "</h3>";
    $rendcob_data = $rendcob->read($file);

    $rendcob_save = new controllers\saveController;
    print "<h4>Guardando en BD</h4>";
    $rendcob_save->save($rendcob_data);

    $filename = "rend_cob";
    $rendcob_export = new controllers\exportController;
    print "<h4>Exportando a TXT, CSV y Excell(" . $filename .")</h4>";
    $rendcob_export->export($rendcob_data, $filename, "TXT");
    $rendcob_export->export($rendcob_data, $filename, "CSV");
    $rendcob_export->export($rendcob_data, $filename, "XLS");


    // Procesar archivo REND.REV
    $file = "extras/txt_import/REND.REV-REVC8496.REV-20191125.TXT";
    $rendrev = new controllers\rend_revController;
    print "<h3>Leyendo archivo: " . $file . "</h3>";
    $rendrev_data = $rendrev->read($file);

    $rendrev_save = new controllers\saveController;
    print "<h4>Guardando en BD</h4>";
    $rendrev_save->save($rendrev_data);

    $filename = "rend_rev";
    $rendrev_export = new controllers\exportController;
    print "<h4>Exportando a TXT, CSV y Excell(" . $filename .")</h4>";
    $rendrev_export->export($rendrev_data, $filename, "TXT");
    $rendrev_export->export($rendrev_data, $filename, "CSV");
    $rendrev_export->export($rendrev_data, $filename, "XLS");
?>
