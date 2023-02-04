

<nav class="navbar navbar-expand-lg p-2 text-bg-header sticky-top">
    <div class="container" style="max-width:1140px !important;">
  
      <button style="background-color:white;" type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasstart" aria-controls="offcanvasstart" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="btn px-3 btn-primary me-2">Home</a></li>
          <li><a href="contact.php" class="btn px-3 rounded-pill btn-outline-header me-2">Contact</a></li>

<?php   

                $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
                 if (mysqli_connect_errno()) {
                   echo "Failed to connect to MySQL: " . mysqli_connect_error();
                   exit();
                 }
                $cerere="select nume, rol, profile_pic, activat from users where user_name='".openssl_decrypt ($_COOKIE["user_name"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121')."'";
                $result_user= mysqli_query($conexiune, $cerere);
                $row_user = mysqli_fetch_assoc($result_user);
                
                $rol=$row_user['rol'];





           if ($rol!="cititor")
                  {
        echo "
        <li><a href='creare_postare.php' class='btn px-3 rounded-pill btn-outline-header me-2'>Adaugare Pagina</a></li>";
        if  ($rol=='admin')
        echo "<li><a href='adaugare_trupa.php' class='btn px-3 rounded-pill btn-outline-header me-2'>Adaugare Trupa</a></li>
        <li><a href='creare_cont.php' class='btn px-3 rounded-pill btn-outline-header me-2'>Creare Cont (ADMIN ONLY) </a></li>
        <li><a href='tools/user_management.php' class='btn px-3 rounded-pill btn-outline-header me-2'>User Management (ADMIN ONLY) </a></li>
        ";

                  }
        ?>
          
          
        </ul>
         <div class="dropdown text-end">
            <a href="#" class="d-block link-username text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <?php 
                if ($row_user['profile_pic']==1) $poza_profil_logat= "https://storage.googleapis.com/lure-prod-bucket/profile_pic/".openssl_decrypt ($_COOKIE["user_name"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121').".jpg";
                  else $poza_profil_logat="../resurse/profile_pics/guest.png";
                              echo "<img src='".$poza_profil_logat."' width='40' height='40' class='rounded-circle me-2'>";                            
                          
                              if ($row_user['activat']==1) $cont_activat=1;
                              else $cont_activat=0;
                          echo 'Hello: '.openssl_decrypt ($_COOKIE["user_name"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121'); ?>
                
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
            <a href="contact.php" class="nav-link">Contact</a>
        </li>
        <?php 
        if ($rol!="cititor")
                  {
        echo "
        <li class='nav-item'>
          <a href='creare_postare.php' class='nav-link'>Adaugare Pagina</a>
        </li>";
        if  ($rol=="admin")
        echo "<li class='nav-item'>
        <a href='adaugare_trupa.php' class='nav-link'>Adaugare Trupa</a>
      </li>
      <li class='nav-item'>
        <a href='creare_cont.php' class='nav-link'>Creare Cont (ADMIN ONLY)</a>
      </li>
      <li class='nav-item'>
        <a href='tools/user_management.php' class='nav-link'>User Management (ADMIN ONLY)</a>
      </li>
      
      
      
      ";

                  }
        ?>
        
        
      </ul>
    <div id="div-login-mobile" class="container ms-0 position-absolute pe-5">
        <div class="mb-3">
            <p class="fs-5 d-block link-username text-dark text-decoration-none">
                <?php 
                echo "<img src='".$poza_profil_logat."' width='40' height='40' class='rounded-circle me-2'>";    
                    echo 'Hello: '.openssl_decrypt ($_COOKIE["user_name"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
                     ?>
            </p>
        </div>
        <div class="mb-0">
          <a href="account_information.php" class="btn w-100 rounded-pill btn-primary ">Informatii Cont</a>
        </div>
        
      </div>
    </div>
    <div class="offcanvas-header border-top">
        <FORM class="w-100 me-2"  method='POST' action='index.php'>
            <INPUT class='btn rounded-pill btn-warning me-2 w-100' TYPE='submit' name='logout' VALUE='Logout'>
            </form>
    </div>      
  </div>