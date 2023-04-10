<?php  namespace app\modules\product\application\command;

class UpdateProductCommand
{
    private $price;
    private $name;
    private $description;
    private $image;
    private $id;

    public function __construct($payload){
        $this-> price          =   $payload['price'];;
        $this-> name           =   $payload['name'];;
        $this-> description    =   $payload['description'];
        $this-> image          =   $payload['image'];
        $this-> id             =   $payload['uuid'];
    }

    public function validations(){
        $errors=array();
        if($this->price=='')        array_push($errors,'Price is empty');
        if($this->name=='')         array_push($errors,'name is empty');
        if($this->description=='')  array_push($errors,'description is empty');
        if($this->image=='')        array_push($errors,'image is empty');
        if(!is_numeric($this->price))  array_push($errors,'Price is not a number');
        if($this->price<=0) array_push($errors,'Price should be higher than 0');
        if($this->id=='')  array_push($errors,'code is empty');

        return $errors;
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