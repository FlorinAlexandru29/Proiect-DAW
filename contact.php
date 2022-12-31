<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
    <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); </style>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <?php

    if(isset($_POST['logout'])){     //scriptul de logout
      setcookie("user_name", "guest", time()- 60,'/');
      setcookie("profile_pic", '',time()-60,'/');
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
  else include 'fragmente/navbar_guest.php';

//trimitere contact
  if(isset($_POST['trimite_contact'])){

    $subject="Contact ".$_POST['nume_contact'];

    $body="Nume: ". $_POST['nume_contact']." <br> Email: ". $_POST['email_contact']." <br> Telefon: ". $_POST['telefon_contact']." <br> Mesaj: ". $_POST['mesaj_contact'];
    $r_email='lure.production@gmail.com';
    $r_user_name='Lure Prod';
    include 'tools/mailer.php';
    header('Location:contact.php');
    //redirect pe pagina pentru a opri userul din a spama mesaje + alert TO DO

}
  ?>

<!-- contact form-->




    <section class="position-relative bg-light pt-5">
        <div class="container position-relative zindex-2">
          <div class="row">

            <!-- Contact links -->
            <div class="col-xl-4 col-lg-5 pb-4 pb-sm-5 mb-2 mb-sm-0">
              <div class="pe-lg-4 pe-xl-0">
                <h1 class="pb-3 pb-md-4 mb-lg-5 text-center">Contacteaza-ne</h1>
                <div class="d-flex align-items-start pb-3 mb-sm-1 mb-md-3">
                  <div class="bg-light text-primary rounded-circle flex-shrink-0 fs-3 lh-1 p-3">
                    <i class="bx bx-envelope"></i>
                  </div>
                  <div class="ps-3 ps-sm-4">
                    <h2 class="h4 pb-1 mb-2">Trimite-ne un email</h2>
                    <p class="mb-2">Pentru orice intrebari, ne puteti contacta folosind formularul alaturat, sau prin a ne trimite un email direct. </p>
                    <div class="btn btn-link btn-lg px-0">
                      Apasa aici!
                    </div>
                  </div>
                </div>
                
              </div>
            </div>

            <!-- Contact form -->
            <div class="col-xl-6 col-lg-7 offset-xl-2">
              <div class="card border-light shadow-lg py-3 p-sm-4 p-md-5">
                <div class="bg-dark position-absolute top-0 start-0 w-100 h-100 rounded-3 d-none d-dark-mode-block"></div>
                <div class="card-body position-relative zindex-2">
                  <h2 class="card-title pb-3 mb-4 text-center">Completeaza formularul</h2>
                  <form class="row g-4" method="POST" id="form-contact" action="contact.php">
                    <div class="col-12">
                      <label for="fn" class="form-label fs-base">Nume</label>
                      <input type="text" class="form-control form-control-lg is-invalid" name="nume_contact" id="fn" required>
                      <div class="invalid-feedback">Please enter your full name!</div>
                    </div>
                    <div class="col-12">
                      <label for="em" class="form-label fs-base">Adresa de email</label>
                      <input type="email" class="form-control form-control-lg" name="email_contact" id="em" required>
                      
                    </div>
                    <div class="col-12">
                      <label for="tlph" class="form-label fs-base">Nr. de telefon</label>
                      <input type="tel" class="form-control form-control-lg" name="telefon_contact" id="tlph" required>
                      
                    </div>
                    <div class="col-12">
                        <label for="txt" class="form-label fs-base" >Mesajul tau</label>
                        <textarea class="form-control form-control-lg" name="mesaj_contact" rows="5" id="txt" style="resize: none;" required></textarea>
                        
                      </div>
                    <div class="col-12 pt-2 pt-sm-3">
                      <input form="form-contact" type="submit" class="btn btn-lg btn-primary w-100 w-sm-auto" name="trimite_contact" value="Trimite formularul">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>