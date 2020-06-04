<!-- BEGIN: menu -->
<ul>
  
	<?php
	
		foreach($sections as $key => $value){
			$class = ($key == $page)?"on":"";
			print("<li id='". $key ."' class='" . $class . "'><a href='" . $key . ".html'>" . $value . "</a></li>");
		}
   
   ?>
	
</ul>
<!-- END: menu -->