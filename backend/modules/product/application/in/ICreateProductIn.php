<?php
namespace app\modules\product\application\in;
use app\modules\product\application\command\CreateProductCommand;

interface ICreateProductIn {
    public function createProduct(CreateProductCommand $productCommand);

}