<?php 

    if(isset($_POST['change_password'])){
        if(($_POST['password_s'])!=($_POST['password_c'])) echo "parole nu sunt la fel";
        echo "email".$row['email'];
        
        $cerere_password= "SELECT password from users where email='".$row['email']."'";
        echo $cerere_password;
  $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


$result_password= mysqli_query($conexiune, $cerere_password);
if (mysqli_num_rows($result_password) > 0){
    $password_encript=openssl_encrypt($_POST['password_s'], 'AES-128-CTR', 'kalpsdnj', 0, '1234567891011121');
    $email=$row['email'];
    $cerere="UPDATE users SET password='".$password_encript."' where email='".$email."'";
    mysqli_query($conexiune, $cerere);
    mysqli_close($conexiune);

    echo "Parola schimbata cu succes";
    $r_email=$email;
    $r_user_name=$email;
    $subject= 'Schimbare Parola';
    $body="Salut <br> Parola ta a fost schimbata cu success! <br>
    Noua ta parola este: ".$_POST['password_s']."<br>
    In cazul in care nu ati schimbat parola, va rugam sa ne contactati in mod direct<br>
    Va rugam sa nu raspundeti la acest email!";
    include 'tools/mailer.php';
}

    }

?>