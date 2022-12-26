<?php 

    if(isset($_POST['change_password'])){
        if(($_POST['password_s'])!=($_POST['password_c'])) header('Location:index.php');

  $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$cerere_password="SELECT password FROM users WHERE email='".$_row['email']." ' ";
$result_password= mysqli_query($conexiune, $cerere_password);
if (mysqli_num_rows($result_password) > 0){

    $cerere="UPDATE users SET password='".openssl_encrypt(['password_s'])."' WHERE email='".$_row["email"]."'";
    mysqli_query($conexiune, $cerere);
    mysqli_close($conexiune);
}

    }

?>