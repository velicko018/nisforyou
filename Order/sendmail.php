<?php
include_once 'mail/classes/class.phpmailer.php';
include_once 'mail/classes/class.smtp.php';
if(isset($_POST['mailuser']) && isset($_POST['nameuser']) && isset($_POST['commentuser']))
    {
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
	$mail->Subject=$_POST['nameuser'];
	$mail->Body=$_POST['commentuser'];
	$mail->addAddress($_POST['mailuser']);
	echo "<div style='display:none'>";	
	if(!$mail->send())
	{
		?> <script> alert('<?php
	    echo 'Mailer Error'.$mail->ErrorInfo;
	    ?> ')</script> <?php
	     header('Location: OrderTable.php');
	}
	
	else
	{	
		?> <script> alert('<?php
	    echo 'Mail sent!'.$mail->ErrorInfo;
	    ?> ')</script> <?php
	}
	echo "</div>";
    header('Location: OrderTable.php');
    }
    header('Location: OrderTable.php');
?>
