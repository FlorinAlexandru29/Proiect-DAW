<HTML>
<HEAD>
<Title> Natura </Title>
<link rel="stylesheet" type="text/css" href="CSS/poze.css">
<link rel="stylesheet" type="text/css" href="CSS/meniu.css">
<style>
@-webkit-keyframes mymove {
  50% {background-color: red;}}
@keyframes mymove {
  50% {background-color: red;}}
  @-webkit-keyframes invers {
  50% {background-color: orange;}}
@keyframes invers {
  50% {background-color: orange;}} </style>
</HEAD>
<BODY bgcolor="#001903">
<form action="http://localhost/search.php" method="post">
<div class="search"> <p style="color:red;font-size:1.1vw;padding:0px;font-family:Forte;" class="specie"> Cautare Rapida: </p>
<input type="text" name="a" style="width:80%;" maxlength="20">
 <input type="image" value="submit" style="display: inline-block;
	vertical-align: middle;" width="15%" height="30%" src="poze/search.png">  </div> </form>
<BR><BR><BR>
<aside style="background:orange;" class="vertical-menu">
  <font style="background:red;" class="active"> MENIU </font>
  <a href="Home.php"> Home </a>
  <a href="Peisaje.php">Peisaje</a>
  <a href="Septicflesh.php">SepticFlesh</a>
  <a href="Violet.php">VioletCold</a>
  </aside>
  <img class="meniu" src="poze/pozameniu2.jpeg">
  <iframe src="silence.mp3" allow="autoplay" id="audio" style="display:none"></iframe>
	<audio id="myaudio" title="BLACKMORES NIGHT - Ghost of a Rose" autoplay controls loop>
	<source src="audio/BLACKMORES NIGHT - Ghost of a Rose.mp3">
	</audio>
	<script>
  var audio = document.getElementById("myaudio");
  audio.volume = 0.2;
</script>
  <div class="content">
<img  src="poze/natura1.jpg">
<p class="info"> <img class="extra" src="poze/setari.png"> 55mm  
<img class="extra" src="poze/apertura.png"> f/8   &nbsp;&nbsp;&nbsp;  1/60s <img class="extra" src="poze/iso.png"> 160 </p>
<p class="specie"> Lupin </p>
<img  src="poze/natura2.jpg">
<p class="info"> <img class="extra" src="poze/setari.png"> 23.2mm  
<img class="extra" src="poze/apertura.png"> f/4.7   &nbsp;&nbsp;&nbsp;  1/60s <img class="extra" src="poze/iso.png"> 140 </p>
<p class="specie"> Liliac </p>
<img  src="poze/natura3.jpg">
<p class="info"> <img class="extra" src="poze/setari.png"> 15.1mm  
<img class="extra" src="poze/apertura.png"> f/4.2   &nbsp;&nbsp;&nbsp;  1/400s <img class="extra" src="poze/iso.png"> 400 </p>
<p class="specie"> Trandafir </p>
 </div>
<form action="http://localhost/intcoment.php" method="post" name="Main">
<Table style="position:relative;left:26%;width:21%;" class="formular" > 
<TR > <TD colspan="2" width="100%"> <p style="font-family:Rockwell;font-size:1.3vw;" class="comentariu"> Introdu un comentariu </p> </TD> </TR>
<TR> <TD width="150px"> <p style="font-family:Rockwell;font-size:1.1vw;text-align:left;" class="comentariu">Nume: </p></TD > 
<TD width="250px"> <input type="text" name="n" size="30" maxlength="20"> </input> </TD> </TR>
<TR> <TD width="150px"> <p style="font-family:Rockwell;font-size:1.1vw;text-align:left;" class="comentariu">Comentariu: </p></TD> 
<TD width="250px"> <input type="text" name="c" size="30" maxlength="50"> </input> </TD> </TR>
<TR> <TD width="150px"> <center> <input type="submit" value="Posteaza"> </center> </input> </TD> 
<TD width="250px"> <center> <input type="reset" value="Anuleaza"> </center></input> </TD> </TR> </TABLE>
<input type="hidden" name="nume" value="Natura"> </input>
</FORM> 
<hr> </hr>
<p class="comentariu">
<?php $apel="Natura.txt"; include 'outcoment.php'; ?> </p> 
</BODY>
</HTML>