<?php

// load GCS library
require_once 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

// Please use your own private key (JSON file content) and copy it here
// your private key JSON structure should be similar like dummy value below.
// WARNING: this is only for QUICK TESTING to verify whether private key is valid (working) or not.  
// NOTE: to create private key JSON file: https://console.cloud.google.com/apis/credentials  
$privateKeyFileContent = '{
    "type": "service_account",
  "project_id": "lure-prod",
  "private_key_id": "ee15fe45b34b9bc75fe3ee1be156dbf25f667720",
  "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQDVSxvdwqR0dgRo\nSLw6pHNljcwx+adxgCk70+gZDqGV760iUld5iVUhK9fYuki2wofsQPurLtMBbhbD\nT2mn6B6KPa+Z9QjOkGoUNg1Ygg3ff1vsBBcLwwVN38efe5HlmTC7+BtMGDQldgMA\n8p5u7/VJCXSLMfxKVUjKtqazkx3cyC3NNBzmmXIrKHMOxPcj6aemh9cvmXPXu6pT\nNQaJz2pCAeEtBzAGmB/E+UAiOg4P6NMbze8R8T0ImU7q1zHi5cmag/7n9uAnQB9J\nXDkD5+KaXxOhHp4+NFQ2kvT6tBT27yFiizsId/AArHOeRPZKT07FN91c1GoAsv0E\n+hK+3Rh1AgMBAAECggEAMsgTXiC3nVe01GxOzkp1g/322gYlsM7x4kHhPkf+vi8m\nYifHFlNVXpSs6vdtFQArMttE3/yBtdMzXbRURCruTH0DyCyv+FgnPWEiG8q5CVdt\n9/sATqdTpbcL9MNLmOW4VeRsAVm43ptiezEIegKs/ELhSbuwpLT54/OJLHNwFm5u\nJkFn9hvPOMRSZtLuba5QFy4BLalDE/4HrHjMxZF6snmvP1rRxyLB4ne2cMEmbYBH\nRJPFZF6qnMByCOZYKMXyqChh+OP+SkezPqUh+2VML+eoOMoMbIEdb3dZMR3nlSLw\nlFYfIovytBWwsyd++807XQnDdM/3O4KwhKBQ7IPeGQKBgQDze51He0AhVuCTlfXL\nMF/5CNKhK+5JAKb6w5r4/IFF0+PKmrE7YWyk/5BybnSUNoab4xJHe8cJRxh8xT1s\nzd9EPXqJqZthjP511nKKI5CbMRXTGgAOHv2nJOqiCgyZuph8dOn7yspPiqBnJNfS\nptjZsMoYla9j5ijbKRjTXWYgLQKBgQDgQi6os8bLC+6ZvptQULM5TqmJJzxLUULA\n4vP6mq9cW5JQjYC67kcz49BS8EhNFbANtNu7Ao0zijHe3mrfwO0mH8ThHj/xyl2Y\nGedUq8sfRt39gseJoMgnAeLJg0nsFubbWF6VGWjYYRKaShTIMsXeKk8vuHUqmd/U\nLPDJw0s+aQKBgQCpL7UrLW5zfC3S/7nqtbOKlWHe0mriWUyuJOtzpemh/sljSDhs\n/ZaD1H2nti7VqknA2nkiKNU2EivmzxuOlkNU5K9YJv2sPE+4zAmNCYd6/xGePYva\nRBiXYySS8g6tZ6Z7nLXV26TWvooVAdniK0O1iI31pVVZQl4TY6w3esfzBQKBgQCD\nIC+IFRY3w1JQM1M9MvKYn5Yhy/9FSs5tWkauUaQXrLNwxkxvAMRBYwN8e2LLL9Mx\nMH8KagOGD1f5qLN1AamokQrdVoKtLlZriTnqGEk8kINcqAtkPc7KgB/LFCk1Em8J\n8jHbnG/hlWD7NjXQmV949+Q1UvWvYymtNlnUn4xvgQKBgQDkDmHy9o8Z/6BDWHkL\nG3x+oUgHxBrQoAT2Soro31G7ztgi9eEJkXLYt5XawQCcN8ANmpTkKjKjukvVuTXn\nzXsHymnWqthCLCHMJtHUB3/Tn80LsvCWMr/m8KCnVZfA1rH0RtWkMp4vwym+/Yac\nYZQKGLaCUChM6A1iF8eQimSbug==\n-----END PRIVATE KEY-----\n",
  "client_email": "lure-production@lure-prod.iam.gserviceaccount.com",
  "client_id": "102610446273213051205",
  "auth_uri": "https://accounts.google.com/o/oauth2/auth",
  "token_uri": "https://oauth2.googleapis.com/token",
  "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
  "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/lure-production%40lure-prod.iam.gserviceaccount.com"
}';

/*
 * NOTE: if the server is a shared hosting by third party company then private key should not be stored as a file,
 * may be better to encrypt the private key value then store the 'encrypted private key' value as string in database,
 * so every time before use the private key we can get a user-input (from UI) to get password to decrypt it.
 */

function uploadFile($bucketName, $fileContent, $cloudPath) {
    $privateKeyFileContent = $GLOBALS['privateKeyFileContent'];
    // connect to Google Cloud Storage using private key as authentication
    try {
        $storage = new StorageClient([
            'keyFile' => json_decode($privateKeyFileContent, true)
        ]);
    } catch (Exception $e) {
        // maybe invalid private key ?
        print $e;
        return false;
    }

    // set which bucket to work in
    $bucket = $storage->bucket($bucketName);

    // upload/replace file 
    $storageObject = $bucket->upload(
            $fileContent,
            ['name' => $cloudPath]
            // if $cloudPath is existed then will be overwrite without confirmation
            // NOTE: 
            // a. do not put prefix '/', '/' is a separate folder name  !!
            // b. private key MUST have 'storage.objects.delete' permission if want to replace file !
    );

    // is it succeed ?
    return $storageObject != null;
}

/* function getFileInfo($bucketName, $cloudPath) {
    $privateKeyFileContent = $GLOBALS['privateKeyFileContent'];
    // connect to Google Cloud Storage using private key as authentication
    try {
        $storage = new StorageClient([
            'keyFile' => json_decode($privateKeyFileContent, true)
        ]);
    } catch (Exception $e) {
        // maybe invalid private key ?
        print $e;
        return false;
    }

    // set which bucket to work in
    $bucket = $storage->bucket($bucketName);
    $object = $bucket->object($cloudPath);
    return $object->info();
}
//this (listFiles) method not used in this example but you may use according to your need 
function listFiles($bucket, $directory = null) {

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
        // NOTE: if $object->name() ends with '/' then it is a 'folder'
    }
}
 */
?>