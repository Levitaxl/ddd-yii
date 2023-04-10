<?php 

namespace app\modules\product\domain\valueObjects;

class ImageValueObject 
{   

    private $image;
    public function __construct($image){
        $this->image=$image;
    }

    public function get_value(){
        return $this->image;
    }


}