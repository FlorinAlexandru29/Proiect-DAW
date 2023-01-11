<?php 
require_once "vendor/autoload.php";
use Google\Cloud\Storage\StorageClient;
if(isset($_GET["id"]))
{
  $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  $trupa=str_replace("+"," ",$_GET["id"]);
  
 
  $cerere_trupa="SELECT * FROM trupe WHERE nume='".$trupa."' ";
 
  $result_trupa= mysqli_query($conexiune, $cerere_trupa);
  if (mysqli_num_rows($result_trupa) > 0){
  $row_trupa = mysqli_fetch_assoc($result_trupa);
  mysqli_close($conexiune);
  //sfarsit interogare baza de date
  $key="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";
  $key=$decryption=openssl_decrypt ($key, "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
try {
  $storage = new StorageClient([
  'keyFile' => json_decode($key, true)
  ]);
  $bucketName = 'lure-prod-bucket';
    
  $bucket = $storage->bucket($bucketName);
  
  $directory = 'bands/'.$row_trupa['nume'].'/';
  if ($directory == null) {
    // list all files
    $objects = $bucket->objects();
} else {
    // list all files within a directory (sub-directory)
    $options = array('prefix' => $directory);
    $objects = $bucket->objects($options);
}
$i=1;
foreach ($objects as $object) {
  $poza[$i]= $object->name(); 
  $i=$i+1;
  // NOTE: if $object->name() ends with '/' then it is a 'folder'
} 
$n=$i-1; //din cauza ultimului i=i+1 trebuie sa scad ultima adaugare ex pt 3 poze i-ul devine 4



}
  catch(Exception $e) {
    echo $e->getMessage();
} 








  }
  else {header('Location:index.php');exit();}
  

}
else {header('Location:index.php');exit();}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trupa</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
    <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); </style>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <style>

.carousel-inner .carousel-item img{
max-height:350px;
min-height:350px;
object-position:center;
overflow:hidden;
}

@media (max-width:1000px){
  .carousel-inner .carousel-item img{
max-height:250px;
min-height:250px;
object-position:center;
overflow:hidden;
}
}
@media (max-width:700px){
  .carousel-inner .carousel-item img{
max-height:200px;
min-height:200px;
object-position:center;
overflow:hidden;
}
}

@media(max-width:768px){
.carousel .carousel-inner{

height:auto
 }
}
@media (max-width: 2000px){
.container-xl, .container-lg, .container-md, .container-sm, .container {
    max-width: 100%;
}}
    </style>
<?php

if(isset($_POST['logout'])){     //scriptul de logout
  setcookie("user_name", "guest", time()- 120,'/');
  setcookie("profile_pic", '',time()-120,'/');
  header('Location:index.php');
}
@session_start();
if(isset($_SESSION['activat'])){
echo "activeaza-ti contul";
unset($_SESSION['activat']);
}

if(isset($_POST['login-expanded'])) {
  $email=$_POST['email_expanded'];
  $password=$_POST['password_expanded'];
  include 'tools/login.php';}

if(isset($_POST['login-mobile'])){ 
  $email=$_POST['email_mobile'];
  $password=$_POST['password_mobile'];
  include 'tools/login.php';}

if(isset($_POST['forgot_password'])) include 'tools/forgot_password.php';
if (isset($_COOKIE["user_name"])) include 'fragmente/navbar_user.php';
else include 'fragmente/navbar_guest.php'
?>
    <main class="form-signin w-100 m-auto" style="font-family: 'Montserrat', sans-serif;font-size: 1.2rem !important;">
        <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start mt-1" >
          <div class="align-self-center mx-auto my-auto pt-md-4 pb-4 container-trupa">
            <div id="carouselExampleControls" class="carousel slide pb-3" data-bs-ride="carousel">
                <div class="carousel-inner">
                  
               <?php 
               echo"
               <div class='carousel-item active'>
               <img src='https://storage.googleapis.com/lure-prod-bucket/".$poza[1]."' class='d-block w-100' alt='...'>
             </div>";
             for($i=2;$i<=$n;$i++){
              echo"
               <div class='carousel-item'>
               <img src='https://storage.googleapis.com/lure-prod-bucket/".$poza[$i]."' class='d-block w-100' alt='...'>
             </div>";
             }
               
               
               ?>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
                </div>
        <?php 
       echo "<p>".$row_trupa["nume"]."</p>
        <div class='d-flex justify-content-between flex-wrap'>
        <p> Oras: ".$row_trupa['oras']."</p>
        <p> Gen: ".$row_trupa['gen']."</p>
        <p> An Infiintare: ".$row_trupa['an_infiintare']."</p>
        </div>
        <p>".$row_trupa["descriere"]."</p>
        " 
        ?>
        <hr class="my-4">
        <?php 
        $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

        if (mysqli_connect_errno()) {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
         exit();
         }
         $cerere_postare = "SELECT * FROM postari WHERE nume_trupa='".$trupa."' ORDER BY data_postare desc";
         echo $cerere_postare;
         $result_postare=mysqli_query($conexiune, $cerere_postare);
         if (mysqli_num_rows($result_postare) > 0){$i=1;
          while ($row_postare = mysqli_fetch_assoc($result_postare)) {
            if ($i%2==1){
              $continut_cut = str_split($row_postare['continut'], 200);
              echo "
              <div class='my-3 mx-auto row row-cols-1 row-cols-lg-2 g-4 shadow p-3 bg-body rounded-5 card-hover'>
              <div class='col mt-0'>
                     <img class='d-block w-100 h-100 rounded-3' style='max-height:300px;' src='https://storage.googleapis.com/lure-prod-bucket/postari/".$trupa."/".$row_postare['id'].".jpg'>          
                    </div>
              <div class='col my-auto flex-column d-flex align-items-start'>
                <a href='postare.php?id=".$row_postare['id']."' class='text-decoration-none link-dark'>
                  <h4>".$row_postare['titlu']." </h4>
                  <p>".substr($row_postare['data_postare'], 0, -3)."</p>
                  <p> ".$continut_cut[0]."</p>
                    </a>
              </div>
              </div>
              <hr class='my-4'>
              ";
            }
            else {$continut_cut = str_split($row_postare['continut'], 200);
              echo "
              <div class='my-3 mx-auto row g-4 shadow p-3 bg-body rounded-5 card-hover' style='min-height:200px;max-height:300px;'>
              <a href='postare.php?id=".$row_postare['id']."' class='text-decoration-none link-dark'>
              <div class='my-auto flex-column d-flex align-items-start'>
              <h4>".$row_postare['titlu']."</h4>
              <p>".substr($row_postare['data_postare'], 0, -3)."</p>
              <p> ".$continut_cut[0]."</p> 
              </div>   
              </a>   
              </div>
              <hr class='my-4'>
              ";

            }
            $i=$i+1;
          }
        }
        ?>
      </div>
      </div>
      </main>