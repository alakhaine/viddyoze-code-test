<?php
	$method = $_GET["method"];
	$product_code = $_GET["code"];
	$user_id = $_GET["user_id"];
	
	//security checks on parameters can happen here
	
	if($user_id == "") $user_id = 0;
	require_once "crud_basket.php";
	
	$basket = basket_read($user_id);
	$output = "";
	
	switch ($_GET["method"]){
		case "add":
			$basket[] = $product_code;
			basket_update($user_id, $basket);
			break;
		case "remove":
			$s = sizeof($basket);
			$temp_arr = array();
			$removed = false;
			for ($i = 0; $i < $s; $i++){
				if (($basket[$i] == $product_code)AND(!$removed)){
					$removed = true;
				}else{
					$temp_arr[] = $basket[$i];
				}
			}
			$basket = $temp_arr;
			basket_update($user_id, $basket);
			break;
		case "empty_basket":
			basket_empty($user_id);			
			break;
		default:
			echo "Unrecognized method";
	}
	$output = json_encode(basket_read($user_id));
	echo $output;
?>