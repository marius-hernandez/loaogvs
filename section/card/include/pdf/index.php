<?php
include_once '../../include/dbh.inc.php';
session_start();
//index.php

$message = '';
$email= $_SESSION['email'];
$emailp= mysqli_real_escape_string($conn, $_GET['emailp']);


include_once 'abm.php';
$file= $pdf->Output('attachment.pdf', 'S');
	include('pdf.php');
    $file_name = 'attachment.pdf';
	file_put_contents($file);
	require 'class/class.phpmailer.php';
	$mail = new PHPMailer;
	$mail->IsSMTP();								//Sets Mailer to send message using SMTP
	$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = '465';								//Sets the default SMTP server port
	$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->Username = 'loaogv@gmail.com';					//Sets SMTP username
	$mail->Password = 'loaogv123';					//Sets SMTP password
	$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = 'loaogv@gmail.com';			//Sets the From email address for the message
	$mail->FromName = $email;			//Sets the From name of the message
	$mail->AddAddress($emailp, 'Parent');		//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML				
	$mail->AddStringAttachment($file, 'attachment.pdf');    				//Adds an attachment from a path on the filesystem
	$mail->Subject = 'Grade Sheet of Student';			//Sets the Subject of the message
	$mail->Body = 'This is the performance of your student';				//An HTML or plain text message body
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		echo 'success';
		header("location: url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");

	}

	else							//Send an Email. Return true on success or false on error
	{
		echo 'fail';
		header("location: url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");

	}
	unlink($file_name);
