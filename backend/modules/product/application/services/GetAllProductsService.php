<?php 

namespace app\modules\product\application\services;
use app\modules\product\application\in\IGetAllProductsIn;
use app\modules\product\infraestructure\out\persistence\adapter\getAllProductsAdapter;
use app\modules\product\infraestructure\out\persistence\repository\ProductJsonRepository;

class GetAllProductsService implements IGetAllProductsIn
{   

    
    public function getAllProducts(){

        $getAllProductsAdapter= new getAllProductsAdapter(new ProductJsonRepository());
        return $getAllProductsAdapter->getAllProducts();
        
    }

}