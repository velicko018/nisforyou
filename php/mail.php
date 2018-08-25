<?php


function sendMail($subject,$body,$to)
{
	include_once 'classes/class.phpmailer.php';
	include_once 'classes/class.smtp.php';
	$mail=new PHPMailer();
	$mail->Mailer="SMTP";
	$mail->isSMTP();
	$mail->SMTPDebug=1;
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='TLS';
	$mail->Host="smtp.gmail.com";
	$mail->Port=587 ;
	$mail->isHTML(true);
	$mail->Username="nisforyou12345@gmail.com";
	$mail->Password="medijana018";
	$mail->SetFrom("nisforyou12345@gmial.com");
	$mail->Subject=$subject;
	$mail->Body=$body;
	$mail->addAddress($to);
	echo "<div style='display:none'>";	
	if(!$mail->send())
	{
		?> <script> alert('<?php
	    echo 'Mailer Error'.$mail->ErrorInfo;
	    ?> ')</script> <?php
	    return true;
	}
	
	else
	{	
		if($_SESSION['lng']=='srb')
	    echo 'Potvrdite registraciju na vasoj mail adresi.';
		if($_SESSION['lng']=='eng')
	    echo 'Confirm registration on your mail address.';
	}
	echo "</div>";
	return false;	
}