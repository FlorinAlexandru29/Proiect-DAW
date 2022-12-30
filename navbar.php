<nav class="navbar navbar-expand-lg p-2 text-bg-header">
  <div class="container">

    <button style="background-color:white;" type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasstart" aria-controls="offcanvasstart" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.php" class="btn px-3 btn-primary me-2">Home</a></li>
        <li><a href="#" class="btn px-3 rounded-pill btn-outline-header me-2 ">Trupe</a></li>
        <li><a href="contact" class="btn px-3 rounded-pill btn-outline-header me-2">Contact</a></li>
      </ul>
      <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
        <input type="search" class="form-control rounded-pill text-bg-dark" placeholder="Search..." aria-label="Search">
       </form> -->
      <div class="text-center">
          
        <a href="creare_cont.php" class="btn rounded-pill btn-warning me-2 ">Creeaza Cont</a>
         
          </div>
          <div class="btn-group dropend">
            <input type="submit" form="login-form-expanded" name="login-expanded" value="Autentifica-te" class="btn btn-warning " style=" border-bottom-left-radius: 50rem !important;
    border-top-left-radius: 50rem !important;">
            
            <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" style=" border-top-right-radius: 50rem !important;
    border-bottom-right-radius: 50rem !important;">
              <span class="visually-hidden">Toggle Dropend</span>
            </button>
            <form form="login-form-expanded" id="login-form-expanded" method="POST" action="index.php" class="dropdown-menu p-2" style="min-width:15rem !important;background-color:#eeeeee;border-width: 3px;">
              <div class="mb-1">
                <input form="login-form-expanded" type="email" name="email_expanded" required class="form-control text-bg-dark"  placeholder="Email">
              </div>
              <div class="mb-1">
                <input form="login-form-expanded" type="password" name="password_expanded" required  class="form-control text-bg-dark" placeholder="Password">
              </div>
              <div class="mb-1">
                <a href="#" class="d-block link-danger text-decoration-none dropdown-toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvastop" aria-controls="offcanvastop">
                  Ti-ai uitat parola? </a>
                  
              </div>
    </div>
</form>
  </div>
</nav>
<!-- Pop-up pentru bara de navigare -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasstart" aria-labelledby="offcanvasstartLabel" style="width:40%;">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a href="index.php" class="nav-link">Acasa</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Trupe</a>
      </li>
      <li class="nav-item">
        <li class="nav-item">
          <a href="contact.php" class="nav-link">Contact</a>
        </li>
      </li>
    </ul>
  <div class="container ms-0 bottom-0 position-absolute pe-5" style="bottom: 100px !important;" >
    
    <form id="login-form-mobile" method="POST" action="index.php" class="p-2" style="min-width:15rem !important;background-color:#eeeeee;border-width: 3px;">
      <div class="mb-1">
        <input form="login-form-mobile" type="email" name="email_mobile" required class="form-control text-bg-dark"  placeholder="Email">
      </div>
      <div class="mb-1">
        <input form="login-form-mobile" type="password" name="password_mobile" required  class="form-control text-bg-dark" placeholder="Password">
      </div>
      <div class="mb-1">
        <a href="#" class="d-block link-danger text-decoration-none dropdown-toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvastop" aria-controls="offcanvastop">
          Ti-ai uitat parola? </a>
          
      </div>
      <input type="submit" form="login-form-mobile" name="login-mobile" value="Autentifica-te" id="butonautentificare" class="w-100 rounded-pill btn btn-warning ">
      </form>
    </div>
  </div>
  <div class="offcanvas-header border-top">
          
      <a href="creare_cont.php" class="btn rounded-pill btn-warning me-2 w-100" id="butoncreeaza">Creeaza Cont</a>
        
  </div>      
</div>
<!-- Pop-up pentru pierdere parola -->
<div class="offcanvas offcanvas-top" style="height:20vh !important;" tabindex="-1" id="offcanvastop" aria-labelledby="offcanvastopLabel">
  <div class="offcanvas-header">
    <h4 class="offcanvas-title ms-5" id="offcanvastopLabel">Introdu adresa de email aferenta contului tau</h4>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body container" style="margin-left:0 !important;">
    <div class="row">
      <div class="col">
    <form id="form-forgot-password" class="form-floating" method="POST" action="index.php">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="placeholder" required>
      <label for="floatingInput">Adresa de email</label>
    </div>
    <div class="col">
      <input type="submit" form="form-forgot-password" class="mt-2 float-start btn btn-primary" name="forgot_password" value="Trimite">
    </div>
      
      </div>
      </div>
    </form>
  </div>
</div>