<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1, user-scalable=no" />
       <meta name="viewport"
      content="width=320.1">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <link rel="apple-touch-icon" href="/images/appletouch/apple-touch-icon-iphone.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="/images/appletouch/apple-touch-icon-ipad.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="/images/appletouch/apple-touch-icon-iphone4.png" />
        <link rel="apple-touch-startup-image" href="/images/appletouch/apple-startup-iPhone.jpg" media="screen and (max-device-width: 320px)" />
<link rel="apple-touch-startup-image" media="(max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2)" href="/images/appletouch/apple-startup-iPhone-retina.jpg" />
        <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="/images/appletouch/apple-startup-iPhone-5.jpg">
        <title>Top10Picks</title>
        		<?php
			//CSS loader
			if(isset($css)) {
				foreach($css as $load)
				{
					echo '<link rel="stylesheet" href="'.$load.'" type="text/css" media="all" />';
				}
			}
		?>
		
        <!-- EXT -->
        <?
        //ext
        if(isset($js)) {
			//Javascript loader
			foreach($js as $load)
			{
				echo '<script src="'.$load.'" type="text/javascript"></script>';
			}
		}
		?>
    </head>
    <body>
