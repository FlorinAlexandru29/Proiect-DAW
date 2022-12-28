<?php
require_once "vendor/autoload.php";
 
use Google\Cloud\Storage\StorageClient;

try {
    $storage = new StorageClient([
        'keyFilePath' => 'lure-prod-ee15fe45b34b.json',
    ]);

    $fileContent = file_get_contents($_FILES["file"]["tmp_name"]);
    $cloudPath = 'uploads/' . $_FILES["file"]["name"];


    $bucketName = 'lure-prod-bucket';
    
    $bucket = $storage->bucket($bucketName);
    $storageObject = $bucket->upload(
        $fileContent,
        ['name' => $cloudPath]
        // if $cloudPath is existed then will be overwrite without confirmation
        // NOTE: 
        // a. do not put prefix '/', '/' is a separate folder name  !!
        // b. private key MUST have 'storage.objects.delete' permission if want to replace file !
);

    echo "File uploaded successfully. File path is: https://storage.googleapis.com/$bucketName/$cloudPath";
} catch(Exception $e) {
    echo $e->getMessage();
}