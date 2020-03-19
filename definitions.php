<?php
	$arr_products = array ('R01' => array('ProductName'=> 'Red Widget', 'Price' => 32.95, ),
							'G01' => array('ProductName'=> 'Green Widget', 'Price' => 24.95),
							'B01' => array('ProductName'=> 'Blue Widget', 'Price' => 7.95)
	);
	$arr_dc_rules = array (0 => 4.95, 50 => 2.95, 90 => 0);
	$arr_offers = array (array ('code' => "R01", "amount" => 1, "code2" => "R01", "amount2" => 1, "discount" => 0.5, "stacking" => false ),
							array ('code' => "R01", "amount" => 5, "code2" => "R01", "amount2" => 3, "discount" => 0.5, "stacking" => false ));
?>
