<?php
	$arr_products = array ('R01' => array('ProductName'=> 'Red Widget', 'Price' => 32.95, ),
							'G01' => array('ProductName'=> 'Green Widget', 'Price' => 24.95),
							'B01' => array('ProductName'=> 'Blue Widget', 'Price' => 7.95)
	);
	$arr_dc_rules = array (0 => 4.95, 50 => 2.95, 90 => 0);
	$arr_offers = array (array ('code' => "R01", "amount" => 1, "code2" => "R01", "amount2" => 1, "discount" => 0.5, "stacking" => false ),
							array ('code' => "R01", "amount" => 5, "code2" => "R01", "amount2" => 3, "discount" => 0.5, "stacking" => false ));
	$arr_basket1 = array ("B01","G01");
	$arr_basket2 = array ("R01","R01");
	$arr_basket3 = array ("R01","G01");
	$arr_basket4 = array ("B01","R01","B01","R01","R01");
	$arr_basket5 = array ("R01","R01","R01","R01","R01","R01","R01");
?>
