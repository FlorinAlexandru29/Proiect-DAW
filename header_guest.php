
<?php

if (isset($_COOKIE["user_name"])) {
  header('Location:index.php');
}
if(isset($_POST['submit'])) include 'login_v2.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
  </head>

  <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
<header class="mh-25 p-2 text-bg-header">
    <div class="container">
      <div class="d-flex flex-nowrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="btn px-3 btn-primary me-2">Home</a></li>
          <li><a href="#" class="btn px-3 rounded-pill btn-outline-header me-2 ">Features</a></li>
          <li><a href="#" class="btn px-3 rounded-pill btn-outline-header me-2">Pricing</a></li>
          <li><a href="#" class="btn px-3 rounded-pill btn-outline-header me-2">FAQs</a></li>
          <li><a href="#" class="btn px-3 rounded-pill btn-outline-header me-2">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
         <input type="search" class="form-control rounded-pill text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>
        <div class="text-center">
          
      <a href="creare_cont.php" class="btn rounded-pill btn-warning me-2 ">Creeaza Cont</a>
       
        </div>
        <div class="btn-group dropend">
          <input type="submit" form="login-form" name="submit" value="Autentifica-te" class="btn btn-warning rounded-login-start">
          
          <button type="button" class="btn btn-dark rounded-login-end dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropend</span>
          </button>
          <form id="login-form" method="POST" action="header_guest.php" class="dropdown-menu p-2" style="min-width:15rem !important;background-color:#eeeeee;border-width: 3px;">
            <div class="mb-1">
              <input type="email" name="email" required class="form-control text-bg-dark"  placeholder="Email">
            </div>
            <div class="mb-1">
              <input type="password" name="parola" required  class="form-control text-bg-dark" placeholder="Password">
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>