<HTML>
<HEAD>
<Title> VioletCold </Title>
<link rel="stylesheet" type="text/css" href="CSS/review.css">
<link rel="stylesheet" type="text/css" href="CSS/meniu.css">
<style>
@-webkit-keyframes mymove {
  50% {background-color: #00BFFF;}}
@keyframes mymove {
  50% {background-color: #00BFFF;}}
  @-webkit-keyframes invers {
  50% {background-color: blue;}}
@keyframes invers {
  50% {background-color: blue;}} </style>
  </HEAD>
<BODY background="poze/violetmain.png">
<form action="http://localhost/search.php" method="post">
<div class="search"> <p style="color:red;font-size:1.1vw;padding:0px;font-family:Forte;" class="specie"> Cautare Rapida: </p>
<input type="text" name="a" style="width:80%;" maxlength="20">
 <input type="image" value="submit" style="display: inline-block;
	vertical-align: middle;" width="15%" height="30%" src="poze/search.png">  </div> </form>
<aside style="background:blue;" class="vertical-menu">
  <font style="background:#00BFFF;" class="active"> MENIU </font>
  <a href="Home.php">Home</a>
  <a href="Natura.php">Natura</a>
  <a href="peisaje.php">Peisaje</a>
  <a href="Septicflesh.php">SepticFlesh</a>
  </aside>
 <img class="meniu" style="left:20px;" src="poze/pozameniu5.gif">
<div class="principal"> <a class="ref" 
href="https://www.youtube.com/watch?v=Fsr7QJPan7g"> 
VioletCold - Kosmik (2019)</a>
<p style="text-align:center;" class="postare"> <u> Gen : Post Atmospheric Black Metal </u> </p>
<img class="post" src="poze/violet1.jpg">
<p class="postare" style="color:#00BFFF;"> Violet Cold este o trupa ce m-a surprins placut inca de la prima ascultare <BR> <BR>
Este prima oara cand am aflat de ei, iar la prima vedere avem o trupa de atmospheric black metal, 
totusi sound-ul nu este unul clasic, predominand foarte mult riffurile de tip post metal sau shoegazen <BR><BR>
Constructia melodiilor asemanator imprumuta influente din post metal, asa cum se va observa pe melodia Contact <BR> <BR>
In acelasi timp am putut observa spre finalul melodiei Contact si influente de drumstep(muzica electronica) pe partea de vocal <BR><BR>
Avem si vocale de tip neofolk pe anumite pasaje din melodii <BR> <BR>
In urma acestor influente la baza totusi avem o trupa de atmospheric black metal, 
ramand pe scheletul albumului ramand constant pe acest gen intr-o mare de trupe care urmeaza aceleasi tehnici <BR><BR>
Asadar, albumul Kosmik este o experienta ce trebuie incercata, nota mea fiind 8 pentru Violet Cold
<BR> </p>
<center>
<iframe width="70.25%" height="35.17%"
src="https://www.youtube.com/embed/gDdRwyash9I"> </center>
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
<input type="hidden" name="nume" value="Violet"> </input>
</FORM> <BR><BR>
<hr> </hr> <p class="comentariu">
<?php $apel="Violet.txt"; include 'outcoment.php'; ?> </p>
  </body></html>