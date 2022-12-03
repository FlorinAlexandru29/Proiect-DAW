<?php
$locatie=dirname(__FILE__);$locatie=str_replace("PaginiPlsScripturi","",$locatie);$locatie=$locatie."/comentarii/".$apel;
if (file_exists($locatie)){
$names=file($locatie);
for($i=0;$i<count($names);$i++) {
if($i%2==0) {
	echo '<fieldset style="border-style:1px;border-color:green;padding-bottom:2%;position:relative;left:350px;">
	<legend style="padding:0px;"> 
	<p style="padding:0px;font-size:1.5vw;color:green;" class="comentarii">  Comentariu ',$i/2+1 , "</p> </legend>";
	echo '<p style="font-size:1.3vw;padding:0px;color:red" class="comentarii">',
"NUME: ".$names[$i].'</p>';}
else {echo '<p style="font-size:1.3vw;padding:0px;color:red" class="comentarii">',
"Comentariu: ".$names[$i].
'</p>','</fieldset>';}
}}
else echo '<p  class="comentarii" style="position:relative;left:300px;padding:0px;font-size:1.4vw;color:green;">',"Nu exista comentarii momentan",'</p>';
?>