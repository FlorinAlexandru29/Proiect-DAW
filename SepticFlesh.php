<HTML>
<HEAD>
<Title> SepticFlesh </Title>
<link rel="stylesheet" type="text/css" href="CSS/review.css">
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
<BODY background="poze/septicmain.png">
<form action="http://localhost/search.php" method="post">
<div class="search"> <p style="color:red;font-size:1.1vw;padding:0px;font-family:Forte;" class="specie"> Cautare Rapida: </p>
<input type="text" name="a" style="width:80%;" maxlength="20">
 <input type="image" value="submit" style="display: inline-block;
	vertical-align: middle;" width="15%" height="30%" src="poze/search.png">  </div> </form>
<aside style="background:orange;" class="vertical-menu">
  <font style="background:red;" class="active"> MENIU </font>
  <a href="Home.php">Home</a>
  <a href="Natura.php">Natura</a>
  <a href="peisaje.php">Peisaje</a>
  <a href="Violet.php">VioletCold</a>
  </aside>
 <img class="meniu" style="left:20px;" src="poze/pozameniu5.gif">
<div class="principal"> <a class="ref" 
href="https://www.youtube.com/playlist?list=OLAK5uy_kkNVjsAYH8aDUjAUtSCHYXrIWiHk7cXps"> 
SepticFlesh - Codex Omega (2017)</a>
<p style="text-align:center;" class="postare"> <u> Gen : Symphonic Melodic Death Metal </u> </p>
<img class="post" src="poze/septic1.jpg">
<p class="postare"> Grecii de la Septicflesh au revenit cu un nou album! <BR> <BR>
De aceasta data se observa faptul ca este vorba de o productie mult mai fina fata de celelalte albume, 
mult mai atenta la detalii, in special in zona chitarilor si a vocii.<BR> <BR>
Albumul are foarte multe puncte forte, dar in special reiese orchestra, la care s-a pus o atentie speciala.<BR> <BR>
Atmosfera albumului este una mult mai sumbra fata de celelalte,
dar in acelasi timp unele melodii aduc o lumina speciala, 
intalnita in melodii precum The Vampire From Nazareth (The Great Mass).<BR> <BR>
Chitara este ceva mai lenta in majoritatea melodiilor, se pastreaza totusi ritmul alert <BR> <BR>
In concluzie este un album de nota 10, unul dintre cele mai bune albume lansate in 2017. </p>
<BR>
<center>
<iframe width="70.25%" height="35.17%" 
src="https://www.youtube.com/embed/gSE0UPuiVnM"> </center>
</iframe>
</div>
<BR><BR><BR>
<HR style="border-color:orange;"> </hr>  <BR><BR>
<form action="http://localhost/intcoment.php" method="post" name="Main">
<Table style="position:relative;left:26%;width:21%;" class="formular" > 
<TR > <TD colspan="2" width="100%"> <p class="comentariu"> Introdu un comentariu </p> </TD> </TR>
<TR> <TD width="150px"> <p  class="comentariu">Nume: </p></TD > 
<TD width="250px"> <input type="text" name="n" size="30" maxlength="20"> </input> </TD> </TR>
<TR> <TD width="150px"> <p  class="comentariu">Comentariu: </p></TD> 
<TD width="250px"> <input type="text" name="c" size="30" maxlength="50"> </input> </TD> </TR>
<TR> <TD width="150px"> <center> <input type="submit" value="Posteaza"> </center> </input> </TD> 
<TD width="250px"> <center> <input type="reset" value="Anuleaza"> </center></input> </TD> </TR> </TABLE>
<input type="hidden" name="nume" value="SepticFlesh"> </input>
</FORM> <BR><BR>
<hr> </hr> <p class="comentariu">
<?php $apel="SepticFlesh.txt"; include 'outcoment.php'; ?> </p> 
  </body></html>