<?php 

namespace app\modules\product\infraestructure\out\persistence\adapter;
use app\modules\product\application\out\IGetAllProductsOut;
use app\modules\product\infraestructure\out\persistence\repository\IProductRepository;

class GetAllProductsAdapter implements IGetAllProductsOut
{

    private $productRepository;

    public function __construct(IProductRepository $productRepository){
        $this->productRepository= $productRepository;
    }

    public function getAllProducts(){
        return $this->productRepository->get_all();
    }
    
}