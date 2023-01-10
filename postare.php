<?php
if(isset($_GET["id"]))
{
  $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  $cerere_postare="SELECT * FROM postari WHERE id='".$_GET["id"]."' ";
  $result_postare= mysqli_query($conexiune, $cerere_postare);
  if (mysqli_num_rows($result_postare) > 0){
  $row_postare = mysqli_fetch_assoc($result_postare);
  mysqli_close($conexiune);}

    else {header('Location:index.php');exit();} //in cazul in care id-ul nu exista
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
    @media screen and (max-width: 1000px){
    .row-cols-1 > * {
    flex: 0 0 auto;
    width: 100%;
}
    iframe {max-height: 400px !important;}
}
    @media screen and (max-width: 600px){
        iframe{max-height: 300px !important;}
    }
</style>
    <main class="form-signin w-100 m-auto" style="font-family: 'Montserrat', sans-serif;font-size: 1.2rem !important;">
        <div class="pt-5 mx-auto row row-cols-1 row-cols-lg-2 g-4" style="width:60%;">
            <div class="col">
                <?php

             echo"   <img class='d-block w-100 h-auto' style='max-height:500px;' 
                src='https://storage.googleapis.com/lure-prod-bucket/postari/".$row_postare['nume_trupa']."/".$row_postare['id'].".jpg'>
                ";
                ?>
                
            </div>
            <div class="col mt-auto mb-0 flex-column d-flex align-items-start">
                <?php 
                echo "<h4>".$row_postare['titlu']." </h4>
                <p>Data Postare: ".$row_postare['data_postare']."</p>
                "

                ?>
                
                <p>Autor: Florin Anghelescu</p>
            </div>
            <hr class="my-4 my-0 w-100">
            </div>
            <div class="pt-2 mx-auto row row-cols-1 row-cols-lg-2 g-4" style="width:60%;">
            <p class="align-items-start" style="width:80%">
            <?php
            echo $row_postare['continut']; 
            ?>
            </p>
            <?php
            if ($row_postare['link_video']!=0) echo "
            <iframe class='pb-5' style='width:100%;max-height:500px;' height='500px' 
            src='".$row_postare['link_video']."?rel=0' title='YouTube video player' frameborder='0' 
            allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' 
            allowfullscreen></iframe>
            "
            ?>
            
            </div>
            </main>