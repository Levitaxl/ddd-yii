<?php
namespace app\modules\product\application\in;
use app\modules\product\application\command\UpdateProductCommand;

interface IUpdateProductIn {
    public function UpdateProduct(UpdateProductCommand $productCommand);

}