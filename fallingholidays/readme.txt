/*************************** README *******************************************/


To get this plugin work in your theme you need to insert this there:

One way:   put menu in theme $LAYOUT['_header_'] or just some layout
{MENU=XMasLights}
{MENU=Snow3D}

Second way:  put content of  XMasLights_menu.php in your theme.php

<div id='lights'>
  <!-- lights go here -->
 </div>
<div id='Div1' class='snow'></div>

-------------------
To use CSSnow 

<div class="cssnow"></div>
<script>for(let i=0;i<9;i++){
  document.querySelector('.cssnow').innerHTML += '<span>';}</script>