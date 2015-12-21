<?php

class emailer
{
	protected $sender;
	private $recipients;
	private $subject;
	private $body;
	function __construct($sender)
	{
		$this->sender = $sender;
		$this->recipients = array();
	}
	public function addRecipients($recipient)
	{
		array_push($this->recipients, $recipient);
	}
	public function setSubject($subject)
	{
		$this->subject = $subject;
	}
	public function setBody($body)
	{
		$this->body = $body;
	}
	public function sendEmail()
	{
		foreach ($this->recipients as $recipient)
		{
			$result = mail($recipient, $this->subject, $this->body,"From: {$this->sender}\r\n");
			if ($result) 
				echo "Mail successfully sent to{$recipient}<br/>";
		}
	}
}
class ExtendedEmailer extends emailer
{
	function __construct(){}
	public function setSender($sender)
	{
		$this->sender = $sender;
	}
}
<?
class HtmlEmailer extends emailer
{
	public function sendHTMLEmail()
	{
		foreach ($this->recipients as $recipient)
		{
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: {$this->sender}' . "\r\n";
			$result = mail($recipient, $this->subject, $this->body,$headers);
			if ($result) 
				echo "HTML Mail successfully sent to{$recipient}<br/>";
		}
	}
}
?>
$emailer = new emailer("dhruvesh_tripathi@yahoo.com"); //construcion
$emailer->addRecipients("dhruveshgr8@gmail.com"); //accessing methods
$emailer->setSubject("Just a Test");
$emailer->setBody("Hi Dhruvesh, How are you?");
$emailer->sendEmail();
$hm = new HtmlEmailer();
$hm->sendEmail();
$hm->sendHTMLEmail();
?>