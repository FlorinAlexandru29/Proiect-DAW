<?php
	$a=$_POST['a'];$b=".php";$c=$a.$b;
	if(file_exists($c)){
		header('Location:'.$c);}
	else 
		echo '<p  class="comentarii" style="position:relative;left:300px;padding:0px;font-size:1.4vw;color:green;">',"Pagina ",strtoupper($a)," nu exista",'</p>';
		

?>