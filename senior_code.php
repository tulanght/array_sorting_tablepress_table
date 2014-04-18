<?php 

global $wpdb;
	$c_json = (array)$wpdb->get_results( "SELECT post_content FROM wp_posts WHERE post_type = 'tablepress_table'"); /*mulitple row results can be pulled from the database with get_results function and outputs an object which is stored in $result */
    
	$c_str_table = $c_json[0]->post_content;
	$dq = '""';
	$c_blankquote = str_replace($dq,'""', $c_str_table);
	$result_array = json_decode($c_blankquote, true);

	//Trial
	$arrStoreCategoryIds = array();
	$arrCategoryIds = $result_array[0];
	foreach ($result_array as $rowIndex => $row) {
		if ($rowIndex == 0) {
			continue;
		}
		$store = $row[0];
		$arrStoreCategoryIds[$store] = array();
		foreach ($row as $colIndex => $col) {
			if ($col == 'x') {
				$arrStoreCategoryIds[$store][] = $arrCategoryIds[$colIndex];
			}
		}
	}
	var_dump($arrStoreCategoryIds);
