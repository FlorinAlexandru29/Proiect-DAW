<?php

if((isset($_GET["email"]))&&(isset($_GET["code"])))
{
    $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    $cerere="UPDATE users SET activat='1' WHERE user_name='".$_GET["email"]."' AND password='".$_GET["code"]."';";

    mysqli_query($conexiune,$cerere);
    mysqli_close($conexiune);

    echo $cerere;
    echo "<br>";
    echo "contul a fost activat cu succes";
    echo "<br>";

}

else echo "codul nu este valid";




echo "email=" . $_GET["email"]."code=".$_GET["code"];

?>