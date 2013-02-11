<?
if (isset($skaters)){
	if ($skaters->num_rows() > 0){ ?>
		<h2>Skaters</h2>
		<ul class="thumbnails">
			<? foreach ($skaters->result() as $user){
				?>
				<li class="span3">
					<!--<a href="/view_player/<?=draw_uri_name($user);?>/" class="thumbnail">-->
					<div class="thumbnail">
						<img src="/img/users/<?=$user->u_key;?>.jpg" onerror="jQuery(this).attr('src', '/img/nopic.jpg');" />
						<p style="margin-top: 10px;"><span class="number_wrap"><?=draw_number($user, true);?>&nbsp;</span> <strong style="color: #EE227B;"><?=draw_name($user);?></strong></p>
					</div>
				</li>
				<?
			}
		?></ul><?
	}
}

if (isset($staff)){
	if ($staff->num_rows() > 0){ ?>
		<br/><h2>Staff</h2>
		<ul class="thumbnails">
			<? foreach ($staff->result() as $user){
				?>
				<li class="span3">
					<!--<a href="/view_player/<?=draw_uri_name($user);?>/" class="thumbnail">-->
					<div class="thumbnail">
						<img src="/img/users/<?=$user->u_key;?>.jpg" onerror="jQuery(this).attr('src', '/img/nopic.jpg');" />
						<p style="margin-top: 10px;"><span class="number_wrap"><?=draw_number($user, true);?>&nbsp;</span> <strong style="color: #EE227B;"><?=draw_name($user);?></strong></p>
					</div>
				</li>
				<?
			}
		?></ul><?
	}
}
?>