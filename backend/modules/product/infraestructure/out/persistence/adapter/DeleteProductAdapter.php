<?php 

namespace app\modules\product\infraestructure\out\persistence\adapter;
use app\modules\product\application\out\IDeleteProductOut;
use app\modules\product\infraestructure\out\persistence\repository\IProductRepository;

class DeleteProductAdapter implements IDeleteProductOut
{

    private $productRepository;

    public function __construct(IProductRepository $productRepository){
        $this->productRepository= $productRepository;
    }

    public function deleteProduct($productId){
        return $this->productRepository->delete($productId->get_id());
    }
    
}