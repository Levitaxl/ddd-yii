<?php 

namespace app\modules\product\infraestructure\controllers\in;
use yii\web\Controller;
use app\modules\product\application\in\IUpdateProductIn;
use app\modules\product\application\command\UpdateProductCommand;
use app\modules\product\application\services\UpdateProductService;

class UpdateProductController extends Controller
{
    private $IUpdateProductIn;

    public function actionIndex()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: POST");
        if(!$_POST){
            $response=array(
                "status" => 404,
                "message" => "Failed",
                'sucess' => false,
                'code' => -1
            );
            
            echo json_encode($response);
            return;
        }
        
        $UpdateProductCommand= new UpdateProductCommand($_POST);
        $validations= $UpdateProductCommand->validations();
        
        if($validations){
            $response=array(
                "status" => 404,
                "message" => "Something went wrong",
                'sucess' => false,
                "errors" => json_encode($validations)
            );
            
            echo json_encode($response);
            return;
        }
        
        $UpdateProductService= new UpdateProductService();

        $response= $UpdateProductService->UpdateProduct($UpdateProductCommand);


        if($response){
            $response=array(
                "status" => 200,
                "message" => "Product Updated",
                'sucess' => true,
                'code' => $UpdateProductCommand->get_id()
            );
            
            echo json_encode($response);
            return;
        }

       
        $response=array(
            "status" => 404,
            "message" => "Product not found",
            'sucess' => true,
            'code' => $UpdateProductCommand->get_id()
        );
            
        echo json_encode($response);
        return;
        
  
    }
}