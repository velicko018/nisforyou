
<?php
include "php/mail.php";
	if(isset($_POST['dugme']))
	{
		$brojosoba = htmlentities($_POST['brojosoba']);
		$result_div = htmlentities($_POST['result_div']);
		$lokal = htmlentities($_POST['lokal']);
		$datum = htmlentities($_POST['datum']);
		$tiplokala = htmlentities($_POST['tiplokala']);
		$ime = htmlentities($_POST['ime']);
		$telefon = htmlentities($_POST['telefon']);
		$body="Tip lokala: ".$tiplokala.
		"\nLokal:".$lokal.
		"\nDatum:".$datum.
		"\nIme:".$ime.
		"\nBroj osoba:".$brojosoba.
		"\nTelefon:".$telefon;
		sendMail('Rezervacija', $body, "velicko018@live.com");
		echo "Uspesno ste rezervisal!";

	}
?>