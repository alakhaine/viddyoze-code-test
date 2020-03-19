<?php
function calculate_delivery_cost($defs,$value){
	//var_dump ($defs);
	$tempcost = 0;
	foreach ($defs as $mov => $cost) {
		if($value < $mov){
			return $tempcost;
		}else{
			$tempcost = $cost;
		}
}
	return $tempcost;
}
function calculate_basket_cost ($catalogue, $offers, $dc_rules, $basket, &$delivery_cost, &$discount){
	sort($basket);
	$current_value = 0;
	if (sizeof($basket) == 0){
		$delivery_cost = 0;
		$discount = 0;
		return 0;
	}
	foreach($basket as $pcode){
		$current_value += $catalogue[$pcode]['Price'];
	}
	$basket_grouped = array_count_values ($basket);
	$discount = 0;
	$discounts =array();	
	foreach($offers as $coff){		
		if(!$coff["stacking"]){
			if (isset($basket_grouped[$coff["code"]])){
				if ($basket_grouped[$coff["code"]]>=$coff["amount"]){
					$amount_left = min($basket_grouped[$coff["code"]] - $coff["amount"], $coff["amount2"]);
					$discounts[]= $amount_left * $coff["discount"] * $catalogue[$coff["code"]]["Price"];
				}
			}
		}
		else{
			
		}
	}
	if (sizeof($discounts)>0) $discount=max($discounts);
	$delivery_cost = calculate_delivery_cost($dc_rules, $current_value);
	return $current_value;
}

function save_array_to_file ($path, $arr){
	//var_dump ($path);
	file_put_contents($path,json_encode($arr));
}
function read_file_to_array ($path){
	return json_decode(file_get_contents($path), true);
}
?>
