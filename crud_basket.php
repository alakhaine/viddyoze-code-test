<?php
	require_once 'utils.php';
	require_once "config.php";
	function basket_create ($user_ID, $basket){
		global $path_baskets;
		save_array_to_file($path_baskets."/".$user_ID.".json",$basket);	
	}

	function basket_read ($user_ID){
		global $path_baskets;
		return read_file_to_array($path_baskets."/".$user_ID.".json");
	}
	function  basket_update($user_ID, $basket){
		global $path_baskets;
		basket_empty ($user_ID);
		basket_create ($user_ID, $basket);//recreated the basket file with the new content	
	}
	function basket_empty ($user_ID){
		basket_create($user_ID, array());//recreating basket without content flushes it
	}
?>