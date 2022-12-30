

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
         <div class="dropdown text-end">
            <a href="#" class="d-block link-username text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <?php 
                
                            if(isset($_COOKIE["profile_pic"])){
                              echo "<img src='https://storage.googleapis.com/lure-prod-bucket/profile_pic/".$_COOKIE["profile_pic"].".jpg' width='40' height='40' class='rounded-circle'>";
                            }
                            else echo "<img src='resurse/profile_pics/guest.png' width='40' height='40' class='rounded-circle'>";
                            
                          php echo 'Hello: '.$_COOKIE["user_name"]; ?>
                
                            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="account_information.php">Informatii Cont</a></li>
              <li><hr class="dropdown-divider"></li>
              <li style='height:34px!important'>
          <FORM  method='POST' action='index.php'>
          <INPUT class='dropdown-item' TYPE='submit' name='logout' VALUE='Logout'>
          </form>
                </li>
            </ul>
          </div>
    </div>
  </nav>
  <!-- Pop-up pentru bara de navigare -->
  <div class=" offcanvas offcanvas-start" tabindex="-1" id="offcanvasstart" aria-labelledby="offcanvasstartLabel" style="width:40%;">
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
    <div id="div-login-mobile" class="container ms-0 position-absolute pe-5">
        <div class="mb-3">
            <a href="#" class="d-block link-username text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <?php 
                
                            if(isset($_COOKIE["profile_pic"])){
                              echo "<img src='https://storage.googleapis.com/lure-prod-bucket/profile_pic/".$_COOKIE["profile_pic"].".jpg' width='40' height='40' class='rounded-circle'>";
                            }
                            else echo "<img src='resurse/profile_pics/guest.png' width='40' height='40' class='rounded-circle'>";
                              ?>
                          <?php echo 'Hello: '.$_COOKIE["user_name"]; ?>
                
                            </a>
            <p class="fs-5 d-block link-username text-dark text-decoration-none">
                <?php 
                
                if(isset($_COOKIE["profile_pic"]))
                    echo "<img src='https://storage.googleapis.com/lure-prod-bucket/profile_pic/".$_COOKIE["profile_pic"].".jpg' width='50' height='50' class='rounded-circle'>";
                    else echo"<img src='resurse/profile_pics/guest.png' width='40' height='40' class='rounded-circle'>";

                     echo 'Hello: '.$_COOKIE["user_name"];
                     ?>
            </p>
        </div>
        <div class="mb-0">
          <a href="#" class="btn w-100 rounded-pill btn-primary ">Informatii Cont</a>
        </div>
        
      </div>
    </div>
    <div class="offcanvas-header border-top">
        <FORM class="w-100 me-2"  method='POST' action='index.php'>
            <INPUT class='btn rounded-pill btn-warning me-2 w-100' TYPE='submit' name='logout' VALUE='Logout'>
            </form>
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