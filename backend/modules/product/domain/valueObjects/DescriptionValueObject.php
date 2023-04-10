<?php 

namespace app\modules\product\domain\valueObjects;

class DescriptionValueObject 
{   

    private $description;
    public function __construct($description){
        $this->description=$description;

    }

    public function get_value(){
        return $this->description;
    }
}