<?php
namespace app\modules\product\application\in;
use app\modules\product\application\command\DeleteProductCommand;

interface IDeleteProductIn {
    public function deleteProduct(DeleteProductCommand $productCommand);

}