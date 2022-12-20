


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
          <input type="submit" form="login-form" name="submit" value="Autentifica-te" class="btn btn-warning " style=" border-bottom-left-radius: 50rem !important;
  border-top-left-radius: 50rem !important;">
          
          <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" style=" border-top-right-radius: 50rem !important;
  border-bottom-right-radius: 50rem !important;">
            <span class="visually-hidden">Toggle Dropend</span>
          </button>
          <form id="login-form" method="POST" action="index.php" class="dropdown-menu p-2" style="min-width:15rem !important;background-color:#eeeeee;border-width: 3px;">
            <div class="mb-1">
              <input type="email" name="email" required class="form-control text-bg-dark"  placeholder="Email">
            </div>
            <div class="mb-1">
              <input type="password" name="parola" required  class="form-control text-bg-dark" placeholder="Password">
            </div>
            <div class="mb-1">
              <a href="#" class="d-block link-danger text-decoration-none dropdown-toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvastop" aria-controls="offcanvastop">
                Ti-ai uitat parola? </a>
                
            </div>

          </form>
        </div>
      </div>

    </div>
  </header>
  <div class="offcanvas offcanvas-top" style="height:20vh !important;" tabindex="-1" id="offcanvastop" aria-labelledby="offcanvastopLabel">
    <div class="offcanvas-header">
      <h4 class="offcanvas-title ms-5" id="offcanvastopLabel">Introdu adresa de email aferenta contului tau</h4>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body container text-start">
      <div class="row">
        <div class="col">
      <form class="form-floating">
        <input type="email" class="form-control" id="floatingInputValue" id="floatingInput" placeholder="placeholder" required>
        <label for="floatingInput">Adresa de email</label>
      </div>
      <div class="col">
        <input type="submit" class="mt-2 float-start btn btn-primary" name="forgot" value="Trimite">
      </div>
        
        </div>
        </div>
      </form>
    </div>
  </div>