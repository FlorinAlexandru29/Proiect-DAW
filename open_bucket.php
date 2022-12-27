<?php
  $bucketName = 'lureprod';
	$IAM_KEY = 'AKIAXXYWM3KJBSRAFP4B';
	$IAM_SECRET = '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';	

  require '/vendor/autoload.php';
  use Aws\S3\S3Client;
  use Aws\S3\Exception\S3Exception;

  // Get the access code
  $accessCode = $_GET['user_name'];
  echo $accessCode;
/* 	 $accessCode = strtoupper($accessCode);
  $accessCode = trim($accessCode);
  $accessCode = addslashes($accessCode);
  $accessCode = htmlspecialchars($accessCode);

  // Connect to database
  $con=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');

  // Verify valid access code
  $result = mysqli_query($con, "SELECT * FROM profile_pic WHERE user_name='$user_name'") or die("Error: Invalid request");
  if (mysqli_num_rows($result) != 1) {
    die("Error: Invalid access code");
  }
  $row = mysqli_fetch_array($result);
    $keyPath = $row['location'];
  

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
    header("Content-Type: {$result['ContentType']}");
    header('Content-Disposition: filename="' . basename($keyPath) . '"');
    echo $result['Body'];

  } catch (Exception $e) {
    die("Error: " . $e->getMessage());
  } */

  ?>