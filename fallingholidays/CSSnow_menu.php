<?php

if (!defined('e107_INIT')) { exit; }
 
 // Thanks to Alex-e107nl on Github for providing the code. 
 // https://github.com/e107inc/e107/discussions/5374#discussioncomment-11670978
 
  $text = '<div class="cssnow"></div>
			<script>for(let i=0;i<9;i++){
				document.querySelector(".cssnow").innerHTML += "<span>";}</script>';
  echo $text;
 
 
?>