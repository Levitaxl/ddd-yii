<?php
use PHPUnit\Framework\TestCase;

final class CreateProductControllerTest extends TestCase
{
    public function testCreateProduct(): void
    {   
        $postfields=array();
        $postfields['price']=400;
        $postfields['name']='Test Product';
        $postfields['description']='Test Description';
        $postfields['image']='https://st3.depositphotos.com/1825222/36699/i/450/depositphotos_366994452-stock-photo-clock-in-the-shape-of.jpg';

        $ch = curl_init();
        $r = "http://localhost:8080/index.php?r=product/create-product/";
        curl_setopt($ch, CURLOPT_URL, $r);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $contenido = curl_exec($ch);
        curl_close ($ch);

        $response=json_decode($contenido);
       
        $this->assertSame($response->status, 200);

        

    }


}

