<?php

class AliEmail
{
	static private $smtpserver = 'smtpdm.aliyun.com'; //阿里云SMTPServer
	static private $smtpuser = 'kf@service.adbangbang.com'; //发信地址
	static private $smtpsecret = '1yMS29VE2IPfmAz'; //阿里云SMTPSecret
	static private $smtpserverport  = 25;

	static public function sendEmailBySMTP($toemail, $subjecttxt, $emailtxt)
	{
		$smtp = new smtp(self::$smtpserver, self::$smtpserverport, true, self::$smtpuser, self::$smtpsecret);
		return $smtp->sendmail($toemail, self::$smtpuser, $subjecttxt, $emailtxt, 'HTML');
	}

}
