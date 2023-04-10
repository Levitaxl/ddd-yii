<?php 

namespace app\modules\product\infraestructure\out\persistence\repository;
use app\modules\product\infraestructure\out\persistence\repository\IProductRepository;

class ProductJsonRepository implements IProductRepository
{
    private $file_name='persistence.json';
    
    public function __construct(){
        if (!file_exists($this->file_name)) {
            $archivo = fopen($this->file_name, "w+b");    // Abrir el archivo, creándolo si no existe
            if( $archivo == false )  echo "Error al crear el archivo";
            else if($archivo==true)  file_put_contents("persistence.json", '[]');    
            fclose($archivo);   // Cerrar el archivo
        }
    }

    public function save($product){
        $base=json_decode(file_get_contents($this->file_name));
        $response= array();
        $response['description']=$product->get_description();
        $response['image']=$product->get_image();
        $response['name']=$product->get_name();
        $response['price']=$product->get_price();
        $response['uuid']=$product->get_uuid();
        array_push($base,$response);
        file_put_contents($this->file_name,json_encode($base));

     

    }

    public function update($product, $id){
        $base=json_decode(file_get_contents($this->file_name));
        $found_key = array_search($id, array_column($base, 'uuid'));

        if($found_key===false) return false;

       
        $response= array();
        $response['description']    =   $product->get_description();
        $response['image']          =   $product->get_image();
        $response['name']           =   $product->get_name();
        $response['price']          =   $product->get_price();
        $response['uuid']           =   $id;
        
        $base[$found_key]=$response;

        file_put_contents($this->file_name,json_encode($base));

        return true;
    }

    public function get_all(){

        return json_decode(file_get_contents($this->file_name));
    }
    
    public function get_by_uuid($uuid){}

    

    public function delete($uuid){
        $base=json_decode(file_get_contents($this->file_name));
        $found_key = array_search($uuid, array_column($base, 'uuid'));

        if($found_key===false) return false;

        $base[$found_key]=[];

        $response=str_replace(",[]","",json_encode($base));
        $response=str_replace("[],","",$response);
        $response=str_replace("[]","",$response);
        file_put_contents($this->file_name,$response);

        return true;
    }


}

       
?>