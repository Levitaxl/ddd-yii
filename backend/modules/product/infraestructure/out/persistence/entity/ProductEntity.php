<?php 

namespace app\modules\product\infraestructure\out\persistence\entity;

class ProductEntity
{   

    private $description;
    private $image;
    private $name;
    private $price;
    private $uuid;


    public function __construct($description, 
                                $image,
                                $name,
                                $price){
        
        $this->uuid=$this->generateUuidv4();
        $this->description=$description;
        $this->image=$image;
        $this->name=$name;
        $this->price=$price;

    }

    private function generateUuidv4()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,
            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        )   ;
    }

    public function get_uuid(){
        return $this->uuid;
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

    
}