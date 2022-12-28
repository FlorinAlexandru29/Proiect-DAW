<?php
require_once "vendor/autoload.php";
 
use Google\Cloud\Storage\StorageClient;
 


try {
    $storage = new StorageClient([
        'keyFilePath' => 'JSON_KEY_FILE_PATH',
    ]);
 
    $bucketName = 'lure-prod-bucket';
    $fileName = '1.jpg';
    $bucket = $storage->bucket($bucketName);
    $object = $bucket->upload(
        fopen($fileName, 'r'),
        [
            'predefinedAcl' => 'publicRead'
        ]
    );
    echo "File uploaded successfully. File path is: https://storage.googleapis.com/$bucketName/$fileName";
} catch(Exception $e) {
    echo $e->getMessage();
}