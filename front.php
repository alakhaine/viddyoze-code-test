<?php
	function create_form($api_method, $user_id, $code, $button_text){
			$output = "<form action='index.php' method='POST'>
							<input type='hidden' name='api_method' value='".$api_method."'>
							<input type='hidden' name='user_id' value='".$user_id."'>
							<input type='hidden' name='code' value='".$code."'>
							<input type='submit' value='".$button_text."'>
						</form>";
			return $output;
	}
	
	function display_basket($basket, $catalog, $user_id){	
		$temp_arr = array();
		$s = sizeof($basket);
		error_reporting(E_ALL & ~E_NOTICE); 
		for($i = 0; $i < $s; $i++){
			$temp_arr[$basket[$i]]++; //disabled notices temporarily for this line of code
		}
		error_reporting(E_ALL); 
	//	var_dump($temp_arr);
		$output = '<table style= "width:30%;">
			<tr>
				<th>Code</th>
				<th>Name</th>
				<th>Unit Price</th>
				<th>Amount</th>
				<th>Subtotal</th>
				<th>Decrease amount</th>
			</tr>';
		$total = 0;
		foreach ($temp_arr as $pcode => $amount){
			$subtotal = ($temp_arr[$pcode] * $catalog[$pcode]['Price']);
			$total += $subtotal;
			$output .= "<tr>";
			$output .= "<td>".$pcode."</td>";
			$output .= "<td>".$catalog[$pcode]["ProductName"]."</td>";
			$output .= "<td>".$catalog[$pcode]['Price']."</td>";
			$output .= "<td>".$temp_arr[$pcode]."</td>";
			$output .= "<td>".$subtotal."</td>";
			$output .= "<td>".create_form('remove', $user_id, $pcode, 'Remove one')."</td>";
			$output .= "</tr>";
		}
		$output .= '</table>';
		return $output;
	}
	
	function display_catalog($catalog, $user_id){	
		$output = '<table style= "width:30%;">
			<tr>
				<th>Code</th>
				<th>Name</th>
				<th>Price</th>
				<th>Action</th>
			</tr>';
		foreach ($catalog as $pcode => $product){
			$output .= "<tr>";
			$output .= "<td>".$pcode."</td>";
			$output .= "<td>".$product["ProductName"]."</td>";
			$output .= "<td>".$product["Price"]."</td>";
			$output .= "<td>".create_form('add', $user_id, $pcode, 'Add to basket')."</td>";
			$output .= "</tr>";
		}
		$output .= '</table>';
		return $output;
	}
?>