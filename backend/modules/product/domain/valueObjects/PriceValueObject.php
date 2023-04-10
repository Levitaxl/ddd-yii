<?php 

namespace app\modules\product\domain\valueObjects;

class PriceValueObject 
{   

    private $price;
    public function __construct($price){
        $this->price=$price;

    }

    public function get_value(){
        return $this->price;
    }
}