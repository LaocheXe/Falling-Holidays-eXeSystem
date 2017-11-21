<?php

if (!defined('e107_INIT')) { exit; }

$pluginpref = e107::pref('fallingholidays');


	if($pluginpref['xmasLightsType'] == 'breakable')
	{
		$text = " <div id='lights'>
		<!-- lights go here -->
		</div>";
		
		//echo $text;
	}
	elseif($pluginpref['xmasLightsType'] == 'normal')
	{
		$text = '<div id="christmas-lights">
		<!-- lights go here -->
		</div>';
		
		//echo $text;
	}
	
	echo $text;

 
?>