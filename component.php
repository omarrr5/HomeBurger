<?php


function component($productname,$productprice,$productimg,$productid){
  $element= "
  <div class=\"col-md-4 col-md-4 col-sm-6 my-3 my-md-0 py-3  rounded-3    \" >
    <form action=\"index.php\" method=\"post\">
      <div class=\"food card rounded-3\">
        <div>
          <img src=\"$productimg\" alt=\"image1\" class=\"img-fluid rounded-3\">
        </div> 
        <div class=\"card-body rounded \">
          <h5 class=\"card-title\">$productname</h5>
          <h5>
            <span class=\"price\">$productprice</span>
          </h5>
          <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
          <input type='hidden' name='product_id' value='$productid'>
        </div>   
      </div>
    </form>
  </div>
";
echo $element;


}



function cartElement($productimg, $productname, $productprice, $productid){
  $element = "
  
  <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                  <div class=\"border rounded\">
                      <div class=\"row bg-white\">
                          <div class=\"col-md-3 pl-0\">
                              <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                          </div>
                          <div class=\"col-md-6\">
                              <h5 class=\"pt-2\">$productname</h5>
                              <h5 id=\"price-$productid\" class=\" price pt-2\">RM $productprice</h5>
                              <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                          </div>
                          <div class=\"col-md-3 py-5\">
                          <div>
                          <input class=\"price-input\" id=\"quantity-$productid\" type=\"number\" value=\"1\" min=\"1\" max=\"10\" step=\"1\"/>
                          </div> 
                          </div>
                      </div>
                  </div>
              </form>
  
  ";
  echo  $element;
}