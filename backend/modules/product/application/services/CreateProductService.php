<?php 

namespace app\modules\product\application\services;
use app\modules\product\application\in\ICreateProductIn;
use app\modules\product\application\command\CreateProductCommand;
use app\modules\product\domain\service\SaveProductDomainService; 
use app\modules\product\infraestructure\out\persistence\adapter\CreateProductAdapter;
use app\modules\product\infraestructure\out\persistence\repository\ProductJsonRepository;

class CreateProductService implements ICreateProductIn
{   

    
    public function createProduct( CreateProductCommand $productCommand){

        $saveProductDomainService = new SaveProductDomainService();

        $product = $saveProductDomainService->createProductEvent(
            $productCommand->get_description(),
            $productCommand->get_image(),
            $productCommand->get_name(),
            $productCommand->get_price()
        );
        
        $createProductAdapter= new CreateProductAdapter(new ProductJsonRepository());
        return $createProductAdapter->createProduct($product);
        
    }

}