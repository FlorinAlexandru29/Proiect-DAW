<?php


     setcookie("user_name", "guest", time()+ 60,'/'); // expires after 60 seconds

     setcookie("user_name2", "guest", time()+ 60,'/'); // expires after 60 seconds 

     print_r($_COOKIE);    //output the contents of the cookie array variable 
?>

