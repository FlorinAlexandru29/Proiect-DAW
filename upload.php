<?php
	// This file demonstrates file upload to an S3 bucket. This is for using file upload via a
	// file compared to just having the link. If you are doing it via link, refer to this:
	// https://gist.github.com/keithweaver/08c1ab13b0cc47d0b8528f4bc318b49a
	//
	// You must setup your bucket to have the proper permissions. To learn how to do this
	// refer to:
	// https://github.com/keithweaver/python-aws-s3
	// https://www.youtube.com/watch?v=v33Kl-Kx30o
	
	// I will be using composer to install the needed AWS packages.
	// The PHP SDK:
	// https://github.com/aws/aws-sdk-php
	// https://packagist.org/packages/aws/aws-sdk-php 
	//
	// Run:$ composer require aws/aws-sdk-php
	require 'vendor/autoload.php';
	
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;

		//AWS CREDENTIALS
	$BUCKET_NAME = 'lureprod';
	$IAM_KEY = 'AKIAXXYWM3KJBSRAFP4B';
	$IAM_SECRET = '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';	

	// Connect to AWS
	try {
		// You may need to change the region. It will say in the URL when the bucket is open
		// and on creation.
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'eu-west-2'
			)
		);
	} catch (Exception $e) {
		// We use a die, so if this fails. It stops here. Typically this is a REST call so this would
		// return a json object.
		die("Error: " . $e->getMessage());
	}

	
	// For this, I would generate a unqiue random string for the key name. But you can do whatever.
	$keyName = 'test_example/' . basename($_FILES["FileUpload1"]['name']);
	$pathInS3 = 'https://s3.eu-west-2.amazonaws.com/' . $BUCKET_NAME . '/' . $keyName;

	echo $row['user_name'];
	// Add it to S3
	try {
		// Uploaded:
		$file = $_FILES["FileUpload1"]['tmp_name'];

		$s3->putObject(
			array(
				'Bucket'=>$BUCKET_NAME,
				'Key' =>  $keyName,
				'SourceFile' => $file,
				'StorageClass' => 'REDUCED_REDUNDANCY'
			)
		);

	} catch (S3Exception $e) {
		die('Error:' . $e->getMessage());
	} catch (Exception $e) {
		die('Error:' . $e->getMessage());
	}


	echo 'Done';

	$conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
	$cerere_photo="select * from profile_pic where user_name='".$row['user_name']."'";
	echo $cerere_photo;
	$result_photo=mysqli_query($conexiune, $cerere_photo);
	if (mysqli_num_rows($result_photo) > 0){
		$change_photo = "update profile_pic set location='".$keyName."',user_name='".$row['user_name']."' WHERE user_name='".$row['user_name']."'";
		mysqli_query($conexiune, $change_photo);
		echo "update pe tabel";
	}

	else {
		
		$insert_photo = "insert into profile_pic (user_name,location) values('".$row['user_name']."','".$keyName."')";
		mysqli_query($conexiune, $insert_photo);
		echo "insert pe tabel";
	}

	mysqli_close($conexiune);


	// Now that you have it working, I recommend adding some checks on the files.
	// Example: Max size, allowed file types, etc.