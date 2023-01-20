<?php
@session_start();



if(isset($_POST['creeaza_cont'])){

  if(($_POST['parola_i'])!=($_POST['parola_c']))
  {
    
    $_SESSION['eroare_confirmare_parola'] = 0;
    header('Location:creare_cont.php');
    exit();
    //afisare notificare
  }
  else{

  $conditie_email="select email FROM users where email='".$_POST['email']." ' ";
  $conditie_user="select user_name FROM users where user_name='".$_POST['user_name']." ' ";

  $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

  if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
  $result_email = mysqli_query($conexiune, $conditie_email);
  $result_user = mysqli_query($conexiune, $conditie_user);

  if (mysqli_num_rows($result_email) > 0) {
    mysqli_close($conexiune);
    $_SESSION['eroare_email'] = 0;
    header('Location:creare_cont.php');
    exit();
  } //afisare notificare,neaparat redirectionare altfel imi baga conturi aiurea
  if (mysqli_num_rows($result_user) > 0) {
    mysqli_close($conexiune);
    $_SESSION['eroare_user_name'] = 0;
    header('Location:creare_cont.php');
    exit();
   } //eroare pentru user-name existent
  
  else{
    date_default_timezone_set('Europe/Bucharest');
    $data_creare_cont = date('Y-m-d H:i');

    $cerere="Insert into users(user_name,nume,email,password,data_creare) values ('".$_POST['user_name']."','".$_POST['nume_prenume']."','" .$_POST['email'] ."','".openssl_encrypt($_POST['parola_i'], 'AES-128-CTR', 'kalpsdnj', 0, '1234567891011121')." ','".$data_creare_cont."')";
    echo $cerere;
    mysqli_query($conexiune, $cerere);
    mysqli_close($conexiune);

    $pagina_request="creare_cont.php";

    $r_email=$_POST['email'];
    $r_user_name=$_POST['username'];
    $subject= 'Confirmare Email';
    $body="Buna <br> Pentru a confirma email-ul acceseaza acest link <br>
    <a href='https://lure-prod.herokuapp.com/confirmare.php?email=".$_POST['email']."&code=".openssl_encrypt($_POST['parola_i'], 'AES-128-CTR', 'kalpsdnj', 0, '1234567891011121')."'>
    https://lure-prod.herokuapp.com/confirmare.php?email=".$_POST['email']."&code=".openssl_encrypt($_POST['parola_i'], 'AES-128-CTR', 'kalpsdnj', 0, '1234567891011121')."
    </a>
    <br> 
    O zi buna!
    <br>
    Va rugam sa nu raspundeti la acest email!";
    include 'tools/mailer.php';
    //afisare notificare
  }
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creare Cont</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
    <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); </style>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>


<body>
  
<?php
  //INAINTE DE A INCARCA ORICE HTML TREBUIE SA MA ASIGUR CA NU AM DUPA EL HEADER(LOCATION:PAGINA)!!! EXEMPLU: HEADERUL DE USER
    if (isset($_COOKIE["user_name"])) {
  header('Location:index.php');
} //redirect pe home page daca este deja autentificat
$pagina_request_login="index.php";
include 'fragmente/navbar_guest.php';
?>
<main class="form-signin w-100 m-auto" style="font-family: 'Montserrat', sans-serif;font-size: 1.2rem !important;">
  <!-- notificare ca a fost creat contul -->
  <?php
 if(isset($_SESSION["creare_cont.php"])){
      echo "
  <div class='toast show align-items-center text-bg-success border-0 mx-auto mt-5 toast-creare-cont' style='width:40%;' role='alert' aria-live='assertive' aria-atomic='true'>
  <div class='d-flex'>
    <div class='toast-body'>
      Cont creat cu succes! Va rugam sa va verificati adresa de email pentru confirmare!
    </div>
    <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>
  </div>
</div>";
      unset($_SESSION['creare_cont.php']);
 }

 if(isset($_SESSION["eroare_trimitere"])){
  echo "
  <div class='toast show align-items-center text-bg-danger border-0 mx-auto mt-5 toast-creare-cont' style='width:40%;' role='alert' aria-live='assertive' aria-atomic='true'>
  <div class='d-flex'>
    <div class='toast-body'>".
    $_SESSION["eroare_trimitere"]."
    </div>
    <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>
  </div>
</div>";
  unset($_SESSION['eroare_trimitere']);
 }
?>

  <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start" >
    <div class="align-self-center mx-auto my-auto pt-1 pt-md-4 pb-4 div-creare-cont" style="width:40%;">
      <hr class="my-4">
      <form method="POST" id="creare_cont" action="creare_cont.php">
      <div class="mb-3 input-group-lg">
        <label for="nume_prenume" class="form-label">Nume si Prenume</label>
        <input type='text' id='nume_prenume' class='form-control' name='nume_prenume' required>
      </div>

      <div class="mb-3 input-group-lg">
        <label for="user_name" class="form-label">Nume de utilizator</label>

        <?php  
        
      
        if(isset($_SESSION["eroare_user_name"])){
          echo " <input type='text' id='user_name' class='form-control is-invalid' name='user_name' required>
          <div class='invalid-feedback'>Exista deja un utilizator cu acest user-name!</div>";
          unset($_SESSION['eroare_user_name']);
        }
        else echo" <input type='text' id='user_name' class='form-control' name='user_name' required>"; 
        ?>
       
      </div>
      <div class="mb-3 input-group-lg">
        <label for="email" class="form-label" >Email</label>
        <?php  
        
      
        if(isset($_SESSION["eroare_email"])){
          echo " <input type='email' id='email' class='form-control is-invalid' name='email' required>
          <div class='invalid-feedback'>Exista deja un utilizator cu acest email!</div>";
          unset($_SESSION['eroare_email']);
        }
        else echo" <input type='email' id='email' class='form-control' name='email' required>"; 
        ?>
        
      </div>
      <div class="mb-3 input-group-lg">
        <label for="password_1" class="form-label">Parola</label>

        <input type="password" id="password_1" class="form-control" name="parola_i" required>
      </div>
      <div class="mb-3 input-group-lg">

        <label for="password_2" class="form-label" >Confirma Parola</label>
        <?php  
        
      
    if(isset($_SESSION["eroare_confirmare_parola"])){
      echo "<input type='password' id='password_2' class='form-control is-invalid' name='parola_c' required>
      <div class='invalid-feedback'>Te rugam sa te asiguri ca parolele introduse sunt la fel!</div>";
      unset($_SESSION['eroare_confirmare_parola']);
    }
    else echo"<input type='password' id='password_2' class='form-control' name='parola_c' required>"; 
    ?>
      </div><hr class="my-4">
        <input type="submit" value="Creeaza cont" name="creeaza_cont" form="creare_cont" class="mx-auto w-100 btn btn-primary shadow-primary" style="font-family: 'Montserrat', sans-serif;font-size: 1.2rem !important;">
      </form>
      
    </div>
  </div>


</body>
</html>