<?php 

namespace app\modules\product\infraestructure\controllers\in;
use yii\web\Controller;
use app\modules\product\application\in\IDeleteProductIn;
use app\modules\product\application\command\DeleteProductCommand;
use app\modules\product\application\services\DeleteProductService;

class DeleteProductController extends Controller
{
    private $IDeleteProductIn;

    public function actionIndex()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET");
        
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
        
        $DeleteProductCommand= new DeleteProductCommand($_POST);

        $validations= $DeleteProductCommand->validations();
        
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


        $DeleteProductService= new DeleteProductService();

        $response= $DeleteProductService->DeleteProduct($DeleteProductCommand);

        if($response){
            $response=array(
                "status" => 200,
                "message" => "Product Deleted",
                'sucess' => true,
                'code' => $DeleteProductCommand->get_id()
            );
            
            echo json_encode($response);
            return;
        }

       
        $response=array(
            "status" => 404,
            "message" => "Product not found",
            'sucess' => true,
            'code' => $DeleteProductCommand->get_id()
        );
            
        echo json_encode($response);
        return;
        
    }
}