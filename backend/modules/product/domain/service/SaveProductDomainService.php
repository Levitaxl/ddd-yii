<?php 

namespace app\modules\product\domain\service;
use app\modules\product\domain\entity\product;
use app\modules\product\domain\valueObjects\DescriptionValueObject;
use app\modules\product\domain\valueObjects\ImageValueObject;
use app\modules\product\domain\valueObjects\NameValueObject;
use app\modules\product\domain\valueObjects\PriceValueObject;


class SaveProductDomainService 
{   

    private $description;
    private $image;
    private $name;
    private $price;
    public function createProductEvent(   
                            $description, 
                            $image,
                            $name,
                            $price){


        $descriptionValueObject = new DescriptionValueObject($description);
        $imageValueObject       = new ImageValueObject($image);
        $nameValueObject        = new NameValueObject($name);
        $priceValueObject       = new PriceValueObject($price);
        return new Product( $descriptionValueObject,$imageValueObject,$nameValueObject,$priceValueObject,null);
    }
}