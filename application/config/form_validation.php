<?php
//vega: this is my validation array

$config = array
(
//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*//

'sms' => array
(
		array(	'field' => 'message', 'label' => 'الرسالة',
				'rules' => 'trim|required|min_length['.SMS_MIN_LENGTH.']|max_length['.SMS_MAX_LENGTH.']'	),

),

/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/

'users' => array
(
		array(	'field' => 'username', 'label' => 'إسم المستخدم',
				'rules' => 'trim|required|min_length[5]|max_length[50]|alpha_numeric'	),

		array(	'field' => 'password', 'label' => 'كلمة المرور',
				'rules' => 'trim|required|min_length[5]|max_length[50]' ),

		array(	'field' => 'email',	'label' => 'البريد الإلكتروني',
				'rules' => 'trim|valid_email|max_length[200]' ),

		array(	'field' => 'phone', 'label' => 'الهاتف',
				'rules' => 'trim|max_length[100]' )
)

);