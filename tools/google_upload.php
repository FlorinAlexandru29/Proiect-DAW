<?php
require_once "vendor/autoload.php";

use Google\Cloud\Storage\StorageClient;
$key="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";
$key=$decryption=openssl_decrypt ($key, "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
if ($_FILES["FileUpload1"]["size"] > 25000000) {
    $_SESSION['eroare_trimitere']="Eroare salvare poza profil. Poza depaseste 25MB ";
    header('Location:account_information.php');
    exit();
  }
 try {
    $storage = new StorageClient([
    'keyFile' => json_decode($key, true)
    ]);

    

    
     $fileContent = file_get_contents($_FILES["FileUpload1"]["tmp_name"]);
    $cloudPath = 'profile_pic/' . openssl_decrypt ($_POST["user_name"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121').".jpg";


    $bucketName = 'lure-prod-bucket';
    
    $bucket = $storage->bucket($bucketName);


      $directory = 'profile_pic/';
    if ($directory == null) {
        // list all files
        $objects = $bucket->objects();
    } else {
        // list all files within a directory (sub-directory)
        $options = array('prefix' => $directory);
        $objects = $bucket->objects($options);
    }
    

    foreach ($objects as $object) {
        print $object->name() . PHP_EOL;
        $poza_profil=$object->name();
        if ($poza_profil==$row['user_name'].".jpg"){
            
           $object->update([
        'metadata' => [
            'cacheControl' => "private,max-age=0,no-store",
        ]
    ]);
            $object->delete();
        }
        echo "<BR>";
        // NOTE: if $object->name() ends with '/' then it is a 'folder'
    }  
     $storageObject = $bucket->upload(
        $fileContent,
  [
    'name' => $cloudPath,
    'metadata' => [
        'cacheControl' => "private,max-age=0,no-store"
    ]
  ]
);

     if ($_row['profile_pic']==0){ //todo select profile pic
    $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
      }
    $cerere="UPDATE users SET profile_pic='1' WHERE user_name='".openssl_decrypt ($_POST["user_name"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121')."'";
    mysqli_query($conexiune,$cerere);
    mysqli_close($conexiune);
    }
    $_SESSION['upload_success'] = 0;
    header('Location:account_information.php');
    exit();
    
} 
catch(Exception $e) {
    $_SESSION['eroare_trimitere']="Eroare salvare poza profil. Mesaj Eroare: ".$e->getMessage();
    header('Location:account_information.php');
    exit();
} 

?>