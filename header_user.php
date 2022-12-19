<header class="p-2 text-bg-header">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
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
        <div class="dropdown text-end">
            <a href="#" class="d-block link-username text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
<?php 

            if(isset($_COOKIE["profile_pic"])){
              echo "<img src='resurse/profile_pics/".$_COOKIE["profile_pic"].".png' width='40' height='40' class='rounded-circle'>";
            }
            else echo "<img src='resurse/profile_pics/guest.png' width='40' height='40' class='rounded-circle'>";
              ?>
          <?php echo 'Hello: '.$_COOKIE["user_name"]; ?>

            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <?php echo "
          <FORM style='height:25px;!important' method='POST' action='index.php'>
          <INPUT class='dropdown-item' TYPE='submit' name='logout' VALUE='Logout'>
          </form>"; ?>
                    </li>
            </ul>
          </div>
      </div>
    </div>
  </header>