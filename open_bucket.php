<?php


require 'vendor/autoload.php';
	
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

  //AWS CREDENTIALS
$BUCKET_NAME = 'lureprod';
$IAM_KEY = 'AKIAXXYWM3KJBSRAFP4B';
$IAM_SECRET = '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';

  // Get the access code
  $user_name = $_GET['user_name'];
  // Connect to database
  $con=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

  // Verify valid access code
  $cerere="SELECT * FROM profile_pic WHERE user_name='$user_name'";
  echo $cerere;
  
  $result = mysqli_query($con,$cerere) or die("Error: Invalid request");
  if (mysqli_num_rows($result) != 1) {
    die("Error: Invalid access code");
  }
  $row = mysqli_fetch_array($result);
    $keyPath = $row['location'];
  echo $keyPath;

  // Get file
  try {
    $s3 = S3Client::factory(
      array(
        'credentials' => array(
          'key' => $IAM_KEY,
          'secret' => $IAM_SECRET
        ),
        'version' => 'latest',
        'region'  => 'eu-west-2'
      )
    );

    //
    $result = $s3->getObject(array(
      'Bucket' => $BUCKET_NAME,
      'Key'    => $keyPath
    ));


    // Display it in the browser
    $imageFileType = pathinfo($keyPath,PATHINFO_EXTENSION);
      if($imageFileType == "jpg" || $imageFileType == "jpeg"){
          $mimeType = 'image/jpeg';
      }
      
       if($imageFileType == "png" ){
          $mimeType = 'image/png';
      }
      if($imageFileType == "gif" ){
          $mimeType = 'image/gif';
      }
    header("Content-Type: $mimeType");
    header('Content-Disposition: filename="' . basename($keyPath) . '"');
    echo $result['Body'];

    //Returns file type.



  } catch (Exception $e) {
    die("Error: " . $e->getMessage());
  }

  ?>