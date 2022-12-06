

</div>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>

<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Accordion Item #1
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>
<?php

if (isset($_COOKIE["user_name"])) echo 'Hello:'.$_COOKIE["user_name"];
else {
  echo 'Hello: Guest';
  setcookie("user_name", "guest", time()+ 60,'/'); // expires after 60 seconds
}

?>
<?php

$username=$_POST['username'];
if(isset($_POST['submit'])){
  setcookie("user_name", $username, time()+ 60,'/');
}

?>


<div>

<FORM method="POST" action='index.php'>
<table border=0 width="40%" align="left">
  <tr>
    <td with="30%">User* :</td>
    <td with="70%"><INPUT TYPE="text" name="username" required></td>
  </tr>
  <td><INPUT TYPE="submit" name="submit" VALUE="send"></td>
  </table>
</form>
  </body>
</html>


