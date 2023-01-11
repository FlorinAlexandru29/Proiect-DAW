<?php
require_once "vendor/autoload.php";
use Google\Cloud\Storage\StorageClient;
if (isset($_POST["add_post"])) {
  $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    if (($_POST['link_videoclip'])=='')
    $_POST['link_videoclip']=0;
    echo $_POST['link_videoclip'];
    echo "<br>";
    $id_postare=uniqid();
    date_default_timezone_set('Europe/Bucharest');
    $data_postare = date('Y-m-d H:i');

        $diacritice = array("ă", "î", "ș", "ț", "â","Ă", "Î", "Ș", "Ț", "Â");
        $diacritice_inlocuitor = array ("a", "i", "s", "t", "a","A", "I", "S", "T", "A");
        $continut_fara_diacritice = str_replace($diacritice, $diacritice_inlocuitor, $_POST['continut_postare']);



    $cerere="INSERT INTO postari (`id`, `titlu`, `nume_trupa`, `continut`, `data_postare`,link_videoclip) VALUES ('".$id_postare."','".$_POST['post_name']."', '".$_POST['nume_trupa']."','".$continut_fara_diacritice."', '".$data_postare."','".$_POST['link_videoclip']."')";
    echo $cerere;
    mysqli_query($conexiune, $cerere);
    mysqli_close($conexiune);  

// sfarsit inserare baza de date
$key="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";
$key=$decryption=openssl_decrypt ($key, "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
try { //setari pentru conexiunea la cloud

  $storage = new StorageClient([
  'keyFile' => json_decode($key, true)
  ]);
  $bucketName = 'lure-prod-bucket';
  $bucket = $storage->bucket($bucketName);
//preluare informatii fisier

  $fileContent = file_get_contents($_FILES["poza_postare"]["tmp_name"]);
  $cloudPath = 'postari/' .$_POST['nume_trupa']."/".$id_postare.".jpg";
//Upload

  $storageObject = $bucket->upload(
    $fileContent,
[
'name' => $cloudPath,
'metadata' => [
    'cacheControl' => "private,max-age=0,no-store"
]
]
);

echo "File uploaded successfully. File path is: https://storage.googleapis.com/$bucketName/$cloudPath";
}

  catch(Exception $e) {
    echo $e->getMessage();
  } 


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
  else  include 'fragmente/navbar_guest.php'; ?>
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
                <?php
                $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
                if (mysqli_connect_errno()) {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  exit();
                }
                $cerere_nume_trupa="SELECT nume from trupe ORDER BY nume";
                $result_nume_trupa=mysqli_query($conexiune, $cerere_nume_trupa);
                if (mysqli_num_rows($result_nume_trupa) > 0){
                  while ($row_nume_trupe = mysqli_fetch_assoc($result_nume_trupa)) {
                    echo "<option value='".$row_nume_trupe['nume']."'>".$row_nume_trupe['nume']."</option>";
                }}
                
                ?>
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
                  <label class="form-label">Poza Postare</label>
                    <input type="file" name="poza_postare" class="form-control" id="poza_postare" required>
                    
                  </div>  
              <hr class="my-4">
            <input type="submit" value="Posteaza!" name="add_post" form="form-adaugare-postare" class="mx-auto w-100 btn btn-primary shadow-primary" style="font-family: 'Montserrat', sans-serif;font-size: 1.2rem !important;">
          </form>
         
          
    </body>
    </html>