<?php

require_once('swift/Swift.php');
require_once("swift/Swift/Connection/NativeMail.php");
require_once("swift/Swift/Connection/SMTP.php");

/**
* Wrapper de la funcionalidades basicas de Swift.
*
* Encapsulamiento de los aspectos basicos de envio de email de Swift para
* liberar al usuario de sus opciones de configuracion.
*/
class EmailManagement
{
	public function __construct() {
		
	}
	
	/**
	 * Crea una conexion a traves de la cual se podran enviar emails
	 * con la configuracion del sistema.
	 * @return Swift instance
	 * @throws Exception
	 */
	private function createMailer() {
		
		global $system;

		$mailMode = $system["config"]["email"]["mode"]["value"];

		
		// Opcion 1: usando la funcion mail() de PHP (opcion por default)
		if ( ($mailMode != 'SMTP') || ($mailMode == 'PHP')) {
			//cosntruimos el mailer
			$mailer = new Swift(new Swift_Connection_NativeMail());
		}
	
		// Opcion 2: usando SMTP
		if ($mailMode == 'SMTP') {
		
			$smtpHost = $system["config"]["email"]["smtpOptions"]["smtpHost"];
			$smtpPort = $system["config"]["email"]["smtpOptions"]["smtpPort"];				
			$smtpSsl = $system["config"]["email"]["smtpOptions"]["smtpSsl"]["value"];				
			$smtpUser = $system["config"]["email"]["smtpOptions"]["smtpUsername"];				
			$smtpPassword = $system["config"]["email"]["smtpOptions"]["smtpPassword"];
		
			//construimos la conexion
			if ($smtpSsl == YES)
				$connection = new Swift_Connection_SMTP($smtpHost, $smtpPort, Swift_Connection_SMTP::ENC_SSL);
			else
				$connection = new Swift_Connection_SMTP($smtpHost, $smtpPort);
			$connection->setUsername($smtpUser);
			$connection->setPassword($smtpPassword);
			//construimos el mailer
			$mailer = new Swift($connection);
		
		}
		
		return $mailer;
		
	}
	
	/**
	 * Crea un nuevo mensaje en HTML
	 * @param string subject of the email
	 * @param string HTML Content
	 */
	public function createHTMLMessage($subject,$mailBody) {
		
		$message = new Swift_Message($subject, $mailBody, 'text/html');
		
		return $message;
		
	}	
	
	/**
	 * Creates a Text only version of an HTML content
	 * @param string HTML mail body
	 */
	private function createTextFromHTML($mailBody) {
		//nos quedamos solo con el body
		$mailBody = str_replace('<br />',"<br />\r\n",$mailBody);
		$mailBody = str_replace('</p>',"<p>\r\n",$mailBody);
		$mailBody = ereg_replace('(<h[1-9]/>)',"\\1\r\n",$mailBody);
		return strip_tags($mailBody);
	}
	
	/**
	 * Crea un nuevo mensaje Multipart
	 * @param string subject of the email
	 * @param string HTML Content
	 */
	public function createMultipartMessage($subject,$mailBody) {
		
		$message = new Swift_Message($subject);
		$textOnlyBody = $this->createTextFromHTML($mailBody);
		$message->attach(new Swift_Message_Part($textOnlyBody, 'text/plain'));
		$message->attach(new Swift_Message_Part($mailBody, "text/html"));
	
		return $message;
		
	}
	
	/**
	 * Envia un mensaje con las 
	 *
	 */
	public function sendMessage($mailTo,$mailFrom,$message,$mailReplyTo="") {
		
		$result = false;
		
		if (!empty($mailReplyTo))
			$message->setReplyTo($mailReplyTo);
		
		try {
			//obtenemos en elemento de envio
			$mailer = $this->createMailer();
			
			//enviamos el mensaje
			$result = $mailer->send($message, $mailTo, $mailFrom);
			$mailer->disconnect();
			
		} catch (Exception $e) {
			return false;
		}
		
		return $result;		
		
	}
	

}
