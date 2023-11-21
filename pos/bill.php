<?php
  @include_once( './products.php' );

  require ('../development_mode_control.php') ;

  $bill = array(
    'products'  =>  array(),
    'total'     =>  0
  );

if(isset($_POST["payment"])){
    $payment = 1;
}else{
    $payment = 0;
}

 $point_id = 2;

 $procent_point = 50;

  $billProductsQty = array_map('intval', explode(',', $_POST['products_qty']));

  $billProducts = array_map('intval', explode(',', $_POST['products']));

  $productse = [];

  $id_check = time();

  foreach ( $billProducts as $key => $index ) {

    $result = $DB->query("SELECT * FROM `productnames` WHERE id = ?", array($index));

    $bill['products'][] = ["name" => $result[0]["productname"], "value" => $result[0]["sell_price"], "qty" => $billProductsQty[$key]];
    $bill['total'] = $bill['total'] + ( $result[0]["sell_price"] * $billProductsQty[$key] );

    $result = $DB->insert("sales_products", array( "id_check" => $id_check, "id_product" => $result[0]["id"], 'qty' => $billProductsQty[$key], "price" => $result[0]["sell_price"]));
  }

  $result = $DB->insert("sales", array( "id_check" => $id_check, "point" => $point_id, 'smena' => $_POST['smena'], 'procent' => $procent_point, "sum" => $bill['total'], 'payment' => $payment, 'date' => date('Y-m-d') ));

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS чек</title>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body class="bill">
    <section id="bill-print" class="bill-print">
      <div class="bill-print-header">
        <h1>Coffich</h1>
        <p>
          <span>Ор-р Ан Нажод </span>
          <span>Ор-р Школа 4 Наваий </span>
          <span>Ор-р Гор.Больница </span>
          <span>Ор-р г.Каган х/д вокзал </span>
        </p>
        <p>Телефон: +998 (97) 8610010 <br>+998 (97) 8620010</p>
        <p> +998 (97) 8630010 <br>+998 (97) 8640010</p>
        <p>
                <?php date_default_timezone_set('Asia/Tashkent') ;
                echo date('d/m/Y H:i'); ?>
        </p>
      </div>
<!--      <div class="bill-print-user">-->
<!--        <p class="bill-print-user-name">-->
<!--          <span>Клиент:</span>-->
<!--          <span>--><?php //echo $_POST['name']; ?><!--</span>-->
<!--        </p>-->
<!--        <p class="bill-print-user-id">-->
<!--          <span>ID:</span>-->
<!--          <span>--><?php //echo $_POST['id']; ?><!--</span>-->
<!--        </p>-->
<!--      </div>-->
      <div class="bill-print-products">
        <p>
          <span>Товары</span>
          <span>Цена</span>
          <span>Кол-во</span>
        </p>
        
        <?php foreach ( $bill['products'] as $key => $product ) { ?>
          <p>
            <span><?php echo $product['name']; ?></span>
            <span><?php echo $product['value']; ?></span>
            <span><?php echo $product['qty']; ?></span>
          </p>
        <?php } ?>
      </div>
      <div class="bill-print-total">
        <p>
          <span>Итог:</span>
          <span><?php echo $bill['total']; ?></span>
        </p>
      </div>
        <div class="bill-print-header">
            <img src="qr-code.png" alt="" width="150" height="150">
        </div>
    </section>
    <section class="bill-actions">
      <button id="print">Печать чека</button>
      <button id="new">Назад</button>
    </section>
    <script>
      (function() {
        let printButton = document.querySelector('#print');
        let newButton = document.querySelector('#new');
        
        printButton.addEventListener( 'click', function( e ) {
          window.print();
        });
        newButton.addEventListener( 'click', function( e ) {
          window.location = './index.php?smena=<?php echo $_POST['smena'] ; ?>';
        });
      })();
    </script>
  </body>
</html>