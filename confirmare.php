<?php
@session_start();

if(isset($_POST['logout'])){     //scriptul de logout
  setcookie("user_name", "", time()- 120,'/');
  header('Location:index.php');
}

if(isset($_POST['login-expanded'])) {
  $email=$_POST['email_expanded'];
  $password=$_POST['password_expanded'];
  $pagina_request_login="index.php";
  include 'tools/login.php';}

if(isset($_POST['login-mobile'])){ 
  $email=$_POST['email_mobile'];
  $password=$_POST['password_mobile'];
  $pagina_request_login="index.php";
  include 'tools/login.php';}

if(isset($_POST['forgot_password'])) include 'tools/forgot_password.php';


if((isset($_GET["email"]))&&(isset($_GET["code"])))
{
    $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    $cerere_cod_activare="SELECT * FROM USERS WHERE email='".$_GET["email"]."' AND cod_activare='".$_GET["code"]."';";
    $result_cod_activare=mysqli_query($conexiune,$cerere_cod_activare);
    if (mysqli_num_rows($result_cod_activare)> 0 ) {
      //daca userul este deja activat
      $row_cod_activare = mysqli_fetch_assoc($result_cod_activare);
      if ($row_cod_activare['activat']==1){
        $_SESSION['activare_cont_fail']="Contul este deja activat";
        header('Location:index.php');
        exit();
      }


    $cerere_activare="UPDATE users SET activat='1' WHERE email='".$_GET["email"]."' AND cod_activare='".$_GET["code"]."';";

    mysqli_query($conexiune,$cerere_activare);
    mysqli_close($conexiune);

    $_SESSION['activare_cont_success']=1;

    header('Location:index.php');
    exit();}

    else {$_SESSION['activare_cont_fail']="Cod Invalid";
      header('Location:index.php');
      exit();}

}

else {$_SESSION['activare_cont_fail']="Cod Invalid";
header('Location:index.php');
exit();}
?>