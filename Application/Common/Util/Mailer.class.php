<?php

namespace Common\Util;

class Mailer {
	
	public function send() {

		my_vendor('PHPMailer.PHPMailerAutoload');
		
		$mail = new \PHPMailer();
		
		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.163.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = '18825162700@163.com';                 // SMTP username
		$mail->Password = 'xjm19921125';                           // SMTP password
		
		$mail->From = '18825162700@163.com';
		$mail->FromName = 'Mailer';
		$mail->addAddress('918734043@qq.com');               // Name is optional
		
		$mail->isHTML(true);                                  // Set email format to HTML
		
		$mail->Subject = 'Here is the subject';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Message has been sent';
		}
		
	}
	
}