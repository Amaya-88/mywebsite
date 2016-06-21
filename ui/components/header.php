


<?php 
	function addHeader($name, $dfn,$url) 
	{
	   $header_class =  curPageName()==$url?'class="menuFirst"':'';
	
	   echo '<li id="'.$name.'_li" '.$header_class.'>
	   			<a href="'.$url.'.php">
	   				<dfn>'.$dfn.' </dfn>'
	   				.$name.
	   			'</a>
	   		</li>';
	} 
?> 

<?php
	echo '<div id="header" data-lang="<? echo $_SERVER[\'HTTP_ACCEPT_LANGUAGE\']) ?>">
			<div class="menu clearfix">
	      	<a href="#" class="pull">Menu</a>  
	        <ul class="clearfix">';
			
	        addHeader($translation->{'getTranslation'}("MENU_1"),1,'index');
			addHeader($translation->{'getTranslation'}("MENU_2"),7,'curriculum');
			addHeader($translation->{'getTranslation'}("MENU_3"),4,'projects');
			addHeader($translation->{'getTranslation'}("MENU_4"),2,'blog');
			addHeader($translation->{'getTranslation'}("MENU_5"),8,'contact');
			addHeader($translation->{'getTranslation'}("MENU_6"),6,'impressum');
			
	echo '  </ul>
	       </div>
	      </div>';
?>


