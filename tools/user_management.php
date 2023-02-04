<?php
if(isset($_POST['logout'])){     //scriptul de logout
  setcookie("user_name", "guest", time()- 259200,'/');
  header('Location:index.php');
}
    if (isset($_COOKIE["user_name"])) {
    
      include '../fragmente/navbar_user.php';
      if ($rol != "admin") header('Location:../index.php');
    } ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Management
    </title>
    <link href="../resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="../resurse/bootstrap/bootstrap.bundle.js"></script>
    <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); </style>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
        <main class="form-signin w-100 m-auto" style="font-family: 'Montserrat', sans-serif;font-size: 1.2rem !important;">
            <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start" >
              <div class="align-self-center mx-auto my-auto pt-1 pt-md-4 pb-4 div-creare-cont" style="width:40%;">
                <hr class="my-4">

                <form method="POST" id="password_management" action="user_management.php">
                        <div class="mb-3 input-group-lg">
                        <label for="criptare_parola" class="form-label">Cripteaza Parola</label>
                        <input type='text' id='criptare_parola' class='form-control' name="criptare_parola">
                        </div>

                        <div class="mb-3 input-group-lg">
                        <label for="decriptare_parola" class="form-label">Decripteaza Parola</label>
                        <input type='text' id='decriptare_parola' class='form-control' name="decriptare_parola">
                        </div>

                        <hr class="my-4">
                        <input type="submit" value="Afisare Parola" name="show_password" form="password_management" class="mx-auto w-100 btn btn-primary shadow-primary" style="font-family: 'Montserrat', sans-serif;font-size: 1.2rem !important;">
                        </form>




                <div class="mb-3 input-group-lg">
                    <label class="form-label">Selecteaza Userul</label>
                    <select id="user" name="user" class="form-select">

                    <?php

$conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$cerere= "SELECT * FROM users WHERE rol != 'admin'";
$result_user_management= mysqli_query($conexiune, $cerere);
if (mysqli_num_rows($result_user_management) > 0){
  while ($row_user_management = mysqli_fetch_assoc($result_user_management)) 
  echo "<option value='".$row_user_management['user_name']."'>".$row_user_management['user_name']."</option>";}
  mysqli_close($conexiune);
                   
                    ?>
                      </select> 
                </div>

                    

                    
                
                    
               
                
          </body>
          </html>



<?php



if(isset($_POST['show_password'])){
  if(isset($_POST['criptare_parola'])){

  $encryption = openssl_encrypt($_POST['criptare_parola'], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');

  echo $encryption;}

if(isset($_POST['decriptare_parola'])){

$decryption=openssl_decrypt ($_POST['decriptare_parola'], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
echo $decryption;}

}
?>