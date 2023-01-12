<?php
if (isset($_POST['add_comm']))
{   $conexiune=mysqli_connect('eu-cdbr-west-03.cleardb.net','bbd126d58cad2b','90feddf5','heroku_45e2f697954b823');
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    date_default_timezone_set('Europe/Bucharest');
    $data_comentariu = date('Y-m-d H:i');
    //problema -> daca userul se deconecteaza (i.e ii expira cookie-ul, o sa dea fail insertul)
    $cerere="INSERT INTO comments (id_comment,id_postare,user_name,data_comentariu,comentariu,reply) values('".uniqid()."','".$_POST['post_id']."','".openssl_decrypt ($_COOKIE["user_name"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121')."','".$data_comentariu."','".$_POST['comm']."','".$_POST['reply']."')";
     mysqli_query($conexiune, $cerere);
    mysqli_close($conexiune);  
    $header="Location:postare.php?id=".$_POST['post_id'];
    header($header);
    exit();
}

?>