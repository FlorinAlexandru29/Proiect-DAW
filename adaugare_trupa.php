<? 
   if (isset($_POST["add_band"])) {
    $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    $cerere="Insert into trupe(nume,gen,an_infiintare,oras) values ('".$_POST['band_name']."','" .$_POST['gen'] ."','".$_POST['year']."','".$_POST['oras'] ." ')";
    echo $cerere;
    



   }

?>







<?php
   if (isset($_COOKIE["user_name"])) {
    header('Location:index.php');
  } //redirect pe home page daca este deja autentificat
  include 'fragmente/navbar_guest.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adaugare Trupa</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
    <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); </style>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
        <main class="form-signin w-100 m-auto" style="font-family: 'Montserrat', sans-serif;font-size: 1.2rem !important;">
            <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start pt-5 mt-5" >
              <div class="align-self-center mx-auto my-auto pt-1 pt-md-4 pb-4 div-creare-cont" style="width:40%;">
                <hr class="my-4">

                <form method="POST" id="form-adaugrare-trupa" action="adaugare_trupa.php" enctype='multipart/form-data'>
                    <div class="mb-3 input-group-lg">
                           
                        <label for="band_name" class="form-label">Nume Trupa</label>
                        <input type='text' id='band_name' class='form-control' name='band_name' required>
                        </div>

                <div class="mb-3 input-group-lg">
                    <label class="form-label">Selecteaza genul</label>
                    <select id="gen" name="gen" class="form-select" aria-label="Default select example">
                        <option value="rock">rock</option>
                        <option value="pop">pop</option>
                        <option value="folk">folk</option>
                        <option value="rap/hip-hop">rap/hip-hop</option>
                        <option value="muzica electronica">muzica electronica</option>
                      </select> 
                </div>

                    <div class="mb-3 input-group-lg">
                           
                        <label for="oras" class="form-label">Oras</label>
                        <input type="text" class='form-control' id="oras" name="oras" required>
                    </div>
                    <div class="mb-3 input-group-lg">
                           
                        <label for="an_infiintare" class="form-label">An infiintare</label>
                        <input type="number" class='form-control' id="an_infiintare" name="year" minlength="4" required>
                    </div>

                    <div class="input-group mb-3">
                        
                        <input type="file" name="file[]" class="form-control" id="file" multiple>
                        <label class="input-group-text" for="file">Upload</label>
                      </div>
                
                    <hr class="my-4">
                  <input type="submit" value="Adauga Trupa" name="add_band" form="form-adaugrare-trupa" class="mx-auto w-100 btn btn-primary shadow-primary" style="font-family: 'Montserrat', sans-serif;font-size: 1.2rem !important;">
                </form>
               
                
          </body>
          </html>