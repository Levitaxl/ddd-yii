<?php 

namespace app\modules\product\domain\entity;

class Product 
{   

    private $description;
    private $image;
    private $name;
    private $price;
    private $id;


    public function __construct($descriptionValueObject, 
                                $imageValueObject,
                                $nameValueObject,
                                $priceValueObject,
                                $idValueObject){
        
        $this->description=$descriptionValueObject;
        $this->image=$imageValueObject;
        $this->name=$nameValueObject;
        $this->price=$priceValueObject;
        $this->id= $idValueObject;

    }

    public function get_price(){
        return $this->price;
    }

    public function get_name(){
        return $this->name;
    }

    public function get_description(){
        return $this->description;
    }

    public function get_image(){
        return $this->image;
    }

    public function get_id(){
        return $this->id;
    }

    
}