<?php

return array(

	/**
	 * Default settings
	 */
	'defaults' => array(

		/**
		 * Mail useragent string
		 */
		'useragent'	=> 'FuelPHP, PHP 5.3 Framework',
		/**
		 * Mail driver (mail, smtp, sendmail)
		 */
		'driver'		=> 'mail',

		/**
		 * Whether to send as html, set to null for autodetection.
		 */
		'is_html'		=> null,

		/**
		 * Email charset
		 */
		'charset'		=> 'utf-8',

		/**
		 * Ecoding (8bit, base64 or quoted-printable)
		 */
		'encoding'		=> '8bit',

		/**
		 * Email priority
		 */
		'priority'		=> \Email::P_NORMAL,

		/**
		 * Default sender details
		 */
		'from'		=> array(
			'email'		=> false,
			'name'		=> false,
		),

		/**
		 * Whether to validate email addresses
		 */
		'validate'	=> true,

		/**
		 * Auto attach inline files
		 */
		'auto_attach' => true,

		/**
		 * Auto generate alt body from html body
		 */
		'generate_alt' => true,

		/**
		 * Wordwrap size, set to null, 0 or false to disable wordwrapping
		 */
		'wordwrap'	=> 76,

		/**
		 * Path to sendmail
		 */
		'sendmail_path' => 'C:\xampp\sendmail',

		/**
		 * SMTP settings
		 */
		'smtp'	=> array(
			'host'		=> 'localhost',
			'port'		=> 25,
			'username'	=> 'newuser',
			'password'	=> 'wampp',
			'timeout'	=> 5,
		),

		/**
		 * Newline
		 */
		'newline'	=> "\n",

		/**
		 * Attachment paths
		 */
		'attach_paths' => array(
			// absolute path
			'',
			// relative to docroot.
			DOCROOT,
		),
	),

	/**
	 * Default setup group
	 */
	'default_setup' => 'default',

	/**
	 * Setup groups
	 */
	'setups' => array(
		'default' => array(),
	),

);
