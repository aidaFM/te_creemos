<?php

if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower ($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
	include('config.inc.php');

	if(isset($_POST['page'])){
		//get page number from ajax post
		$page_number = filter_var($_POST['page'],FILTER_SANITIZE_NUMBER_INT,FILTER_FLAG_STRIP_HIGH);
		if(!is_numeric($page_number)){
			die('invalid page numbeer!');
		}
	}else{
		$page_number = 1;
	}

	$results = mysqli_query($home_connection, 'SELECT COUNT(*) FROM interdependencias_externas');
	//hold total records in variable
	$get_total_rows = $results->fetch_row();
	$total_pages = ceil($get_total_rows[0]/$item_per_page);
	//get starting position to fetch the records
	$page_position = (($page_number -1)*$item_per_page);

	//SQL query that will fetch group of records depending on starting position and item per page. See the limit clause
	$results = mysqli_query($home_connection, 'SELECT * FROM intedependencias_externas where clave_proceso = 1 ORDER BY clave_interdependencia_externa asc LIMIT $page_position, $item_per_page');
        while($data=$results->fetch_assoc()){
    ?>
	    <div class="form-group">
	        <label for="member">Nombre del proveedor / socio:</label>
	        <input class="form-control" type="text" name="member" id="member" value="<?= $data['nombre_proveedor'] ?>" maxlength="100" size="50" />  
	    </div>
	    <div class="form-group">
	        <label for="input_data">Información requerida (entrada):</label>
	        <input class="form-control" type="text" name="input_data" id="input_data" value="<?= $data['informacion_requerida_entrada_externa'] ?>" maxlength="100" size="50" />
	    </div>
	    <div class="form-group">
	        <label for="output_data">Información comprometida (salida):</label>
	        <input class="form-control" type="text" name="output_data" id="output_data" value="<?= $data['informacion_comprometida_salida_externa'] ?>" maxlength="100" size="50" />
	    </div>
    <?php
	}
	//call the pagination function here to generate pagination link. passed several parameters to the function
	echo paginate_function($item_per_page,$page_number,$get_total_rows[0],$total_pages);
}

function paginate_function($item_per_page,$current_page,$total_records,$total_pages){
	$pagination = '';
	//verify total pages and current page number
	if($total_pages>0 && $total_pages != 1 && $current_page <= $total_pages){
		$rigth_links = $current_page + 3;
		$previous = $current_page - 3;
		$next = $current_page + 1;
		$first_link = true;

		if(current_page > 1){
			$previous_link = ($previos == 0)?1:$previous;
			$pagination .= '<a href="#" data-page="1" title="First">&laquo;</a>';
			$pagination .= '<a href="#" data-page="'.$previous_link.'" title="Previous">&alt;</a>';
			for($i=($current_page - 2); $i < $current_page; $i++){
				 if($i>0){
				 	$pagination .= '<a href="#" data-page="'.$i.'" title="Page"'.$i.'">'.$i.'</a>';
				 }
			}
			$first_link = false;
		}

		if($first_link){
			$pagination .= $current_page;
		}elseif($current_page == $total_pages){
			$pagination .$current_page;
		}else{
			$pagination .= $current_page;
		}

		for($i=$current_page + 1;$i<$rigth_links;$i++){
			if($i <= $total_pages){
				$pagination .= '<a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a>';
			}
		}
		if($current_page < $total_pages){
			$next_link = ($i > $total_pages)?$total_pages:$i;
			$pagination .= '<a href="#" data-page="'.$next_link.'"title=Next">&gt;</a>';
			$pagination .= '<a href="#" data-page="'.$total_pages.'"title=Last">&raquo;</a>';
		}
	}
	return $pagination;
}
?>