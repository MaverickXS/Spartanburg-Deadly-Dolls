<? if (trim($user_detail->twitter)!='' || trim($user_detail->facebook)!='' || trim($user_detail->google_plus)!=''){ ?>
	<span id="social_links" class="float_right">
		<? if (trim($user_detail->facebook)!=''){ ?><a href="http://www.facebook.com/<?=draw_fb_link((object) $user_detail);?>" target="_blank"><img src="/img/social_facebook32.png" /></a><? } ?>
		<? if (trim($user_detail->google_plus)!=''){ ?><a href="http://plus.google.com/<?=$user_detail->google_plus;?>" target="_blank"><img src="/img/social_googleplus32.png" /></a><? } ?>
		<? if (trim($user_detail->twitter)!=''){ ?><a href="http://twitter.com/<?=$user_detail->twitter;?>" target="_blank"><img src="/img/social_twitter32.png" /></a><? } ?>
	</span>
<? } ?>
<h1><?=$page_title;?></h1>
<? if ($user_attributes->num_rows() > 0){
	$group = '';
	$first = true;
	foreach ($user_attributes->result() as $detail){
		if ($group!=$detail->group){
			if (!$first){ ?></dl><? }
			?><h3><?=$detail->group;?></h3><dl><?
			$group = $detail->group;
			$first = false;
		}
		?>
		<dt><?=$detail->attribute;?>:</dt>
			<dd><?=$detail->value;?></dd>
	<? } ?>
	</dl>
<? } ?>