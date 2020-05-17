<?php
namespace BDM\Helper;
require_once '../../../vendor/autoload.php';

class Secure {
    
    public function prepare($string){
            $string = mysqli_real_escape_string($this->link, $string);
            return $string;
        }
}
