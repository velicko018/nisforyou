<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Administratorska strana Nisforyou</title>
    <link rel="stylesheet" href="Css/Search.css">
    <link rel="stylesheet" href="Css/mailform.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    
        <link rel="stylesheet" href="Css/index.css">
        <link rel="stylesheet" href="Css/footer-distributed-with-address-and-phones.css">     
  </head>
  <body>
      

    <div id="clouds">
	<div class="cloud x1"></div>
	<!-- Time for multiple clouds to dance around -->
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
</div>

 <div class="container">


      <div id="login" >

          <form  action="Login.php" method="POST">

          <fieldset class="clearfix">

            <p><span class="fontawesome-user"></span><input name="username" type="text" ></p> 
            <p><span class="fontawesome-lock"></span><input name="password" type="password" ></p> 
            <p><input type="submit" value="Sign In"></p>

          </fieldset>

        </form>
          

          <p>Niste član? <a  class="blue" id="contactus" style="cursor:pointer">Kontaktirajte nas</a><span class="fontawesome-arrow-right"></span></p>

      </div> <!-- end login -->
     
    </div>
     
      <div class="bottom" data-role="main">
        
       <h3>=NisForYou=</h3>
       
       <div id="mailform">
            
            </div>
        <footer class="footer-distributed">
            

			<div class="footer-left">

				<h3>Nis4you</h3>

				<p class="footer-links">
					<a href="index.php">Početna</a>
          ·
          <a href="../index.php">Website</a>
          ·
          <a href="../food.php">Food</a>
          ·
          <a href="../nightlife.php">Nightlife</a>
          ·
          <a href="../events.php">Events</a>
          ·
				</p>

				<p class="footer-company-name">Nisforyou © 2016</p>
			</div>
            

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Niš</span> 18 000 , Serbia</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+1 555 123456</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">nis4zou.azurewebsites.net</a></p>
				</div>

			</div>
           

			<div class="footer-right">

				<p class="footer-company-about">
					<span>Nešto o Nis4you</span>
					Ovo je mesto na kome se možete informisati o raznim događajima u Nišu.
				</p>

				<div class="footer-icons">

                                   <a href="https://www.facebook.com/"><img src="Css/face.png" ></a>
                                    <a href="https://twitter.com/?lang=en"><img src="Css/twit.png" ></a>
                                    <a href="https://www.linkedin.com/uas/login
"><img src="Css/link.jpg" ></a>
                                    <a href="https://mail.google.com/"><img src="Css/email.png" ></a>

				</div>

			</div>

		</footer>
        
       <script src="mail.js"> </script> 
       
       <div id="mailmessage">
      <?php
include_once 'mail/classes/class.phpmailer.php';
include_once 'mail/classes/class.smtp.php';
if(isset($_POST['email']))
    {
 
     
 
 
 
    $email_to = "nisforyou12345@gmail.com";
    $password="medijana018";
 
    $email_subject = "Contact";
 
     
 
     
 
    function died($error) {
 
       
 
        echo "Došlo je do problema prilikom slanja poruke. ";
 
        echo "Greške su sledeće.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Molimo vas pokušajte ponovo.<br /><br />";
       
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||
 
        !isset($_POST['comments'])) {
 
        died('Došlo je do problema prilikom slanja poruke.');       
 
    }
 
     
 
    $first_name = $_POST['first_name']; // required
 
    $last_name = $_POST['last_name']; // required
 
    $email_from = $_POST['email']; // required
 
    $telephone = $_POST['telephone']; // not required
 
    $comments = $_POST['comments']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'Email adresa koju ste uneli nije validna.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'Ime koje ste uneli nije validno.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'Prezime koje ste uneli nije validno.<br />';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'Poruka koju ste hteli da pošaljete nije validna.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Detalji ispod.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
//  headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
  
$mail=new PHPMailer();
$mail->Mailer="SMTP";
$mail->isSMTP();
$mail->SMTPDebug=1;
$mail->SMTPAuth=true;
$mail->SMTPSecure='TLS';
$mail->Host="smtp.gmail.com";
$mail->Port=587 ;
$mail->isHTML(true);
$mail->Username=$email_to;
$mail->Password=$password;
$mail->SetFrom("nisforyou12345@gmial.com");
$mail->Subject=$email_subject;
$mail->Body=$email_message;
$mail->addAddress("$email_to"); //$email_to
echo ("Uspešno ste poslali email, potrudićemo se da odgovorimo u najkraćem roku!");
echo '<div style="display:none">';
if(!$mail->send())
{
    echo 'Mailer Error'.$mail->ErrorInfo;
}
else
{
    echo 'Message has been sent';
}
echo '</div>'
 
?>

 
<?php
 
}
 
?>

<?php
 
 
?>
       </div>
      </div>
     
  
  </body>
</html> 
