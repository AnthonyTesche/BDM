<?php
namespace BDM\Helper;
require_once '../../../vendor/autoload.php';

class Logger{

    public function log($text, $file){
        date_default_timezone_set('America/Sao_Paulo');
        if(file_exists('../var/' . $file)){
            $archive = fopen('../var/' . $file, 'a+');
            $info = date("Y-m-d") . "T" . date("h:i:s") . ": " . $text ."\n";
            fwrite($archive, $info);
            fclose($archive);
        } else {
            $info = date("Y-m-d") . "T" . date("h:i:s") . ": " . $text;
            file_put_contents('../var/' . $file, $info);
        }
    }
}