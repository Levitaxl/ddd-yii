const btnCart = document.querySelector('.container-icon')
const containerCartProducts = document.querySelector('.container-cart-products')


$( document ).ready(function() {
    $.ajax({
        type:"GET",
        url:"http://localhost:8080/index.php?r=product/get-all-products/",
        success:function(datos){
            const response=JSON.parse(datos)
            const products= response.products

            let html='';

            for (let i = 0; i < products.length; i++) {
                console.log(products[i])
                let product=products[i];
                html+='<div class="item">'
                html+='<figure>'
                html+='	<img'
                html+='		src="'+product.image+'"'
                html+='	/>'
                html+='</figure>'
                html+='<div class="info-product">'
                html+='	<h2>'+product.name+'</h2>'
                html+='	<p class="price">$'+product.price+'</p>'
                html+='	<div class="description">'+product.description+'</div>'
                html+=' <div class="no-block uui" > '+product.uuid+'</div>'
                html+='</div>'
                html+='</div>';
            }
            document.getElementById("base").innerHTML = html;
        }

    })
});