<?php
    require_once('resurse/phpmailer/class.phpmailer.php');
    $mail = new PHPMailer(true); 

    $mail->IsSMTP();
    $mail->SMTPDebug = 2;
    try {
 
        $mail->SMTPAuth   = true; 
        $mail->SMTPSecure = "ssl";                 
        $mail->Host       = "smtp.gmail.com";    
        $mail->Port       = 465;                  
        $mail->Username   = 'lure.production@gmail.com'; 			// GMAIL username
        $mail->Password   = 'lvupjjdmckeunbal';           // GMAIL password
        $mail->SetFrom('lure.production@gmail.com', 'Lure Prod');
        $mail->AddReplyTo($r_email, $r_user_name);
        $mail->AddAddress($r_email, $r_user_name);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->send();

        $_SESSION[$pagina_request] = 0;
        $header="Location:".$pagina_request;
        header("$header");
        exit(); 
}


  catch(Exception $e){
        $_SESSION['eroare_trimitere']="Eroare trimitere: ".$e->getMessage();
        $header="Location:".$pagina_request;
        header("$header");
        exit(); 
}

    ?>