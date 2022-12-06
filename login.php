<?php
     setcookie("user_name", "guest", time()+ 360,'/'); // expires after 60 seconds
?>


<?php
     print_r($_COOKIE);    //output the contents of the cookie array variable 
?>