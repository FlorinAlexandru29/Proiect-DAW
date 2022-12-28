<?php
require_once "vendor/autoload.php";
 
use Google\Cloud\Storage\StorageClient;
 
$fileContent = file_get_contents($_FILES["file"]["tmp_name"]);
$cloudPath = 'uploads/' . $_FILES["file"]["name"];

$gs_name = $_FILES["uploaded_files"]["tmp_name"]; 
$fileType = $_FILES["uploaded_files"]["type"]; 
$fileSize = $_FILES["uploaded_files"]["size"]; 
$fileErrorMsg = $_FILES["uploaded_files"]["error"]; 
$fileExt = pathinfo($_FILES['uploaded_files']['name'], PATHINFO_EXTENSION);

// put to cloud storage
$image = file_get_contents($gs_name);
$options = [ "gs" => [ "Content-Type" => "image/jpeg"]];
$ctx = stream_context_create($options);
file_put_contents("gs://<bucketname>/".$fileName, $gs_name, 0, $ctx);

// or move 
$moveResult = move_uploaded_file($gs_name, 'gs://<bucketname>/'.$fileName); 

try {
    $storage = new StorageClient([
        'keyFilePath' => 'JSON_KEY_FILE_PATH',
    ]);
    $file = $_FILES["FileUpload1"]['tmp_name'];

    $bucketName = 'lure-prod-bucket';
    $fileName = '1.jpg';
    
    $bucket = $storage->bucket($bucketName);
    $object = $bucket->upload(
        $file,
        [
            'predefinedAcl' => 'publicRead'
        ]
    );

    echo "File uploaded successfully. File path is: https://storage.googleapis.com/$bucketName/$file";
} catch(Exception $e) {
    echo $e->getMessage();
}