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
    $storage = [
        
        "type"=> "service_account",
        "project_id"=>"lure-prod",
        "private_key_id"=>"da79b1b59e799a70e1d2cf4875ae42ceb681f229",
        "private_key"=>"-----BEGIN PRIVATE KEY-----\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCuhLVKB5du7/Jl\nsezWGtYSjKWzdfqG6Q4mCKdBVLzosgmJfCTfaZO7seDzqKIGhJ6yFLhi+KEARFld\njkQ33K+8KYWZ1/inbaDhhEtWmWVgdJPT8V+uQ8tCMGsgFkpMs/os5LiVhX9Wx3RA\nTR7Eoa7eHBd1pES018Psx/uyQkpbFaNdbUi6FL4X2YdZZVqGaIYmStqjPzoQS3Cp\ncRBnFLVUiTypFkk0ock5V4E6uePQwqvB9AdvNBIBAitop754azs9o2Zceftj3TNj\n+p7Kex9FTLZRj2IpibHGCvM6bsb1F+UbnnR6scw/ZazGNEjscWVwrrWJWhN7+NhH\nzke4qcHLAgMBAAECggEATyAYWjJK9J+SFY2wRfrw6IQgdNee+SAdrBzsSHC1HgPq\n0w0YYrspokYqKg9hNvdWRIOkfisgRFC4+/QO9gz3GKbyziffs3m/IcCrr93o2uzA\nQa4EpaxTMfVl/Kxej5xiZ4xkLFbUv3G7QZQ1yQ1NjaLK+Cm8hQn26RpbAh2QPO84\n8VIrY7mGiKcFtLUzjNUWvoa33PJf1wVFb0LQ0L/P8VOlLiqvc0b26MLhmhZd658o\nEO9W6bCSuWziO+2wWV7HUXU9FVzBgd6JDkD1+EyGB3ZySiatSX838J/teJjsIv2Z\nkmkYjyujMoWbFuTaf+OjnVtMe1jjY23ahWnqfqzf4QKBgQDTlb3skshduFCXMqkf\nhvChLwKQjTQPvr52h0Vs0KrpmrcBgOsdHSfxJ0PDQdolYYC63w13XCHIIH75OStT\n8vcHVtTEQzNF50jAm3jViDDZIRtWjz6/YOfMu4tFMKTcdzh2Uw18bHqGh154wrS0\nfDHIJcoZahz3k3LEvJFLHw8YowKBgQDTJxDdHFlMJH0C3c5fVnHQxkypptmwQoQH\nwjEm+ihhlzmcwSnMC/q2a8QUkQX/GjaxHSV0/u7S4VNiFJs9Zs6+0LrC4k+XtMls\n72WlaGIro+vz580Zia716VSRNNQGMyT9O0RRQf5Ag4TASVGPrSQ0S78mtHJhd4M3\naGS9QQZ8uQKBgCDyV0GoVZTqZ3ozxEwJehzPMioKIso03HmedLwN/h8kHU0ZowLE\nkHynrZCRB4P8m8v9gZ5NdWExVjQ+p7WJxteYuMba4/gFnLmJPBab/2dAFX60DYRF\ndbLWnUgn2/QMiHk8U4RFbArYt2g8gWD9Wc8du0ubz2jpx9xEtKcq7fHbAoGAe/i9\nz/QrAaeStjIgTp1kaZ1juV+7A9+pwRxk22uYdePh8YT/00tdQel30FNtX9+2KLri\nGRTsh2fAGx/aHWzVCfdnD7Dr5jhA4vKTjVACA3lUuXlpVAsgbEU4X6DSs2kn2H4J\nmGPUsXAGaxchCegwD3xBmKntVghjRA7Ixsz80BECgYBKBsF3uDyGgKwv/54XWJ9X\nO+QNpw1+r9YauoyDQ08XcBagIv02R2iQGzM9kFfNGDShQokfvDty4R0sKwZiIRWH\nQBNSWFXE9wQYy9i7vmw65Yd0qlwYy0pZuzqZoRMVcL2WJNVzFwdUDcHB7J89GmFp\nuZfvIWUqD/ljmiKWhPjGgQ==\n-----END PRIVATE KEY-----\n",
        "client_email"=>"lure-production@lure-prod.iam.gserviceaccount.com",
        "client_id"=>"102610446273213051205",
        "auth_uri"=>"https://accounts.google.com/o/oauth2/auth",
        "token_uri"=>"https://oauth2.googleapis.com/token",
        "auth_provider_x509_cert_url"=> "https://www.googleapis.com/oauth2/v1/certs",
        "client_x509_cert_url"=> "https://www.googleapis.com/robot/v1/metadata/x509/lure-production%40lure-prod.iam.gserviceaccount.com"];
    /* $type,
    $project_id,
    $private_key_id,
    $private_key,
    $client_email,
    $client_id,
    $auth_uri,
    $token_uri,
    $auth_provider_x509_cert_url,
    $client_x509_cert_url */
        

    


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