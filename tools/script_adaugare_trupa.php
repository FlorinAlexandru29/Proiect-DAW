<? 
 require_once "vendor/autoload.php";
    
 use Google\Cloud\Storage\StorageClient;
   if (isset($_POST["add_band"])) {
  
   

    $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    $cerere="Insert into trupe(nume,gen,an_infiintare,oras) values ('".$_POST['band_name']."','" .$_POST['gen'] ."','".$_POST['year']."','".$_POST['oras']."')";
    echo $cerere;
    mysqli_query($conexiune, $cerere);
    mysqli_close($conexiune);
// sfarsit inserare baza de date





    $countfiles = count($_FILES['file']['name']);
    for($i=0;$i<$countfiles;$i++){
      $filename = $_FILES['file']['name'][$i];
 
      // Upload file
  
 }






   }
   ?>