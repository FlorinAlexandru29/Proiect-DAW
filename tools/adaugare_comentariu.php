<?php
if (isset($_POST['add_comm']))
{   date_default_timezone_set('Europe/Bucharest');
    $data_comentariu = date('Y-m-d H:i');
    $cerere="INSERT INTO comments (id_comment,id_postare,user_name,data_comentariu,comentariu,reply) values('".uniqid()."','".$_POST['post_id']."','".openssl_decrypt ($_COOKIE["user_name"], "AES-128-CTR", "kalpsdnj", 0, '1234567891011121')."','".$data_comentariu."','".$_POST['comm']."','".$_POST['reply']."')";
    echo $cerere;
}

?>