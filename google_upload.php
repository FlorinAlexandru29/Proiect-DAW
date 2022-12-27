<?php
require_once "vendor/autoload.php";
 
use Google\Cloud\Storage\StorageClient;
 
try {
    $storage = new StorageClient([
        'keyFilePath' => 'lure-prod-ee15fe45b34b.json',
    ]);
    $bucketName = 'lure-prod-bucket';
    $bucket = $storage->bucket($bucketName);
    if (!$bucket->exists()) {
        $response = $storage->createBucket($bucketName);
        echo "Your Bucket $bucketName is created successfully.";
    }
} catch(Exception $e) {
    echo $e->getMessage();
}