<?php
header("Content-Type: text/html; charset=utf-8");
//session_start();
//if(!isset($_SESSION["session_username"]))
//{
//    header("location:login.php");
//}
require ('../development_mode_control.php') ;
@include_once( './products.php' );

if (isset($_POST['smena'])){
    $smena = $_GET['smena'];
}else{
    $smena = 0;
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <section class="products">
        <?php
      $result = $DB->query("SELECT * FROM `productnames`");
        foreach ( $result as $key => $product ) { ?>
          <div class="product" data-index="<?php echo $product['id']; ?>" data-name="<?php echo $product['productname']; ?>" data-value="<?php echo $product['sell_price']; ?>" data-qty="0">
            <img src="../<?php echo $product['location']; ?>" alt="<?php echo $product['productname']; ?>">
            <h4 class="product-name"><?php echo $product['productname']; ?></h4>
            <p class="product-value"><?php echo $product['sell_price']; ?></p>
          </div>
            <button class="delet_product" style="display: none" ></button>
        <?php
        }
      ?>
    </section>
    <section class="bill">
        <form method="POST" action="./bill.php">
            <select name="smena">
                <option value="" <?php echo $smena == 0 ? "selected" : ""; ?>></option>
                <option value="1" <?php echo $smena == 1 ? "selected" : ""; ?>>Смена 1</option>
                <option value="2" <?php echo $smena == 2 ? "selected" : ""; ?>>Смена 2</option>
                <option value="3" <?php echo $smena == 3 ? "selected" : ""; ?>>Смена 3</option>
            </select>
          <div class="bill-products">
            <h2>Покупка</h2>
          </div>
          <div class="bill-client">
              <div class="hidden">
                <label for="products">Products</label>
                  <input type="text" name="products_qty" id="products_qty" placeholder="products_qty" value="">
                <input type="text" name="products" id="products" placeholder="Products" value="">
              </div>
    <!--          <div>-->
    <!--            <label for="name">Имя</label>-->
    <!--            <input type="text" name="name" id="name" placeholder="Имя клиента">-->
    <!--          </div>-->
    <!--          <div>-->
    <!--            <label for="id">ID</label>-->
    <!--            <input type="text" name="id" id="id" placeholder="ID клиента">-->
    <!--          </div>-->

                <div>
                    <input type="checkbox" id="vehicle1" name="payment" value="card" style="zoom: 2;">
                    <label for="vehicle1"> I have a bike</label><br>
                </div>

              <div>
                <input type="submit" value="Потдвердить">

              </div>
                <div>
                    <button type="reset"  onclick="window.location.reload()" class="btnnew">Очистить</button>
                </div>
          </div>
        </form>
    </section>

    <script>

      (function() {
        let products = document.querySelectorAll('section.products > .product');
        let billProducts = document.querySelector('.bill-products');
        let productsInput = document.querySelector('#products');
        let productsInputQty = document.querySelector('#products_qty');

        productsInput.value = '';

          let products_item = [];


          function print_list_product(){

              billProducts.innerHTML = '<h2>Покупка</h2>';

              productsInput.value = '';
              productsInputQty.value = '';

              for( let item of products_item ) {

                  let p = document.createElement('p');
                  p.innerHTML = item.name + ' - $' + (item.value * item.qty) + ' - ' + item.qty + ` <button class="delet_product" data-id="${item.id}"> - </button>`;
                  billProducts.appendChild(p);

                  if (productsInput.value == '') {
                      productsInput.value += item.id;
                      productsInputQty.value += item.qty;
                  } else {
                      productsInput.value += ',' + item.id;
                      productsInputQty.value += ',' + item.qty;
                  }
              }

              document.querySelectorAll('.delet_product').forEach( delet_item => {

                  delet_item.addEventListener( 'click', function( e ) {
                      let id = e.srcElement.dataset.id;
                      for( let item in products_item ){
                          if(products_item[item].id == id){
                              console.log(item)
                              if (products_item[item].qty > 1) {
                                  products_item[item].qty -= 1;
                              }
                          }
                      }

                      print_list_product();
                  });
              });
          }

          function add(index, name, value){
              for( let item of products_item ){
                  if(item.id == index){
                      item.qty += 1;
                      print_list_product()
                      return false;
                  }
              }

              products_item.push({
                  "id" : index,
                  "name" : name,
                  "value" : value,
                  "qty" : 1
              });
              print_list_product()
          }

        products.forEach( product => {
          product.addEventListener( 'click', function( e ) {
            let index = e.srcElement.dataset.index;
            let name = e.srcElement.dataset.name;
            let value = e.srcElement.dataset.value;

            add(index, name, value);
          });
        });
      })();
    </script>
  </body>
</html>