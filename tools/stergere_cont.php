<?php
if (isset($_COOKIE['user_name'])){

$cerere_stergere="Select * from users where user_name='".$_COOKIE['user_name']."' AND password='".$_POST['parola_stergere']."' "  ;
echo $cerere_stergere;

}

else {$_SESSION['activare_cont_fail']="Actiunea nu a putut fi realizata. Sesiunea ta a expirat. Te rugam sa te reconectezi !";
    header('Location:index.php');
    exit();}


?>