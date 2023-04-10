<?php 

namespace app\modules\product\infraestructure\out\persistence\adapter;
use app\modules\product\application\out\ICreateProductOut;
use app\modules\product\infraestructure\out\persistence\entity\ProductEntity;
use app\modules\product\infraestructure\out\persistence\repository\IProductRepository;

class CreateProductAdapter implements ICreateProductOut
{

    private $productRepository;

    public function __construct(IProductRepository $productRepository){
        $this->productRepository= $productRepository;
    }

    public function createProduct($product){
       $productEntity= new ProductEntity( 
            $product->get_description()->get_value(),
            $product->get_image()->get_value(),
            $product->get_name()->get_value(),
            $product->get_price()->get_value()
        );

        $this->productRepository->save($productEntity);

        return $productEntity->get_uuid();
    }
    
}