
<?php


if(isset($_POST['forgot_password'])){
  $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
echo "ok1";
$cerere_user="SELECT user_name,password FROM users WHERE email='".$_POST['email']." ' ";
echo $cerere_user;
$result_user= mysqli_query($conexiune, $cerere_user);

echo "ok2";
if (mysqli_num_rows($result_user) > 0){

  $row = mysqli_fetch_assoc($result_user);

  $subject="Recuperare Parola";

  $body="Parola asociata contului ".$row["user_name"]."<br>
  Este: ".openssl_decrypt($row['password'], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
  $r_email=$_POST['email'];
  $r_user_name=$row['user_name'];
  mysqli_close($conexiune);
  include 'tools/mailer.php';
  header('Location:index.php');
}
else echo "Nu a fost gasit un cont asociat cu acest email";
mysqli_close($conexiune);
}

?>