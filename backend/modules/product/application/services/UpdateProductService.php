<?php 

namespace app\modules\product\application\services;
use app\modules\product\application\in\IUpdateProductIn;
use app\modules\product\application\command\UpdateProductCommand;
use app\modules\product\domain\service\UpdateProductDomainService; 
use app\modules\product\infraestructure\out\persistence\adapter\UpdateProductAdapter;
use app\modules\product\infraestructure\out\persistence\repository\ProductJsonRepository;

class UpdateProductService implements IUpdateProductIn
{   

    
    public function updateProduct( UpdateProductCommand $productCommand){

        $updateProductDomainService = new UpdateProductDomainService();

        $product = $updateProductDomainService->updateProductEvent(
            $productCommand->get_description(),
            $productCommand->get_image(),
            $productCommand->get_name(),
            $productCommand->get_price(),
            $productCommand->get_id()
        );
        
        $updateProductAdapter= new UpdateProductAdapter(new ProductJsonRepository());
        return $updateProductAdapter->updateProduct($product);
        
    }

}