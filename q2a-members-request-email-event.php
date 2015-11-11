<?php
if (!defined('QA_VERSION')) { 
	require_once dirname(empty($_SERVER['SCRIPT_FILENAME']) ? __FILE__ : $_SERVER['SCRIPT_FILENAME']).'/../../qa-include/qa-base.php';
   require_once QA_INCLUDE_DIR.'app/emails.php';
}

class q2a_members_request_email_event
{
	function process_event ($event, $userid, $handle, $cookieid, $params)
	{
		if (!($event == 'q_post' || $event == 'c_post'))
			return;

		if ($params['email'] != "") {
			if ($params['name'] != "") {
				$handle = $params['name'];
			} else {
				$handle = '匿名ユーザー';
			}
			$title = qa_opt('q2a-members-request-email-title');
			$bodyTemplate = qa_opt('q2a-members-request-email-body');
			$body = strtr($bodyTemplate, 
				array(
					'^username' => $handle,
					'^sitename' => qa_opt('site_title')
				)
			);
			$this->sendEmail($title, $body, $handle, $email);
		}
		return;
	}

	function sendEmail($title, $body, $toname, $toemail)
	{

		$mail_params['fromemail'] = qa_opt('from_email');
		$mail_params['fromname'] = qa_opt('site_title');
		$mail_params['subject'] = '【' . qa_opt('site_title') . '】' . $title;
		$mail_params['body'] = $body;
		$mail_params['toname'] = $toname;
		$mail_params['toemail'] = $toemail;
		$mail_params['html'] = false;

		qa_send_email($mail_params);

		//$mail_params['toemail'] = 'yuichi.shiga@gmail.com';
		$mail_params['toemail'] = 'ryuta_takeyama@nexyzbb.ne.jp';
		qa_send_email($mail_params);
	}
}

/*
    Omit PHP closing tag to help avoid accidental output
*/
