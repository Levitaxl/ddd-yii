
  $( "#btn-register" ).click(function() {

    const name = document.getElementById("name").value;
    const price = document.getElementById("price").value;
    const image = document.getElementById("image").value;
    const description = document.getElementById("description").value;
    const regex = /^[0-9]*$/;

    let errors=[];
   
    if(price=='')                   errors.push('Price is empty');
    if(name=='')                    errors.push('name is empty');
    if(description=='')             errors.push('description is empty');
    if(image=='')                   errors.push('image is empty');
    if(!regex.test(price))   errors.push('Price is not a number');
    if(price<=0)                      errors.push('Price should be higher than 0');

    console.log(errors);
    const n = errors.length;
    if(n>0){
      alert (errors.toString());
      return;
    }

    const product = [];
    product['price']=price;
    product['name']=name;
    product['description']=description;
    product['image']=image;

    var json = { ...product };
    $.ajax({
            type:"POST",
            url:"http://localhost:8080/index.php?r=product/create-product/",
            data: json,
            success:function(datos){
                const response=JSON.parse(datos)
                if(response.sucess){
                  alert('Sucess');
                  location.reload();
                }
            }
        })
  });



  $( "#btn-update" ).click(function() {

    const name = document.getElementById("update_name").value;
    const price = document.getElementById("update_price").value;
    const image = document.getElementById("update_image").value;
    const description = document.getElementById("update_description").value;
    const uuid= document.getElementById("update_uuid").value;
    const regex = /^[0-9]*$/;

      let errors=[];

      if(price=='')                   errors.push('Price is empty');
      if(name=='')                    errors.push('name is empty');
      if(description=='')             errors.push('description is empty');
      if(image=='')                   errors.push('image is empty');
      if(!regex.test(price))   errors.push('Price is not a number');
      if(price<=0)                      errors.push('Price should be higher than 0');

      const n = errors.length;
      if(n>0){
        alert (errors.toString());
        return;
      }

      const product = [];
      product['price']=price;
      product['name']=name;
      product['description']=description;
      product['image']=image;
      product['uuid']=uuid

      var json = { ...product };
      $.ajax({
              type:"POST",
              url:"http://localhost:8080/index.php?r=product/update-product/",
              data: json,
              success:function(datos){
                  const response=JSON.parse(datos)
                  if(response.sucess){
                    alert('Sucess');
                    location.reload();
                  }
              }
          })
    });



  $( document ).ready(function() {
    $.ajax({
        type:"GET",
        url:"http://localhost:8080/index.php?r=product/get-all-products/",
        success:function(datos){
            const response=JSON.parse(datos)
            const products= response.products

            let html='<thead> <tr>'
              html+=' <th scope="col">Name</th>'
              html+='  <th scope="col">Price</th>'
              html+='  <th scope="col">Description</th>'
              html+='   <th scope="col">Image</th>'
              html+='   <th scope="col">Actions</th>'
              html+='  </tr>  </thead>';

            for (let i = 0; i < products.length; i++) {
                console.log(products[i])
                let product=products[i];

                html+='    <tr>'
                  html+='<th scope="row">'+product.name+'</th>'
                  html+=' <td>'+product.price+'</td>'
                  html+=' <td>'+product.description+'</td>'
                  html+='<td><img  class="hs-image" src="'+product.image+'"></td>'
                  html+='<td><button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary click-update" '
                   html+='data-uuid="'+product.uuid+'" data-name="'+product.name+'" data-price="'+product.price+'" data-description="'+product.description+'" data-image="'+product.image+'">Update</button><button type="button" class="btn btn-danger click-delete" data-uuid="'+product.uuid+'">Delete</button></td>'
                  html+='  </tr>'
            }
            document.getElementById("table").innerHTML = html;

            $( ".click-delete" ).click(function() {
              const uuid= $(this).data("uuid");
              const product = [];
              product['uuid']=uuid;
              var json = { ...product };
              $.ajax({
                      type:"POST",
                      url:"http://localhost:8080/index.php?r=product/delete-product/",
                      data: json,
                      success:function(datos){
                        location.reload();

                    }
              })
          });
          $('.click-update').click(function() {
            $('#login-modal-hs').fadeIn().css("display", "flex");
          });

          $('.close-modal').click(function() {
            $('#login-modal-hs').fadeOut();
          });
          $( ".click-update" ).click(function() {
              const uuid= $(this).data("uuid");
              const name= $(this).data("name");
              const price= $(this).data("price");
              const description= $(this).data("description");
              const image= $(this).data("image");


              document.getElementById("update_name").value=name;
              document.getElementById("update_price").value=price;
              document.getElementById("update_image").value=image;
              document.getElementById("update_description").value=description;
              document.getElementById("update_uuid").value=uuid;
              

          });
          
        }

    })
});
