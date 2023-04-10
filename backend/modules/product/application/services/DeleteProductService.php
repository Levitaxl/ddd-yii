<?php 

namespace app\modules\product\application\services;
use app\modules\product\application\in\IDeleteProductIn;
use app\modules\product\application\command\DeleteProductCommand;
use app\modules\product\infraestructure\out\persistence\adapter\DeleteProductAdapter;
use app\modules\product\infraestructure\out\persistence\repository\ProductJsonRepository;

class DeleteProductService implements IDeleteProductIn
{   

    
    public function deleteProduct( DeleteProductCommand $productCommand){

        $deleteProductAdapter= new DeleteProductAdapter(new ProductJsonRepository());
        return $deleteProductAdapter->DeleteProduct($productCommand);
        
    }

}