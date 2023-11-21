<?php 

		header("Content-Type: text/html; charset=utf-8");
		session_start();

		if(!isset($_SESSION["session_username"]))
		{
		    header("location:login.php");
		}

		require ('development_mode_control.php') ;

		$data = (array) json_decode($_POST['product'], true);

		if ( empty(	$data) ) {
			echo json_encode(['status' => 'error']);

			exit();
		}

		foreach ($data as $key) {
			
			$result_productsready = $DB->query("
						SELECT * FROM `productsready` WHERE `productname_id` = ". $key['id'] ."
			");


			foreach ($result_productsready as $key1) {

				$result_ingredients = $DB->query("
						SELECT * FROM `ingredients` WHERE `id` = ". $key1['ingname_id'] ."
				");

				$qty_ingr = intval($result_ingredients[0]['qty']) - intval($key1['qty']) * intval($key['qty']);
				
				$result_productsready = $DB->query("
					UPDATE `ingredients` SET `qty` = '". $qty_ingr ."' WHERE `ingredients`.`id` = ". $key1['ingname_id'] .";
				");

			}

				$sales = $DB->query("
					INSERT INTO `sales`(`product`, `qty`) VALUES ('". $key['id'] ."','". $key['qty'] ."')
				");


		}

	echo json_encode([ 'status' => 'ok' ]);
