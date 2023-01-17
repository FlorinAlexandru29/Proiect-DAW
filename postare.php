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

 if(isset($_POST['login-expanded'])) {
  $email=$_POST['email_expanded'];
  $password=$_POST['password_expanded'];
  $pagina_apel="postare.php";
  include 'tools/login.php';}

if(isset($_POST['login-mobile'])){ 
  $email=$_POST['email_mobile'];
  $password=$_POST['password_mobile'];
  $pagina_apel="postare.php";
  include 'tools/login.php';}

  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Postare</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
    <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); </style>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
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
      
      
      if(isset($_POST['forgot_password'])) include 'tools/forgot_password.php';
            
    if (isset($_COOKIE["user_name"])) include 'fragmente/navbar_user.php';
    else include 'fragmente/navbar_guest.php'
  ?>
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
        .corp{width:95% !important;}
    }
</style>
<script>
      function show_reply(indice) {
        document.getElementById("reply-comm"+indice).style.display = "flex";
      }
      
     function hide_reply(indice) {
      document.getElementById("reply-comm"+indice).style.display = "none";
    }
    </script>
    <main class="form-signin w-100 m-auto" style="font-family: 'Montserrat', sans-serif;font-size: 1.2rem !important;">
        <div class="pt-5 mx-auto row row-cols-1 row-cols-lg-2 g-4 corp" style="width:60%;">
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
            <div class="pt-2 mx-auto row row-cols-1 row-cols-lg-2 g-4 corp" style="width:60%;">
            <p class="align-items-start" style="width:80%">
            <?php
            echo $row_postare['continut']; 
            ?>
            </p>
            <?php
            if ($row_postare['link_videoclip']!=0){
                $link_videoclip=str_replace("watch?v=","embed/",$row_postare['link_videoclip']);
                echo "
            <iframe class='pb-5' style='width:100%;max-height:500px;' height='500px' 
            src='".$link_videoclip."?rel=0' title='YouTube video player' frameborder='0' 
            allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' 
            allowfullscreen></iframe>
            ";}
            ?>
            <hr class="my-4 w-100">
            <?php 
            $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
            if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              exit();
            }
            ?>
            <section class="gradient-custom w-100">
            <div class="container">
              <div class="row d-flex justify-content-center">
                <div class="col p-0">
                  <div class="card">
                    <div class="card-body p-4">
                      <h4 class="text-center mb-4 pb-2">Comentarii</h4>
          
                      <div class="row">
                        <div class="col">
<!--inceput casuta comentariu-->
<?php
if (isset($_COOKIE['user_name'])){
  if ($cont_activat==1){
  echo"
  <div class='row mb-5'>
  <div class='d-flex flex-start'  >
    
      <img class='me-3 rounded-circle shadow-1-strong'
        src='".$poza_profil_logat."' alt='avatar'
        width='65' height='65' />
    
    <div class='flex-grow-1 flex-shrink-1'>
      
        <div class='d-flex align-items-start'>
          <p class='mb-1'>
            ".$row_user['nume']."
          </p>
        </div>
        <form method='POST' action='tools/adaugare_comentariu.php' id='form-adaugare-comentariu'>
        <textarea class='form-control' name='comm' rows='5' style='resize: none;' required></textarea>
      </div>
    </div>
    <div class='d-flex col justify-content-end mt-2'>
    <input type='hidden' name='user_name' value='".$_COOKIE["user_name"]."'>
    <input type='hidden' name='post_id' value='".$_GET["id"]."'>
    <input type='hidden' name='reply' value='no'>
    <button type='submit' form='form-adaugare-comentariu' name='add_comm' class='d-flex align-items-center btn btn-primary rounded-pill'><span class='small'>Send</span><i class='bx bxs-send fs-lg ms-2'></i></button>
    </form>
    </div>
    </div>";}
    else echo "<p> trebuie sa iti activezi contul pentru a adauga un comentariu </p>"; 
}
else echo "<p> trebuie sa te autentifici pentru a adauga un comentariu </p>";

$cerere_comentariu="SELECT * FROM comments where reply='no' and id_postare='".$_GET["id"]."' ORDER BY data_comentariu desc";
$result_comentariu=mysqli_query($conexiune, $cerere_comentariu);
if (mysqli_num_rows($result_comentariu) > 0){
  while ($row_comentariu = mysqli_fetch_assoc($result_comentariu)) {
$buton_show_value="onclick=\"show_reply('".$row_comentariu['id_comment']."')\"";
$buton_hide_value="onclick=\"hide_reply('".$row_comentariu['id_comment']."')\"";
$cerere_pfp="Select * from users where user_name='".$row_comentariu['user_name']."' and profile_pic=1";
$result_cerere_pfp=mysqli_query($conexiune,$cerere_pfp);
if (mysqli_num_rows($result_cerere_pfp) > 0) $poza_profil="https://storage.googleapis.com/lure-prod-bucket/profile_pic/".$row_comentariu['user_name'].".jpg";
  else $poza_profil="resurse/profile_pics/guest.png";
    echo "
    <div class='d-flex flex-start mb-4'>
    <img class='rounded-circle shadow-1-strong me-3' src='".$poza_profil."' alt='avatar' width='65' height='65'>
    <div class='flex-grow-1 flex-shrink-1'>
      <div>
        <div class='d-flex justify-content-between align-items-center'>
          <p class='mb-1'>
            ".$row_comentariu['user_name']." <span class='small'>- ".$row_comentariu['data_comentariu']."</span>
          </p>
          
          <button class='d-flex align-items-center btn btn-outline-primary rounded-pill btn-sm' ".$buton_show_value."><i class='bx bx-share fs-lg me-2'></i><span class='small'> reply</span></button>
        
        </div>
        <p class='small mb-0'>
         ".$row_comentariu['comentariu']."
        </p>
      </div>";
     $cerere_reply="SELECT * From comments WHERE id_postare='".$_GET["id"]."' and reply='".$row_comentariu['id_comment']."' ORDER BY data_comentariu desc ";
     $result_reply=mysqli_query($conexiune, $cerere_reply);
     if (mysqli_num_rows($result_reply) > 0){
      while ($row_reply = mysqli_fetch_assoc($result_reply)) {
        $cerere_pfp="Select * from users where user_name='".$row_reply['user_name']."' and profile_pic=1";
        $result_cerere_pfp=mysqli_query($conexiune,$cerere_pfp);
        if (mysqli_num_rows($result_cerere_pfp) > 0) $poza_profil="https://storage.googleapis.com/lure-prod-bucket/profile_pic/".$row_comentariu['user_name'].".jpg";
        else $poza_profil="resurse/profile_pics/guest.png";
        
          echo "<div class='d-flex flex-start mt-4'>
          
            <img class='me-3 rounded-circle shadow-1-strong' src='".$poza_profil."' alt='avatar' width='65' height='65'>
        
          <div class='flex-grow-1 flex-shrink-1'>
            <div>
              <div class='d-flex justify-content-between align-items-center'>
                <p class='mb-1'>
                ".$row_reply['user_name']." <span class='small'>- ".$row_reply['data_comentariu']."</span>
                </p>
              </div>
              <p class='small mb-0'>
              ".$row_reply['comentariu']."
              </p>
            </div>
          </div>
        </div>
          ";
      }
     }





      if (isset($_COOKIE['user_name'])){ 
        if ($cont_activat==1){
      echo "
      <!-- ultimul comentariu-->
      <div class='row' id='reply-comm".$row_comentariu['id_comment']."'style='display:none !important;'>
      <form method='POST' action='tools/adaugare_comentariu.php' id='form-reply-".$row_comentariu['id_comment']."'>
      <input type='hidden' name='user_name' value='".$_COOKIE["user_name"]."'>
      <input type='hidden' name='post_id' value='".$_GET["id"]."'/>
      <input type='hidden' name='reply' value='".$row_comentariu['id_comment']."'/>

      <div class='d-flex flex-start mt-4'>
          <img class='me-3 rounded-circle shadow-1-strong' src='".$poza_profil_logat."' alt='avatar' width='65' height='65'>
        <div class='flex-grow-1 flex-shrink-1'>
          <div>
            <div class='d-flex justify-content-between align-items-center'>
              <p class='mb-1'>
              ".$row_nume['nume']."
              </p>
            </div>
            <textarea class='form-control' name='comm' rows='5' style='resize: none;' required></textarea>
          </div>
        </div>
      </div>
        <div class='d-flex col justify-content-end mt-2'>
          <button class='d-flex align-items-center btn btn-outline-danger rounded-pill' style='margin-left:65px;' ".$buton_hide_value."><span class='small'>Cancel</span><i class='bx bx-message-x fs-lg ms-2'></i></button>
          <button type='submit' form='form-reply-".$row_comentariu['id_comment']."' name='add_comm' class='ms-5 d-flex align-items-center btn btn-primary rounded-pill'><span class='small'>Send</span><i class='bx bxs-send fs-lg ms-2'></i></button>
       </form>
          </div>
        </div>
      <!-- form reply-->
    </div>
  </div>
    
    ";}
    else echo "<p class='mt-5' id='reply-comm".$row_comentariu['id_comment']."'style='display:none !important;'> Trebuie sa iti activezi contul pentru a adauga un comentariu </div> </div>";
  }
    else echo "<p class='mt-5' id='reply-comm".$row_comentariu['id_comment']."'style='display:none !important;'> Trebuie sa te autentifici pentru a adauga un comentariu </div> </div>";
  }


}
else echo "<p> nu exista comentarii momentan </p>";

?>

<!--sf casuta comentariu-->

                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
            </div>
            </main>