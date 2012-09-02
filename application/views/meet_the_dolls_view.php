<?
if (isset($skaters)){
	if ($skaters->num_rows() > 0){
		?><h2>Skaters</h2><?
		foreach ($skaters->result() as $user){
			?>
			<div class="wrapper">
				<span class="number_wrap"><?=draw_number($user, true);?>&nbsp;</span> <a href="/view_player/<?=draw_uri_name($user);?>/"><?=draw_name($user);?></a>
			</div>
			<?
		}
	}
}

if (isset($staff)){
	if ($staff->num_rows() > 0){
		?><br/><h2>Staff</h2><?
		foreach ($staff->result() as $user){
			?>
			<div class="wrapper">
				<span class="number_wrap"><?=draw_number($user, true);?>&nbsp;</span> <a href="/view_player/<?=draw_uri_name($user);?>/"><?=draw_name($user);?></a>
			</div>
			<?
		}
	}
}
?>