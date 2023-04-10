<?php  namespace app\modules\product\application\command;

class DeleteProductCommand
{

    private $id;

    public function __construct($payload){
        $this-> id              =   $payload['uuid'];
    }

    public function validations(){
        $errors=array();
        if($this->id=='')  array_push($errors,'code is empty');

        return $errors;
    }

    public function get_id(){
        return $this->id;
    }
}