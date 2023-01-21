<?php
if((isset($_POST['login-expanded']))OR(isset($_POST['login-mobile']))){
$conditie_email="select email FROM users where email='".$email." ' ";
$conditie_password="select email FROM users where password='".openssl_encrypt($password, 'AES-128-CTR', 'kalpsdnj', 0, '1234567891011121')." ' ";
echo $conditie_email;
echo $conditie_password;

$conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
//stergere useri care nu si-au activat contul in ultimele 30 de zile
$cerere_useri_inactivi= mysqli_query($conexiune,"Delete FROM `users` WHERE `data_creare` < DATE_SUB(NOW(), INTERVAL 30 DAY) AND activat=0");


$result_email = mysqli_query($conexiune, $conditie_email);
$result_password = mysqli_query($conexiune, $conditie_password);

if ((mysqli_num_rows($result_email) > 0) && (mysqli_num_rows($result_password) > 0))  {
  echo "Login Realizat cu Succes";

  $cerere_user="SELECT user_name,activat,profile_pic FROM users WHERE email='".$email." ' ";
     $result_user= mysqli_query($conexiune, $cerere_user);
  $row = mysqli_fetch_assoc($result_user);
  
  setcookie("user_name", openssl_encrypt($row["user_name"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121'), time()+ 120,'/');

  @session_start();

  if($row["activat"]==0) {
    $_SESSION['login_pop_up'] = "Contul tau nu este activat, te rugam sa iti activezi contul in maximum 30 de zile pentru a nu pierde accessul la contul tau!";
  }

  mysqli_close($conexiune);
  $redirect_login="Location:".$pagina_request_login;
  header($redirect_login);
  exit() ;
} 
//afisare notificari eroare cont/parola
  else {
    if (mysqli_num_rows($result_email) > 0) {mysqli_close($conexiune);
      $_SESSION['login_pop_up'] = "Parola este gresita!";
      $redirect_login="Location:".$pagina_request_login;
      header($redirect_login);
      exit() ;
              }
    else {mysqli_close($conexiune);
      $_SESSION['login_pop_up'] = "Nu a putut fi gasit un user pentru acest email.";
      $redirect_login="Location:".$pagina_request_login;
      header($redirect_login);
      exit() ;
              }
}
}
?>