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
<script>
      function show_reply(indice) {
        document.getElementById("reply-comm"+indice).style.display = "flex";
      }
      
     function hide_reply(indice) {
      document.getElementById("reply-comm"+indice).style.display = "none";
    }
    </script>
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
                      <h4 class="text-center mb-4 pb-2">Nested comments section</h4>
          
                      <div class="row">
                        <div class="col">
<!--inceput casuta comentariu-->
<?php
if (isset($_COOKIE['user_name'])){
  $cerere="select nume from users where user_name='".openssl_decrypt ($_COOKIE["user_name"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121')."'";
  $result_nume= mysqli_query($conexiune, $cerere);
  $row_nume = mysqli_fetch_assoc($result_nume);
  echo"
  <div class='row mb-5'>
  <div class='d-flex flex-start'  >
    
      <img class='me-3 rounded-circle shadow-1-strong'
        src='https://storage.googleapis.com/lure-prod-bucket/profile_pic/".openssl_decrypt ($_COOKIE["profile_pic"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121').".jpg' alt='avatar'
        width='65' height='65' />
    
    <div class='flex-grow-1 flex-shrink-1'>
      
        <div class='d-flex align-items-start'>
          <p class='mb-1'>
            ".$row_nume['nume']."
          </p>
        </div>
        <form method='POST' action='tools/adaugare_comentariu.php' id='form-adaugare-comentariu'>
        <textarea class='form-control' name='comm' rows='5' style='resize: none;' required> </textarea>
      </div>
    </div>
    <div class='d-flex col justify-content-end mt-2'>
    <input type='hidden' name='post_id' value='".$_GET["id"]."'/>
    <input type='hidden' name='reply' value='no'/>
    <button type='submit' form='form-adaugare-comentariu' name='add_comm' class='d-flex align-items-center btn btn-primary rounded-pill'><span class='small'>Send</span><i class='bx bxs-send fs-lg ms-2'></i></button>
    </form>
    </div>
    </div>";
}
else echo "<p> trebuie sa te autentifici pentru a adauga un comentariu </p>";
$cerere_comentariu="SELECT * FROM comments where reply='no' and id_postare='".$_GET["id"]."' ORDER BY data_comentariu desc";
$result_comentariu=mysqli_query($conexiune, $cerere_comentariu);
if (mysqli_num_rows($result_comentariu) > 0){
  while ($row_comentariu = mysqli_fetch_assoc($result_comentariu)) {
$buton_show_value="onclick=\"show_reply('".$row_comentariu['id_comment']."')\"";
$buton_hide_value="onclick=\"hide_reply('".$row_comentariu['id_comment']."')\"";
    echo "
    <div class='d-flex flex-start'>
    <img class='rounded-circle shadow-1-strong me-3' src='https://storage.googleapis.com/lure-prod-bucket/profile_pic/".$row_comentariu['user_name'].".jpg' alt='avatar' width='65' height='65'>
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
      </div>

      <!-- ultimul comentariu-->
      <div class='row' id='reply-comm".$row_comentariu['id_comment']."'style='display:none !important;'>
      <input type='hidden' name='post_id' value='".$_GET["id"]."'/>
      <input type='hidden' name='reply_id' value='".$row_comentariu['id_comment']."'/>

      <div class='d-flex flex-start mt-4'>
          <img class='me-3 rounded-circle shadow-1-strong' src='https://storage.googleapis.com/lure-prod-bucket/profile_pic/".openssl_decrypt ($_COOKIE["profile_pic"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121').".jpg' alt='avatar' width='65' height='65'>
        <div class='flex-grow-1 flex-shrink-1'>
          <div>
            <div class='d-flex justify-content-between align-items-center'>
              <p class='mb-1'>
              ".$row_nume['nume']."
              </p>
            </div>
            <textarea class='form-control' id='descriere' name='descriere' rows='5' style='resize: none;'> </textarea>
          </div>
        </div>
      </div>
        <div class='d-flex col justify-content-end mt-2'>
          <button class='d-flex align-items-center btn btn-outline-danger rounded-pill' style='margin-left:65px;' ".$buton_hide_value."><span class='small'>Cancel</span><i class='bx bx-message-x fs-lg ms-2'></i></button>
          <button class='ms-5 d-flex align-items-center btn btn-primary rounded-pill'><span class='small'>Send</span><i class='bx bxs-send fs-lg ms-2'></i></button>
        </div>
        </div>
      <!-- form reply-->
    </div>
  </div>
    
    ";
  }


}
else echo "<p> nu exista comentarii momentan </p>";

?>

<!--sf casuta comentariu-->
                          <div class="d-flex flex-start">
                            <img class="rounded-circle shadow-1-strong me-3"
                              src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar" width="65"
                              height="65" />
                            <div class="flex-grow-1 flex-shrink-1">
                              <div>
                                <div class="d-flex justify-content-between align-items-center">
                                  <p class="mb-1">
                                    Maria Smantha <span class="small">- 2 hours ago</span>
                                  </p>
                                  <button class="d-flex align-items-center btn btn-outline-primary rounded-pill btn-sm" onclick="show_reply(1)"><i class="bx bx-share fs-lg me-2"></i><span class="small"> reply</span></button>
                                </div>
                                <p class="small mb-0">
                                  It is a long established fact that a reader will be distracted by
                                  the readable content of a page.
                                </p>
                              </div>
          
                              <div class="d-flex flex-start mt-4">
                                <a class="me-3" href="#">
                                  <img class="rounded-circle shadow-1-strong"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(11).webp" alt="avatar"
                                    width="65" height="65" />
                                </a>
                                <div class="flex-grow-1 flex-shrink-1">
                                  <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <p class="mb-1">
                                        Simona Disa <span class="small">- 3 hours ago</span>
                                      </p>
                                    </div>
                                    <p class="small mb-0">
                                      letters, as opposed to using 'Content here, content here',
                                      making it look like readable English.
                                    </p>
                                  </div>
                                </div>
                              </div>
          
                              <div class="d-flex flex-start mt-4">
                                <a class="me-3" href="#">
                                  <img class="rounded-circle shadow-1-strong"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar"
                                    width="65" height="65" />
                                </a>
                                <div class="flex-grow-1 flex-shrink-1">
                                  <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <p class="mb-1">
                                        John Smith <span class="small">- 4 hours ago</span>
                                      </p>
                                    </div>
                                    <p class="small mb-0">
                                      the majority have suffered alteration in some form, by
                                      injected humour, or randomised words.
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <!-- ultimul comentariu-->
                              <div class="row" id="reply-comm1" style="display:none !important;"  >
                              <div class="d-flex flex-start mt-4"  >
                                <a class="me-3" href="#">
                                  <img class="rounded-circle shadow-1-strong"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar"
                                    width="65" height="65" />
                                </a>
                                <div class="flex-grow-1 flex-shrink-1">
                                  <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <p class="mb-1">
                                        John Smith
                                      </p>
                                    </div>
                                    <textarea class='form-control' id="descriere" name="descriere" rows="5" style="resize: none;" required> </textarea>
                                  </div>
                                </div>
                              </div>
                                <div class="d-flex col justify-content-end mt-2">
                                  <button class="d-flex align-items-center btn btn-outline-danger rounded-pill" style="margin-left:65px;" onclick="hide_reply(1)"><span class="small">Cancel</span><i class='bx bx-message-x fs-lg ms-2'></i></button>
                                  <button class="ms-5 d-flex align-items-center btn btn-primary rounded-pill"><span class="small">Send</span><i class='bx bxs-send fs-lg ms-2'></i></button>
                                  
                                </div>

                                </div>
                              

                              <!-- form reply-->
                            </div>
                          </div>
          
         
                          <div class="d-flex flex-start mt-4">
                            <img class="rounded-circle shadow-1-strong me-3"
                              src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(12).webp" alt="avatar" width="65"
                              height="65" />
                            <div class="flex-grow-1 flex-shrink-1">
                              <div>
                                <div class="d-flex justify-content-between align-items-center">
                                  <p class="mb-1">
                                    Natalie Smith <span class="small">- 2 hours ago</span>
                                  </p>
                                  <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="small"> reply</span></a>
                                </div>
                                <p class="small mb-0">
                                  The standard chunk of Lorem Ipsum used since the 1500s is
                                  reproduced below for those interested. Sections 1.10.32 and
                                  1.10.33.
                                </p>
                              </div>
          
                              <div class="d-flex flex-start mt-4">
                                <a class="me-3" href="#">
                                  <img class="rounded-circle shadow-1-strong"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(31).webp" alt="avatar"
                                    width="65" height="65" />
                                </a>
                                <div class="flex-grow-1 flex-shrink-1">
                                  <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <p class="mb-1">
                                        Lisa Cudrow <span class="small">- 4 hours ago</span>
                                      </p>
                                    </div>
                                    <p class="small mb-0">
                                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
                                      scelerisque ante sollicitudin commodo. Cras purus odio,
                                      vestibulum in vulputate at, tempus viverra turpis.
                                    </p>
                                  </div>
                                </div>
                              </div>
          
                              <div class="d-flex flex-start mt-4">
                                <a class="me-3" href="#">
                                  <img class="rounded-circle shadow-1-strong"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(29).webp" alt="avatar"
                                    width="65" height="65" />
                                </a>
                                <div class="flex-grow-1 flex-shrink-1">
                                  <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <p class="mb-1">
                                        Maggie McLoan <span class="small">- 5 hours ago</span>
                                      </p>
                                    </div>
                                    <p class="small mb-0">
                                      a Latin professor at Hampden-Sydney College in Virginia,
                                      looked up one of the more obscure Latin words, consectetur
                                    </p>
                                  </div>
                                </div>
                              </div>
          
                              <div class="d-flex flex-start mt-4">
                                <a class="me-3" href="#">
                                  <img class="rounded-circle shadow-1-strong"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar"
                                    width="65" height="65" />
                                </a>
                                <div class="flex-grow-1 flex-shrink-1">
                                  <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <p class="mb-1">
                                        John Smith <span class="small">- 6 hours ago</span>
                                      </p>
                                    </div>
                                    <p class="small mb-0">
                                      Autem, totam debitis suscipit saepe sapiente magnam officiis
                                      quaerat necessitatibus odio assumenda, perferendis quae iusto
                                      labore laboriosam minima numquam impedit quam dolorem!
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
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