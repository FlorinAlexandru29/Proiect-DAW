<?php
require_once "vendor/autoload.php";
include 'google_drive_key.php';

use Google\Cloud\Storage\StorageClient;
$type=openssl_decrypt ($type, "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
$project_id=openssl_decrypt ($project_id, "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
$private_key_id=openssl_decrypt ($private_key_id, "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
$private_key=openssl_decrypt ($private_key, "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
$client_email=openssl_decrypt ($client_email, "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
$client_id=openssl_decrypt ($client_id, "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
$auth_uri=openssl_decrypt ($auth_uri, "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
$token_uri=openssl_decrypt ($token_uri, "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
$auth_provider_x509_cert_url=openssl_decrypt ($auth_provider_x509_cert_url, "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');
$client_x509_cert_url=openssl_decrypt ($client_x509_cert_url, "AES-128-CTR", "kalpsdnj", 0, '1234567891011121');

try {
    $storage = new StorageClient([
    $type,
    $project_id,
    $private_key_id,
    $private_key,
    $client_email,
    $client_id,
    $auth_uri,
    $token_uri,
    $auth_provider_x509_cert_url,
    $client_x509_cert_url
        
    ]);

    


     $fileContent = file_get_contents($_FILES["FileUpload1"]["tmp_name"]);
    $cloudPath = 'uploads/' . $row['user_name'].".jpg";


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
    $directory = 'uploads/';
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
        echo "<BR>";
        // NOTE: if $object->name() ends with '/' then it is a 'folder'
    }
} 
catch(Exception $e) {
    echo $e->getMessage();
}

?>