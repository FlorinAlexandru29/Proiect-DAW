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

    $cerere="UPDATE users SET password='";echo $cerere;
    $cerere=$cerere.openssl_encrypt($_POST['parola_s'], 'AES-128-CTR', 'kalpsdnj', 0, '1234567891011121');echo $cerere;
    $cerere=$cerere."' where email ='";echo $cerere;
    $cerere=$cerere.$_row["email"]. "'";echo $cerere;
    
    echo $cerere;
    mysqli_query($conexiune, $cerere);
    mysqli_close($conexiune);
}

    }

?>