<? if (isset($content)){ ?>
	<? if ($content->show_title){ ?>
		<h1><?=$content->title;?></h1>
	<? } ?>
	<?=$content->content;?>
<? } ?>