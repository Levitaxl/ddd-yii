<?php
namespace app\modules\product\infraestructure\out\persistence\repository;

interface IProductRepository {

  
    public function save($product);
    
    public function get_all();
    
    public function get_by_uuid($uuid);

    public function update($product,$id);

    public function delete($uuid);

}