<?php 

namespace app\modules\product\infraestructure\controllers\in;
use yii\web\Controller;
use app\modules\product\application\in\ICreateProductIn;
use app\modules\product\application\command\CreateProductCommand;
use app\modules\product\application\services\CreateProductService;

class CreateProductController extends Controller
{
    private $ICreateProductIn;

    public function actionIndex()
    {   
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: POST");

        if(!$_POST){
            $response=array(
                "status" => 404,
                "message" => "No Post Data",
                'sucess' => false,
                'code' => -1
            );
            
            echo json_encode($response);
            return;
        }
        $createProductCommand= new CreateProductCommand($_POST);

        $validations= $createProductCommand->validations();
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

        
        $createProductService= new CreateProductService();

        $uuid = $createProductService->createProduct($createProductCommand);

   
        $response=array(
            "status" => 200,
            "message" => "Sucess",
            'sucess' => true,
            'code' => $uuid
        );
        
        echo json_encode($response);
    }
}