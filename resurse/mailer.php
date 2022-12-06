<?php


require_once('phpmailer/class.phpmailer.php');


$mail = new PHPMailer(true); 

$mail->IsSMTP();

    $name=$_POST['nume'];
    $email=$_POST['email'];
    $telephone=$_POST['telefon'];
    $message=$_POST['mesaj'];

    if(isset($_POST['submit'])){
try {
 
        $mail->SMTPAuth   = true; 
        $mail->SMTPSecure = "ssl";                 
        $mail->Host       = "smtp.gmail.com";    
        $mail->Port       = 465;                  
        $mail->Username   = 'lure.production@gmail.com'; 			// GMAIL username
        $mail->Password   = 'lvupjjdmckeunbal';           // GMAIL password
        $mail->AddReplyTo('lure.production@gmail.com', 'Lure Prod');
        $mail->AddAddress('lure.production@gmail.com', 'Lure Prod');

        $mail->isHTML(true);
        $mail->Subject = 'Contact:' .$name;
        $mail->Body = "Nume: $name <br> Email: $email <br> Telefon: $telephone <br> Mesaj: $message";

        $mail->send();
        $alert="<div class='alert-success'><span>Mesaj Trimis</span></div>"; //folosit pentru a afisa mesaj de confirmare, se poate folosi bootstrap
  echo "Message Sent OK</p>\n";

}


  catch(Exception $e){
    $alert="<div class='alert-error'><span>Eroare Trimitere!'.$e->getMessage().'</span></div>"; 
}
}

?>
