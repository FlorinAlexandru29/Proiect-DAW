<?php
/* if (isset($_COOKIE['user_name'])){
    $cod_activare=uniqid();
    $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
      }

    $cerere_user="Select * from users where user_name='".openssl_decrypt ($_COOKIE["user_name"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121')."'";

    $result_user=mysqli_query($conexiune,$cerere_user);
    $row_user = mysqli_fetch_assoc($result_user);

    $cerere_cod_activare="UPDATE users SET cod_activare='".$cod_activare."' user_name='".$row_user['user_name']."'";
    mysqli_query($conexiune,$cerere_cod_activare);

    $pagina_request="index.php";

    $r_email=$row_user['email'];
    $r_user_name=$row_user['user_name'];
    $subject= 'Confirmare Email';
    $body="Buna <br> Pentru a confirma email-ul acceseaza acest link <br>
    <a href='https://lure-prod.herokuapp.com/confirmare.php?email=".$row_user['email']."&code=".$cod_activare."'>
    https://lure-prod.herokuapp.com/confirmare.php?email=".$row_user['email']."&code=".$cod_activare."
    </a>
    <br> 
    O zi buna!
    <br>
    Va rugam sa nu raspundeti la acest email!";
    include 'tools/mailer.php';

}


else {$_SESSION['activare_cont_fail']="Actiunea nu a putut fi realizata. Sesiunea ta a expirat. Te rugam sa te reconectezi !";
    header('Location:index.php');
    exit();}
 */
echo "OK";
?>