<?php
require_once "vendor/autoload.php";
use Google\Cloud\Storage\StorageClient;
if (isset($_POST["add_post"])) {
  $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
  echo $_POST['link_videoclip'];
  echo "<br>";
  $cerere="INSERT INTO postari (`id`, `titlu`, `nume_trupa`, `continut`, `data_postare`,link_videoclip) VALUES ('".uniqid()."','".$_POST['post_name']."', '".$_POST['nume_trupa']."','".$_POST['continut_postare']."', '".date("Y-m-d")."','".$_POST['link_videoclip']."')";
  echo $cerere;



}









if(isset($_POST['logout'])){     //scriptul de logout
  setcookie("user_name", "guest", time()- 120,'/');
  setcookie("profile_pic", '',time()-120,'/');
  header('Location:index.php');
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creare Postare</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
    <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); </style>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
<body>
<?php

   if (isset($_COOKIE["user_name"])) {
    include 'fragmente/navbar_user.php';
  } //redirect pe home page daca este deja autentificat
  else  header('Location:index.php'); ?>
    <main class="form-signin w-100 m-auto" style="font-family: 'Montserrat', sans-serif;font-size: 1.2rem !important;">
      <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start" >
        <div class="align-self-center mx-auto my-auto pt-1 pt-md-4 pb-4 div-creare-cont" style="width:40%;">
          <hr class="my-4">

          <form method="POST" id="form-adaugare-postare" action="creare_postare.php" enctype='multipart/form-data'>
              <div class="mb-3 input-group-lg">
                     
                  <label for="post_name" class="form-label">Titlu Postare</label>
                  <input type='text' id='post_name' class='form-control' name='post_name' required>
                  </div>

          <div class="mb-3 input-group-lg">
              <label class="form-label">Selecteaza Trupa</label>
              <select id="nume_trupa" name="nume_trupa" class="form-select" aria-label="Default select example">
                  <option value="placeholder">placeholder</option>
                  <option value="placeholder">placeholder</option>
                  </select> 
          </div>

            
              <div class="mb-3 input-group-lg">
                     
                  <label for="continut_postare" class="form-label">Continut Postare</label>
                  <textarea class='form-control' id="continut_postare" name="continut_postare" rows="5" required> </textarea>
              </div>

              
                <div class="mb-3 input-group-lg">
                     
                  <label for="link_videoclip" class="form-label">Link Youtube</label>
                  <input type='text' id='link_videoclip' class='form-control' name='link_videoclip'>
                  </div>
                  <div class="input-group mb-3">
                  
                    <input type="file" name="file" class="form-control" id="file" required>
                    
                  </div>  
              <hr class="my-4">
            <input type="submit" value="Posteaza!" name="add_post" form="form-adaugare-postare" class="mx-auto w-100 btn btn-primary shadow-primary" style="font-family: 'Montserrat', sans-serif;font-size: 1.2rem !important;">
          </form>
         
          
    </body>
    </html>