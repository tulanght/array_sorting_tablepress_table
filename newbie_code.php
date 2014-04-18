<?php 
global $wpdb;
	$c_json = (array)$wpdb->get_results( "SELECT post_content FROM wp_posts WHERE post_type = 'tablepress_table'"); /*mulitple row results can be pulled from the database with get_results function and outputs an object which is stored in $result */
    
	$c_str_table = $c_json[0]->post_content;
	$dq = '""';
	$c_blankquote = str_replace($dq,'""', $c_str_table);
	$result_array = json_decode($c_blankquote, true);
	
	//Working with categories row
	$cate_rows = array_slice($result_array, 0, 1);
	$cate_rows = $cate_rows[0];
	$cate_columns_length = count($cate_rows);
		$cate_id_arr = array();
		// for statement below is push all categories-id in to an array 
		for($i = 1; $i <=$cate_columns_length; $i++) {
			if ($cate_rows[$i] !== 0 && is_int($cate_rows[$i])) {
				$cate_id_arr[] = $cate_rows[$i];
				//$$cate_id_arr = array_push($cate_id_arr, $cate_rows[$i]);
			}
		}
		echo '<pre>';
			//print_r($cate_id_arr); // array contains category id of coupon from 0 -> 17, has 18 category in this case
		echo '</pre>';

	// Working with stores rows
	$store_rows;
	$store_rows = array_slice($result_array, 1);      // returns only store rows and mark symbol relate to categories
	$store_id_array =[401,261,573,691,522,583,366,157,431,474,505,263,465,519,547,462,360,698,374,376,685,208,511,284,826,466,350,353,110,356,346,693,528,344,509,666,92,529,533,153,189,645];
	// Insert 
	$store_name_arr = array();
	foreach ($store_rows as $key => $value) {
		$store_name_arr[$key] = $store_rows[$key][0];
	}
	// this array contain $keys is store name, $values is store id
	$store_asso_arr = array_combine($store_name_arr,$store_id_array);
	//Find Mark symbol in store rows arrays
	//global $store_rows, $i, $m_id;
	$count = count($store_rows);
	$mark_ids = array();
	$mark_ids_subarr = array();
	for($i = 0; $i < $count; $i++){
		$mark_ids[] = $mark_ids_subarr;
		foreach ($store_rows[$i] as $key => $value) {
			if ($value === 'x') {
				$mark_ids_subarr[] = $key;
			}
		}
		
	}
	// echo '<pre>';
	// //print_r($mark_ids);
	// echo '</pre>';