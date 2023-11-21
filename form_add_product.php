<?php     

	header("Content-Type: text/html; charset=utf-8");
	session_start();

	if(!isset($_SESSION["session_username"]))
	{
	    header("location:login.php");
	}

	require ('development_mode_control.php') ;

	$product = $_POST['product'];
	$qty = $_POST['qty'];

	if ( empty(	$product) or empty(	$qty ) ) {
		echo json_encode(['status' => 'error']);

		exit();
	}

	$result_product = $DB->query("
						SELECT * FROM `productnames` WHERE `id` = ". $product ."
	");

	$result = $DB->query("
						SELECT * FROM `productsready` WHERE `productname_id` = ". $product ."
	");


	$ingname_id = [];
	
	foreach ($result as $key ) {


		array_push(	$ingname_id, [ 'id' => $key['ingname_id'], 'qty' => $key['qty']]);
	}

	foreach ($ingname_id as $key) {
		
		$result1 = $DB->query("
						SELECT * FROM `ingredients` WHERE `id` = ". $key['id'] ."

		");

		if ( intval($result1[0]['qty']) < ( $qty * intval($key['qty']) ) ) {
			
			echo json_encode(['status' => 'error']);

			exit();
		}

	}
	echo json_encode(['status' => 'ok', 'id' => $product, 'qty' => $qty, 'name' => $result_product[0]['productname'] ]);
