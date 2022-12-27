<?php
require_once "vendor/autoload.php";
 
use Google\Cloud\Storage\StorageClient;
 
try {
    $storage = new StorageClient([
        'keyFilePath' => 'lure-prod-ee15fe45b34b.json',
    ]);
} catch(Exception $e) {
    echo $e->getMessage();
}