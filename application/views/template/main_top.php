<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Spartanburg Deadly Dolls </title>
	    <meta charset="utf-8">
		<link rel="stylesheet" href="/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/css/bootstrap-responsive.min.css" />
	    <link rel="stylesheet" href="/css/reset.css" type="text/css" media="screen" />
	    <link rel="stylesheet" href="/css/style.css" type="text/css" media="screen" />
	    <link rel="stylesheet" href="/css/grid.css" type="text/css" media="screen" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/js/sdd.js"></script>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-26090863-1']);
		  _gaq.push(['_setDomainName', 'realsteelrollergirls.com']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
    </head>

    <body id="page1">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<!--==============================header=================================-->
        	<?
        	$_slug = '';
        	if (isset($slug)){
        		$_slug = $slug;
        	}
        	?>
	   	    <header>
	    	<div class="main">
	        	<div class="container_24">
	                <div class="grid_24">
	                    <h1><a href="/">SDD</a></h1>
	                    <nav>

	                        <ul class="menu">
	                            <li><a<? if ($_slug=='about-us' || $_slug=='meet_the_dolls' || $_slug=='schedule' || $_slug==''){ ?> class="active"<? } ?> href="/about-us/">About us</a>
	                            	<ul>
	                                	<li><a<? if ($_slug=='meet_the_dolls'){ ?> class="active"<? } ?> href="/meet_the_dolls/">Meet the Dolls</a></li>
	                                    <li><a<? if ($_slug=='schedule'){ ?> class="active"<? } ?> href="/schedule/">Schedule</a></li>
	                                </ul>
	                            </li>
	                            <li><a<? if ($_slug=='join'){ ?> class="active"<? } ?> href="/join/">Join the Dolls</a></li>
	                            <li><a<? if ($_slug=='merchandise'){ ?> class="active"<? } ?> href="/merchandise/">Merchandise</a></li>
	                            <li><a<? if ($_slug=='sponsors'){ ?> class="active"<? } ?> href="/sponsors/">Sponsors</a></li>
	                            <li><a<? if ($_slug=='gallery'){ ?> class="active"<? } ?> href="/gallery/">Gallery</a></li>
	                            <li><a<? if ($_slug=='contact-us'){ ?> class="active"<? } ?> href="/contact-us/">Contact Us</a></li>
	                            <li><a<? if ($_slug=='links'){ ?> class="active"<? } ?> href="/links/">Links</a></li>
	                        </ul>
	                    </nav>
	                    <div class="clear"></div>
	                    <div class="slider-wrapper">
	                    	<div class="banner-bg"></div>
	                        <div class="slider-padding">
	                        <div class="slider">
	                            <ul class="items">
	                                <li>
	                                    <img src="/img/image1.jpg" alt="">
	                                    <div class="banner">
	                                        <img src="/img/logo2.png" alt="">
	                                    </div>
	                                </li>
	                            </ul>
	                        </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="clear"></div>
	            </div>
	        </div>
	    </header>

		<!--==============================content================================-->
	    <section id="content">
	        <div class="main">
	            <div class="container_24">
	                <div class="wrapper">
	                    <div class="grid_7">
	                    	<div class="indent">
	                    		<h4>Upcoming Events</h4>
	                    		<?
	                    		$fb_event_array = get_fb_events();
								$count			= 0;
								$alt_class		= 'bg1';
								if (count($fb_event_array) > 0){
									foreach ($fb_event_array as $key=>$event){
										$event_date = date('Y-m-d H:i:s', strtotime(str_ireplace('-0400', '', str_ireplace('T', ' ', $event['start_time']))));
										$final_date	= date('M d, Y h:iA', strtotime($event_date));
										if (!strpos($event['start_time'], 'T')){
											//$final_date	= date('M d, Y', strtotime($event_date . " +1 day"));
											$final_date	= date('M d, Y', strtotime($event_date));
										}
										$count++; ?>
			                            <div class="<?=$alt_class;?>">
			                                <div class="box">
			                                    <div class="wrapper">
			                                        <div class="extra-wrap">
			                                        	<time class="time-style" datetime="<?=strtotime($event['start_time']);?>"><?=$final_date;?></time>
			                                            <span class="bl"><strong><?=$event['name'];?></strong> @ <?=$event['location'];?><br/><a href="https://www.facebook.com/events/<?=$key;?>/" target="_blank">RSVP on Facebook</a></span>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        	<?
			                        	if ($alt_class=='bg1'){
			                        		$alt_class = 'bg2';
										} else {
											$alt_class	= 'bg1';
										}

			                        	if ($count==3 || $count==(count($fb_event_array) - 1)){
			                        		break;
			                        	}
			                    	}
			                    }
		                    	?>
	                            <div class="bg2">
	                                <div class="box">
	                                    <div class="wrapper">
	                                        <div class="extra-wrap">
	                                            <span class="bl">Keep up to date and get more information about our events on our <a href="https://www.facebook.com/spddolls" target="_blank">Facebook page!</a><br/>
	                                            <a href="https://www.facebook.com/spddolls/events" target="_blank">View All Facebook Events</a>
	                                        	</span>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>

	                            <? if ($_slug!='login' && true==false){ ?>
		                            <div class="subscribe-bg">
		                            	<h4>Deadly Doll Login</h4>
		                                <div class="subscribe-pad">
		                                    <? require_once(APPPATH . '/views/login_view.php'); ?>
		                                </div>
		                            </div>
		                        <? } ?>
	                        </div>
	                    </div>
	                    <div class="grid_17 content-bg">
	                    	<div class="indent2">
	                        	<div class="border-1 bot-pad p1">