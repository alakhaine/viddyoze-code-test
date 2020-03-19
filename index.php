<head>
<title>Acme Widget Co</title>
</head>

<body>
<pre>
<?php
	require_once "utils.php";
	require_once "definitions.php";
	require_once "crud_basket.php";
	require_once "config.php";
	require_once "front.php";
	$form_user_id = 0;
	$self_URL = substr($_SERVER["HTTP_REFERER"], 0,strrpos($_SERVER["HTTP_REFERER"], '/'));
	echo '<a href="'.$self_URL.'/index.php"><button>Reload</button></a></br>';
?>
<style>
table, th, td 
{
  border: 1px solid black;
}
</style>
<?php
	//var_dump ($_SERVER);
	echo 'Product catalog</br>';
	echo display_catalog($arr_products, $form_user_id);
	if (isset($_POST['api_method'])){
		$temp = file_get_contents($self_URL.'/basket_API.php?method='.$_POST['api_method'].'&user_id='.$_POST['user_id'].'&code='.$_POST['code']);
	}
	$arr_current_basket =  basket_read($form_user_id);
	
	echo create_form('empty_basket', $form_user_id, '', 'Empty basket');
	echo 'Current basket</br>';	
	echo display_basket($arr_current_basket, $arr_products, $form_user_id);	
	$delivery_cost = 0;
	$discount = 0;
	$total_cost = calculate_basket_cost($arr_products, $arr_offers, $arr_dc_rules, $arr_current_basket, $delivery_cost, $discount);
	echo 'Material cost:'.round($total_cost, 2)."<br>";
	echo 'Delivery cost:'.round($delivery_cost, 2)."<br>";
	echo 'Offer discount:'.round($discount, 2)."<br>";
	echo 'Total to pay:'.round($total_cost + $delivery_cost - $discount, 2);
?>
</table>
</body>
