<?php
use PHPUnit\Framework\TestCase;

final class UpdateProductControllerTest extends TestCase
{
    public function testUpdateProduct(): void
    {   
        
        
        $code= $this->create_product();
        
        $postfields=array();
        $postfields['price']=600;
        $postfields['name']='Test Product3';
        $postfields['description']='Test Description3';
        $postfields['image']='https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fstatic.onecms.io%2Fwp-content%2Fuploads%2Fsites%2F47%2F2022%2F09%2F22%2Ffacts-about-cats-1292117990-2000.jpg&q=60';
        $postfields['uuid']=$code;
        
        $ch = curl_init();
        $r = "http://localhost:8080/index.php?r=product/update-product/";
        curl_setopt($ch, CURLOPT_URL, $r);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $contenido = curl_exec($ch);
        curl_close ($ch);

        $response=json_decode($contenido);
        $this->assertSame($response->status, 200);
        
       

    }

    
    private function create_product(){
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
        return $response->code;
    }

}

