<?php
if (isset($_POST['add_comm']))
{
    $cerere="INSERT INTO comments (id_comment,id_postare,user_name,data_comentariu,comentariu,reply) values('".uniqid()."','".$_POST['post_id']."'";
    echo $cerere;
}

?>