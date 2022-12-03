<?php
$title=$_POST["nume"].".txt";$locatie=dirname(__FILE__);$locatie=str_replace("PaginiPlsScripturi","",$locatie);
$locatie=$locatie."/comentarii/".$title;
$nume=$_POST['n'];
$com=$_POST['c'];
$scrie=fopen($locatie, "a") or die;
if($com){
if($nume) fwrite($scrie,$nume."\r\n");
else fwrite($scrie, "Anonim\r\n");
fwrite($scrie,$com."\r\n");}
header('Location:'.$_POST["nume"].".php");
?>