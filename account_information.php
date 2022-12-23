<?php 
  if (isset($_COOKIE["user_name"])) include 'header_user.php';
  else header('Location:index.php');
   $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();}

$cerere_user="SELECT email,activat FROM users WHERE user_name='".$_COOKIE['user_name']." ' ";
$result_user= mysqli_query($conexiune, $cerere_user);
$row = mysqli_fetch_assoc($result_user); 
mysqli_close($conexiune);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
  </head>
<div class="container text-center">
  <div class="row">
    <div class="col">
<?php
  if(isset($_COOKIE["profile_pic"])){
    echo "<img src='resurse/profile_pics/".$_COOKIE["profile_pic"].".png' width='150' height='150' class='rounded-circle'>";
  }
  else echo "<img src='resurse/profile_pics/guest.png' width='150' height='150' class='rounded-circle'>";
  echo 
  
  "<ul class='list-group'>
  <li class='list-group-item'> user_name: ".$_COOKIE['user_name']" </li>
  <li class='list-group-item'> email: ".$row['email']" </li>
  </ul>"; 
?>

    </div>
    <div class="col">
      <?php
      /* echo "status cont: ";
    if ($row['activat']==1) echo "Contul tau este activat!"
    else echo "Contul tau nu este activat";
     */
      ?>
    </div>
  </div>
</div>