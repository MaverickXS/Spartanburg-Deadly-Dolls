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
	    <header>
	    	<div class="main">
	        	<div class="container_24">
	                <div class="grid_24">
	                    <h1><a href="/">SDD</a></h1>
	                    <nav>
	                    	<?
	                    	$_slug = '';
	                    	if (isset($slug)){
	                    		$_slug = $slug;
	                    	}
	                    	?>
	                        <ul class="menu">
	                            <li><a<? if ($_slug=='about-us' || $_slug=='meet-the-dolls' || $_slug=='schedule' || $_slug==''){ ?> class="active"<? } ?> href="/about-us/">About us</a>
	                            	<ul>
	                                	<li><a<? if ($_slug=='meet-the-dolls'){ ?> class="active"<? } ?> href="/meet-the-dolls/">Meet the Dolls</a></li>
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
	                    		<h4>Latest News &amp; Events</h4>
	                    		<?
	                    		// Get FB Access Token
	                    		$url 	= 'https://graph.facebook.com/oauth/access_token?client_id=277754392334380&client_secret=60bdee57edf5d5c7a27da109d543fbab&grant_type=client_credentials';
                    			$ch 	= curl_init();
								curl_setopt($ch, CURLOPT_URL, $url); 
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
								$output = curl_exec($ch); 
								curl_close($ch);
								$fb_access_token = str_ireplace('access_token=', '', $output);

								// Get events
                    			$url 	= 'https://graph.facebook.com/spddolls/events?access_token=' . $fb_access_token; // SDD
                    			//$url 	= 'https://graph.facebook.com/576061663/events?access_token=' . $fb_access_token; // Me
                    			$ch 	= curl_init();
								curl_setopt($ch, CURLOPT_URL, $url); 
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
								$output = curl_exec($ch); 

								// Convert response
								$fb_json = json_decode($output);

								// Handle Output
								if (curl_getinfo($ch, CURLINFO_HTTP_CODE)==200){
									if (count($fb_json) > 0 && strlen($output) > 11){
										$fb_event_array	= $fb_json->data;
										asort($fb_event_array);
										$count			= 0;
										$alt_class		= 'bg1';
										if (count($fb_event_array) > 0){
											foreach ($fb_event_array as $event){
												$event_date = date('Y-m-d H:i:s', strtotime($event->start_time));
												$count++; ?>
					                            <div class="<?=$alt_class;?>">
					                                <div class="box">
					                                    <div class="wrapper">
					                                        <div class="extra-wrap">
					                                        	<time class="time-style" datetime="<?=$event->start_time;?>"><?=date('M d, Y h:iA', strtotime($event_date . " +1 day"));?></time>
					                                            <span class="bl"><strong><?=$event->name;?></strong> @ <?=$event->location;?><br/><a href="https://www.facebook.com/events/<?=$event->id;?>/" target="_blank">RSVP on Facebook</a></span>
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

					                        	if ($count==3 || $count==(count($fb_json) - 1)){
					                        		break;
					                        	} 
					                    	}
					                    } else {
					                    }
					                }
					            }
								curl_close($ch);
		                    	?>
	                        	<!--<div class="bg1">
	                                <div class="box">
	                                    <div class="wrapper">
	                                        <div class="extra-wrap">
	                                        	<time class="time-style" datetime="2012-09-30">September 30th, 2012</time>
	                                            <span class="bl">Bout @ Cirque de Pain</span>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>-->
	                            <div class="bg2">
	                                <div class="box">
	                                    <div class="wrapper">
	                                        <div class="extra-wrap">
	                                            <span class="bl">Keep up to date and get more information about our events on our <a href="https://www.facebook.com/spddolls" target="_blank">Facebook page!</a></span>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>	                            
	                            
	                            <!--<div class="subscribe-bg">
	                            	<h4>Newsletter Sign Up</h4>
	                                <div class="subscribe-pad">
	                                    <form name="subscribe" id="subscribe-form" method="post">
	                                        <label class="label-1">
	                                            <input class="subscribetext" type="text" name="keyword" />
	                                            <a href="#" onClick="document.getElementById('subscribe-form').submit()">Search</a>
	                                        </label>
	                                        <a class="unsubscribe" href="#">unsubscribe</a>
	                                    </form>
	                                </div>
	                            </div>-->
	                        </div>
	                    </div>
	                    <div class="grid_17 content-bg">
	                    	<div class="indent2">
	                        	<div class="border-1 bot-pad p1">