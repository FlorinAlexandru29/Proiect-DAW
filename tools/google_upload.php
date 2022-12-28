<?php
require_once "vendor/autoload.php";
 
use Google\Cloud\Storage\StorageClient;

try {
    $storage = new StorageClient([
        'keyFilePath' => 'lure-prod-ee15fe45b34b.json',
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
        // NOTE: if $object->name() ends with '/' then it is a 'folder'
    }
}
catch(Exception $e) {
    echo $e->getMessage();
}

?>