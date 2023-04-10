<?php 

namespace app\modules\product\infraestructure\controllers\in;
use yii\web\Controller;
use app\modules\product\application\services\GetAllProductsService;

class GetAllProductsController extends Controller
{

    public function actionIndex()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET");


        $getAllProductsService= new GetAllProductsService();
        $response=array(
            "status" => 200,
            "message" => "Product List",
            'sucess' => true,
            'products' => $getAllProductsService->getAllProducts()
        );
            
        echo json_encode($response);
        return;
    }
}