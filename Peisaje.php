
<HTML>
<HEAD>
<Title> Peisaje </Title>
<link rel="stylesheet" type="text/css" href="CSS/poze.css">
<link rel="stylesheet" type="text/css" href="CSS/meniu.css">
<style>
@-webkit-keyframes mymove {
  50% {background-color: #00008B;}}
@keyframes mymove {
  50% {background-color: #00008B;}}
  @-webkit-keyframes invers {
  50% {background-color: #085191;}}
@keyframes invers {
  50% {background-color: #085191;}} </style>
</HEAD>
<BODY background="poze/peisajmain.png">
<form action="http://localhost/search.php" method="post">
<div class="search"> <p style="color:red;font-size:1.1vw;padding:0px;font-family:Forte;" class="specie"> Cautare Rapida: </p>
<input type="text" name="a" style="width:80%;"  maxlength="20">
 <input type="image" value="submit" style="display: inline-block;
	vertical-align: middle;" width="15%" height="30%" src="poze/search.png">  </div> </form>
<BR><BR><BR>
<aside style="background:#085191;" class="vertical-menu">
  <font style="background:#00008B;" class="active"> MENIU </font>
  <a href="Home.php">Home</a>
  <a href="Natura.php">Natura</a>
  <a href="Septicflesh.php">SepticFlesh</a>
  <a href="Violet.php">VioletCold</a>
   </aside>

  <img class="meniu" src="poze/pozameniu1.jpg">
  <iframe src="silence.mp3" allow="autoplay" id="audio" style="display:none"></iframe>
	<audio id="myaudio" title="FAUN - Federkleid" autoplay controls loop>
	<source src="audio/FAUN - Federkleid.mp3">
	</audio>
	<script>
  var audio = document.getElementById("myaudio");
  audio.volume = 0.2;
</script>
  <div class="content">
<img src="poze/peisaj1.jpg">
<p class="info"> <img class="extra" src="poze/setari.png"> 24mm  
<img class="extra" src="poze/apertura.png"> f/22   &nbsp;&nbsp;&nbsp;  1/10s <img class="extra" src="poze/iso.png"> 100 </p>
<p class="extra"> Locatie: Podul Dobroiesti </p>
<img  src="poze/peisaj2.jpg">
<p class="info"> <img class="extra" src="poze/setari.png"> 23.2mm 
<img class="extra" src="poze/apertura.png"> f/13   &nbsp;&nbsp;&nbsp;  1/160s <img class="extra" src="poze/iso.png"> 80 </p>
<p class="extra"> Locatie: Lacul Morii </p>
<img  src="poze/peisaj3.jpg">
<p class="info"> <img class="extra" src="poze/setari.png"> 55mm  
<img class="extra" src="poze/apertura.png"> f/14   &nbsp;&nbsp;&nbsp;  1/640s <img class="extra" src="poze/iso.png"> 800 </p>
<p class="extra"> Locatie: Parcul Carol I </p> </div>
<br>

<form action="http://localhost/intcoment.php" method="post" name="Main">
<Table style="position:relative;left:26%;width:21%;" > 
<TR > <TD colspan="2" width="100%"> <p style="color:#00BFFF;font-family:Rockwell;font-size:1.3vw;" class="comentariu"> Introdu un comentariu </p> </TD> </TR>
<TR> <TD width="150px"> <p style="color:#00BFFF;font-family:Rockwell;font-size:1.1vw;text-align:left;" class="comentariu">Nume: </p></TD > 
<TD width="250px"> <input type="text" name="n" size="30" maxlength="20"> </input> </TD> </TR>
<TR> <TD width="150px"> <p style="color:#00BFFF;font-family:Rockwell;font-size:1.1vw;text-align:left;" class="comentariu">Comentariu: </p></TD> 
<TD width="250px"> <input type="text" name="c" size="30" maxlength="50"> </input> </TD> </TR>
<TR> <TD width="150px"> <center> <input type="submit" value="Posteaza"> </center> </input> </TD> 
<TD width="250px"> <center> <input type="reset" value="Anuleaza"> </center></input> </TD> </TR> </TABLE>
<input type="hidden" name="nume" value="Peisaje"> </input>
</FORM> 
<hr> </hr> <p class="comentariu">
<?php $apel="Peisaje.txt"; include 'outcoment.php'; ?> </p>
</BODY>
</HTML>