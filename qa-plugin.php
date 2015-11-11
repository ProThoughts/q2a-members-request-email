<?php
/*
	Plugin Name: Send mail to not member user
	Plugin URI: 
	Plugin Description: send the request mail to user who are a not member
	Plugin Version: 0.3
	Plugin Date: 2015-11-03
	Plugin Author:
	Plugin Author URI:
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.7
	Plugin Update Check URI: 
*/
if (!defined('QA_VERSION')) {
	header('Location: ../../');
	exit;
}

qa_register_plugin_module('module', 'q2a-members-request-email-admin.php', 'q2a_members_request_email_admin', 'members request');
qa_register_plugin_module('event', 'q2a-members-request-email-event.php', 'q2a_members_request_email_event', 'members request');

/*
	Omit PHP closing tag to help avoid accidental output
*/
