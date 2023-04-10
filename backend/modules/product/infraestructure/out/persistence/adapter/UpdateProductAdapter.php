<?php 

namespace app\modules\product\infraestructure\out\persistence\adapter;
use app\modules\product\application\out\IUpdateProductOut;
use app\modules\product\infraestructure\out\persistence\entity\ProductEntity;
use app\modules\product\infraestructure\out\persistence\repository\IProductRepository;

class UpdateProductAdapter implements IUpdateProductOut
{

    private $productRepository;

    public function __construct(IProductRepository $productRepository){
        $this->productRepository= $productRepository;
    }

    public function updateProduct($product){
       $productEntity= new ProductEntity( 
            $product->get_description()->get_value(),
            $product->get_image()->get_value(),
            $product->get_name()->get_value(),
            $product->get_price()->get_value()
        );

        $id=$product->get_id()->get_value();
        return $this->productRepository->update($productEntity,$id);
    }
    
}