

<?php 



 

   $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();}

$cerere_user="SELECT email,activat,user_name,profile_pic FROM users WHERE user_name='".openssl_decrypt ($_COOKIE["user_name"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121')." ' ";
$result_user= mysqli_query($conexiune, $cerere_user);
$row = mysqli_fetch_assoc($result_user); 
mysqli_close($conexiune);
if(isset($_POST['change_password'])) include 'tools/change_password.php';
if(isset($_POST['save_photo'])) include 'tools/google_upload.php';


if(isset($_POST['logout'])){     //scriptul de logout
  setcookie("user_name", "guest", time()- 120,'/');
  setcookie("profile_pic", '',time()-120,'/');
  header('Location:index.php');
}
if (isset($_COOKIE["user_name"])) include 'fragmente/navbar_user.php';
else header('Location:index.php');


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informatii Cont</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <style>
        @media screen and (max-width: 1000px) {
  .row{display:block !important;
        }
    .container{max-width:90% !important;}
}
    </style>
  </head>
<div class="container text-center mt-3">
  <div class="row">
    <div class="col">
    <ul class='list-group'>
    <li class='list-group-item'>
    <div class="d-table position-relative mx-auto mt-2 mt-lg-4 pt-5 mb-3">
<?php

if(isset($_COOKIE["profile_pic"])){
    echo "
    <img src='https://storage.googleapis.com/lure-prod-bucket/profile_pic/".$row['user_name'].".jpg' style='width:200px;height:200px;'  class='d-block img-thumbnail rounded-circle' alt='Profile Pic'>";
  }
  else echo "
  <img src='resurse/profile_pics/guest.png' width='200' class='d-block img-thumbnail rounded-circle' alt='Guest Profile Pic'>";

  ?>
  <form action="account_information.php" method="POST" enctype="multipart/form-data" id="form1">
    
  <button type="button" id="btnFileUpload" class="btn btn-icon btn-light bg-white btn-sm border rounded-circle shadow-sm position-absolute bottom-0 end-0 me-4" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Schimba poza de profil">
  <i class="bx bx-refresh bx-md">    </i> </button>
<input type="file" id="FileUpload1" name="FileUpload1" style="display: none" />
</div>
<span id="spnFilePath"></span>
<input class="btn rounded-pill btn-success mb-2" type="submit" value="Salveaza poza" name="save_photo" form="form1">
</form>
<script type="text/javascript">
    window.onload = function () {
        var fileupload = document.getElementById("FileUpload1");
        var filePath = document.getElementById("spnFilePath");
        var button = document.getElementById("btnFileUpload");
        button.onclick = function () {
            fileupload.click();
        };
        fileupload.onchange = function () {
            var fileName = fileupload.value.split('\\')[fileupload.value.split('\\').length - 1];
            filePath.innerHTML = "<b>Selected File: </b>" + fileName;
        };
    };
</script>
</li>
<li class='list-group-item p-0'>
<div class="accordion" id="accordionExample">
<div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Schimbare parola
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
      <div class="accordion-body p-2">

      
      <form method="POST" id="form-schimbare-parola" action="account_information.php" class="mb-0">
    <div class="form-floating mb-3">
  <input type="password" class="form-control" name="password_i" id="floatingInput_password_i" placeholder="password" required>
  <label for="floatingInput_password_i">Parola initiala</label>
    </div>
    <div class="form-floating mb-3">
  <input type="password" class="form-control" name="password_s" id="floatingInput_password_s" placeholder="password" required>
  <label for="floatingInput_password_s">Parola schimbata</label>
    </div>
    <div class="form-floating mb-3">
  <input type="password" class="form-control" name="password_c" id="floatingInput_password_c" placeholder="password" required>
  <label for="floatingInput_password_c">Confirma parola schimbata</label>
    </div>


        <input type="submit" value="Schimba Parola" name="change_password" form="form-schimbare-parola" class="mx-auto w-100 btn btn-danger shadow-primary" style="font-family: 'Montserrat', sans-serif;font-size: 1.2rem !important;">
      </form>
      
      </div>
    </div>
  </div>
  </div>
  </li>
    </div>
    <div class="col">
    <ul class='list-group'>
    <?php
  echo 
  
  "
  <li class='list-group-item'> user_name: ".openssl_decrypt ($_COOKIE["user_name"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121')." </li>
  <li class='list-group-item'> email: ".$row['email']." </li>
  ";

?>
    <li class='list-group-item'>
      <?php
       echo "status cont: ";
    if ($row['activat']==1) echo "Contul tau este activat!";
    else echo "Contul tau nu este activat";
     
      ?>
      
        </li>
        <script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>


<li class='list-group-item'>
</li> 
</ul>

    </div>
  </div>
</div>