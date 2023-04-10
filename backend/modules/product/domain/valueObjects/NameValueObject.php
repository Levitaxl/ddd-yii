<?php 

namespace app\modules\product\domain\valueObjects;

class NameValueObject 
{   

    private $name;
    public function __construct($name){
        $this->name=$name;

    }

    public function get_value(){
        return $this->name;
    }
}