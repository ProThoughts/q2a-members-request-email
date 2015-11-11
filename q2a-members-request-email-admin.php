<?php
class q2a_members_request_email_admin {
	function init_queries($tableslc) {
		return null;
	}
	function option_default($option) {
		switch($option) {
			case 'q2a-members-request-email-body':
				return ''; 
			default:
				return null;
		}
	}
		
	function allow_template($template) {
		return ($template!='admin');
	}       
		
	function admin_form(&$qa_content){                       
		// process the admin form if admin hit Save-Changes-button
		$ok = null;
		if (qa_clicked('q2a-members-request-email-save')) {
			qa_opt('q2a-members-request-email-title', qa_post_text('q2a-members-request-email-title'));
			qa_opt('q2a-members-request-email-body', qa_post_text('q2a-members-request-email-body'));

			$ok = qa_lang('admin/options_saved');
		}
		
		// form fields to display frontend for admin
		$fields = array();
		
		$fields[] = array(
			'type' => 'text',
			'label' => 'mail title',
			'tags' => 'name="q2a-members-request-email-title"',
			'value' => qa_opt('q2a-members-request-email-title'),
		);


		$fields[] = array(
			'type' => 'textarea',
			'label' => 'mail body',
			'tags' => 'name="q2a-members-request-email-body"',
			'value' => qa_opt('q2a-members-request-email-body'),
		);
		
		return array(     
			'ok' => ($ok && !isset($error)) ? $ok : null,
			'fields' => $fields,
			'buttons' => array(
				array(
					'label' => qa_lang_html('main/save_button'),
					'tags' => 'name="q2a-members-request-email-save"',
				),
			),
		);
	}
}

