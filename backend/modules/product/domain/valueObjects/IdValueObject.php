<?php 

namespace app\modules\product\domain\valueObjects;

class IdValueObject 
{   

    private $id;
    public function __construct($id){
        $this->id=$id;

    }

    public function get_value(){
        return $this->id;
    }
}