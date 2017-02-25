<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->curpage = "Signup";
        $this->load->model('About_my_site_model');
        $this->load->model('Users_model'); 

    	date_default_timezone_set("Asia/Manila");
    	$this->date = date("F d, Y");
    	$this->time = date("g:i A");
    }

	public function index()
	{
		if ( empty($this->session->userdata('user_session')) ) {

			$arrayEmail = array();
			foreach ( $this->Users_model->get_all() as $ga ) :
				array_push($arrayEmail, $ga->EMAIL);
			endforeach;

			$details = array (
				'curpage'			=>	$this->curpage,
				'get_active'		=>	$this->About_my_site_model->get_active(),
				'all_email'			=>	json_encode($arrayEmail)
			);

			$data['content'] = $this->load->view('signup.php',$details,TRUE);
			$this->load->view('template.php', $data);
		} else if ( $this->session->userdata('account_type') == "Administrator" ) {
			redirect('/admin');
		} else if ( $this->session->userdata('account_type') == "Agent" ) {
			redirect('/agent');
		}
	}

	public function create()
	{
		$txt_firstname_signup	= $this->input->post('txt_firstname_signup');
		$txt_lastname_signup	= $this->input->post('txt_lastname_signup');
		$txt_username_signup	= $this->input->post('txt_username_signup');
		$txt_contact_signup		= $this->input->post('txt_contact_signup');
		$txt_email_signup		= $this->input->post('txt_email_signup');
		$txt_pword_signup		= $this->input->post('txt_pword_signup');
		$randomCode				= $this->input->post('randomCode');

		$params = array(
			'NO'				=> '',
			'FIRSTNAME'			=> $txt_firstname_signup,
			'LASTNAME'			=> $txt_lastname_signup,
			'USERNAME'			=> $txt_username_signup,
			'PHONENUMBER'		=> $txt_contact_signup,
			'EMAIL'				=> $txt_email_signup,
			'PASSWORD'			=> md5($txt_pword_signup),
			'ACCOUNT_TYPE'		=> 'User',
			'ACTIVATED'			=> '0',
			'VERIFIED'			=> 'NO',
			'VERIFICATIONCODE'	=> $randomCode,
			'PERMISSION'		=> '',
			'IMAGEURL'			=> 'noimage.png',
			'DATE'				=> $this->date,
			'TIME'				=> $this->time,
			'DELETION'			=> 0,
			'LATITUDE'			=> '',
			'LONGHITUDE'		=> ''
		);

		$this->Users_model->create($params);

		require_once('public/swiftmailer/lib/swift_required.php');
		// Create the Transport
		$transport = Swift_SmtpTransport::newInstance('mx1.hostinger.ph', 2525)
		  ->setUsername('jmaeprovider@jmaeprovider.xyz')
		  ->setPassword('111517jmae')
		  ;

		$mailer = Swift_Mailer::newInstance($transport);

		$message = Swift_Message::newInstance('JMAE SITE PROVIDER - VERIFICATION CODE')
		  ->setFrom(array('jmaeprovider@jmaeprovider.xyz' => 'JMAE Provider'))
		  ->setTo(array($txt_email_signup))
		  ->setBody('This is your verification code: ' . $randomCode);	
		  ;

		$result = $mailer->send($message);
	}

	public function resend()
	{
		$txt_email_vc	= $this->input->post('txt_email_vc');
		$randomCode		= $this->input->post('randomCode');

		$params = array(
			'VERIFICATIONCODE'	=>	$randomCode
		);
		$this->Users_model->update_verification_code($params, $txt_email_vc);


		require_once('public/swiftmailer/lib/swift_required.php');
		// Create the Transport
		$transport = Swift_SmtpTransport::newInstance('mx1.hostinger.ph', 2525)
		  ->setUsername('jmaeprovider@jmaeprovider.xyz')
		  ->setPassword('111517jmae')
		  ;

		$mailer = Swift_Mailer::newInstance($transport);

		$message = Swift_Message::newInstance('JMAE SITE PROVIDER - VERIFICATION CODE')
		  ->setFrom(array('jmaeprovider@jmaeprovider.xyz' => 'JMAE Provider'))
		  ->setTo(array($txt_email_vc))
		  ->setBody('This is your verification code: ' . $randomCode);	
		  ;

		$result = $mailer->send($message);
	}

	public function verify()
	{
		$txt_verificationcode_vc	= $this->input->post('txt_verificationcode_vc');
		$txt_email_vc				= $this->input->post('txt_email_vc');

		$row = $this->Users_model->check_verification_code($txt_email_vc, $txt_verificationcode_vc);

		if ( $row == 1 ) {
			$params = array(
				'VERIFIED'			=>	'YES',
				'VERIFICATIONCODE'	=>	''
			);
			$this->Users_model->update_verification_code($params, $txt_email_vc);
		}

		echo $row;
	}

	public function forgotpassword_send()
	{
		$txt_email_fp	= $this->input->post('txt_email_fp');
		$randomCode		= $this->input->post('randomCode');

		$row = $this->Users_model->check_email($txt_email_fp);

		if ( !empty($row) ) {
			$params = array(
				'VERIFIED'			=>	'YES',
				'VERIFICATIONCODE'	=>	$randomCode
			);
			$this->Users_model->update_verification_code($params, $txt_email_fp);

			require_once('public/swiftmailer/lib/swift_required.php');
			// Create the Transport
			$transport = Swift_SmtpTransport::newInstance('mx1.hostinger.ph', 2525)
			  ->setUsername('jmaeprovider@jmaeprovider.xyz')
			  ->setPassword('111517jmae')
			  ;

			$mailer = Swift_Mailer::newInstance($transport);

			$message = Swift_Message::newInstance('JMAE SITE PROVIDER - VERIFICATION CODE')
			  ->setFrom(array('jmaeprovider@jmaeprovider.xyz' => 'JMAE Provider'))
			  ->setTo(array($txt_email_fp))
			  ->setBody('This is your verification code: ' . $randomCode);	
			  ;

			$result = $mailer->send($message);

			$row = 1;
		} else {
			$row = 0;
		}

		echo $row;
	}

	public function verify_fp()
	{
		$txt_verificationcode_fp	= $this->input->post('txt_verificationcode_fp');
		$txt_email_fp				= $this->input->post('txt_email_fp');

		$row = $this->Users_model->check_verification_code($txt_email_fp, $txt_verificationcode_fp);

		if ( $row == 1 ) {
			$params = array(
				'VERIFICATIONCODE'	=>	''
			);
			$this->Users_model->update_verification_code($params, $txt_email_fp);
		}

		echo $row;
	}

	public function reset_password()
	{
		$txt_pword_fp	= $this->input->post('txt_pword_fp');
		$txt_email_fp	= $this->input->post('txt_email_fp');

		$params = array(
			'PASSWORD'	=>	md5($txt_pword_fp)
		);
		$this->Users_model->update_verification_code($params, $txt_email_fp);
	
	}


}
