<h2><?=$page_title;?></h2>
<?
if ($active_roster->num_rows() > 0){
	foreach ($active_roster->result() as $row){
		?>
		<div class="wrapper">
			<span class="number_wrap"><?=draw_number($row, true);?>&nbsp;</span> <a href="/view_player/<?=draw_uri_name($row);?>/"><?=draw_name($row);?></a>
		</div>
		<?
	}
}

if ($fresh_meat->num_rows() > 0){
	?><br/><h2>Fresh Meat</h2><?
	foreach ($fresh_meat->result() as $row){
		?>
		<div class="wrapper">
			<span class="number_wrap"><?=draw_number($row, true);?>&nbsp;</span> <a href="/view_player/<?=draw_uri_name($row);?>/"><?=draw_name($row);?></a>
		</div>
		<?
	}
}

if ($coaches->num_rows() > 0){
	?><br/><h2>Coaches</h2><?
	foreach ($coaches->result() as $row){
		?>
		<div class="wrapper">
			<span class="number_wrap"><?=draw_number($row, true);?>&nbsp;</span> <a href="/view_player/<?=draw_uri_name($row);?>/"><?=draw_name($row);?></a>
		</div>
		<?
	}
}

if ($referees->num_rows() > 0){
	?><br/><h2>Referees</h2><?
	foreach ($referees->result() as $row){
		?>
		<div class="wrapper">
			<span class="number_wrap"><?=draw_number($row, true);?>&nbsp;</span> <a href="/view_player/<?=draw_uri_name($row);?>/"><?=draw_name($row);?></a>
		</div>
		<?
	}
}

if ($volunteers->num_rows() > 0){
	?><br/><h2>Volunteers</h2><?
	foreach ($volunteers->result() as $row){
		?>
		<div class="wrapper">
			<span class="number_wrap"><?=draw_number($row, true);?>&nbsp;</span> <a href="/view_player/<?=draw_uri_name($row);?>/"><?=draw_name($row);?></a>
		</div>
		<?
	}
}

if ($alumni->num_rows() > 0){
	?><br/><h2>Alumni/Retired</h2><?
	foreach ($alumni->result() as $row){
		?>
		<div class="wrapper">
			<span class="number_wrap"><?=draw_number($row, true);?>&nbsp;</span> <a href="/view_player/<?=draw_uri_name($row);?>/"><?=draw_name($row);?></a>
		</div>
		<?
	}
}

?>