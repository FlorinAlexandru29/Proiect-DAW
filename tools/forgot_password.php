
<?php


if(isset($_POST['forgot_password'])){
  $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$cerere_user="SELECT user_name,password FROM users WHERE email='".$_POST['email']." ' ";
$result_user= mysqli_query($conexiune, $cerere_user);
if (mysqli_num_rows($result_user) > 0){

  $row = mysqli_fetch_assoc($result_user);

  $subject="Recuperare Parola";

  $body="Pentru contul cu
  username: ".$row["user_name"]."<br>
  email: ".$_POST['email']."<br>
  parola este: ".openssl_decrypt($row['password'], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
  $r_email=$_POST['email'];
  $r_user_name=$row['user_name'];
  mysqli_close($conexiune);
  include 'tools/mailer.php';
  echo "Mesajul a fost trimis pe emailul asociat contului tau";

}
else echo "Nu a fost gasit un cont asociat cu acest email";
mysqli_close($conexiune);
}

?>