	<?php
	for($i = 0;  $i <= count($store_rows);$i++) {
		if ($i = 0) {
			echo $store_rows[$i][0];
			wp_insert_term('dong ho', 'store', array(
			    'description' => 'New Store',
			    'slug' => 'lol',
			    //'parent' => 4 // must be the ID, not name
			));
			delete_option($store."_children");
		} 

