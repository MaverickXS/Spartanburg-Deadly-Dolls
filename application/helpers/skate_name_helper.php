<?php
function draw_name($row){
	$result = $row->skate_name;
	if (trim($result . '')==''){
		$result = $row->first_name . '&nbsp;' . $row->last_name;
	}
	return $result;
}

function draw_number($row, $use_pound = false, $use_strong = true){
	if ($use_strong){
		$num = '<strong>' . $row->number . '</strong>';
	} else {
		$num = $row->number;
	}

	$result = $row->number_prefix . $num . $row->number_suffix . '';
	if ($use_pound && $result!='' && $result!='<strong></strong>'){
		$final_result = '#' . $result;
	} else {
		$final_result = $result;
	}
	return $final_result;
}

function draw_id($row){
	$result = $row->number;
	if (trim($result . '')==''){
		$result = $row->u_key;
	}
	return $result;
}

function draw_uri_name($row){
	return url_title(draw_name($row) . '-' . draw_id($row));
}

function draw_fb_link($row){
	if (is_numeric($row->facebook)){
		return 'profile.php?id=' . $row->facebook;
	} else {
		return $row->facebook;
	}
}
?>