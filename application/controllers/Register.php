<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> helper(array('form', 'url'));
		$this -> load -> library('session', 'form_validation');
		$this -> load -> database();
		$this -> load -> model('User_M');

	}

	public function index() {
		$this -> load -> view('layout/Header_login');		
		$this -> load -> view('authentication/Register');
		$this -> load -> view('layout/Footer_login');
		$this -> load -> helper('directory');
		$map = directory_map('./mydirectory/');

	}

	function registration() {
		$session_data = $this -> session -> userdata;
		$this -> load -> library('form_validation');
		$this -> load -> helper('form');
		$this -> load -> model('User_M');
		/*set validation rules*/
		$this -> form_validation -> set_rules('firstname', 'First Name', 'required');
		$this -> form_validation -> set_rules('lastname', 'Last Name', 'required');
		$this -> form_validation -> set_rules('email', 'Email', 'required|valid_email');
		$this -> form_validation -> set_rules('password', 'Password', 'trim|required');
		$this -> form_validation -> set_rules('password2', 'Password2', 'trim|required|matches[password]');

		/*validate form input*/
		if ($this -> form_validation -> run() == TRUE) {

			$clean = $this -> security -> xss_clean($this -> input -> post(NULL, TRUE));
			/*sql inserting unser*/
			$id = $this -> User_M -> insertUser($clean);
			$token = $this -> User_M -> updateToken($id);
			/*crate login Inforation*/
			$qstring = base64_encode($token);
			$url = base_url() . index_page() . 'Register/complete/token/' . $qstring;
			$link = '<a href="' . $url . '">' . $url . '</a>';
			$message = '';
			$message .= '<h1> Hello ' . $clean['firstname'].' '.$clean['lastname'] . '</h1>';
			$message .= '<strong>You are now an memer of Cloudly</strong><br>';
			$message .= '<strong>Please click to finish the prozess:</br></strong> ' . $link;
			/*Sending Mail theplan mail pw tp12345!! theplan.mail@gmail.com*/
			$config = Array('protocol' => 'sendmail', 'smtp_host' => 'ssl://smtp.googlemail.com', 'smtp_port' => 465, 'smtp_user' => 'theplan.mail@gmail.com',
			'smtp_pass' => 'tp12345!!','mailtype' => 'html', 'charset' => 'iso-8859-1', 'wordwrap' => TRUE, 'newline' => "\r\n", );

			$this -> load -> library('email',$config);
			//$this -> email -> initialize($config);
			$this -> email -> from('theplan.mail@gmail.com', 'AdminNelson');
			$this -> email -> to($clean['email']);
			$this -> email -> cc('');
			$this -> email -> bcc('');
			$this -> email -> subject('Completed regristition for Cloudly');
			$this -> email -> message($message);
            $this -> email -> send();
			//echo $this -> email -> print_debugger();
			//echo var_dump($result);

			if ($message != null) {
				$this -> load -> view('layout/Header_login');
				$this -> load -> view('authentication/Login');
				$this -> load -> view('layout/Footer_login');
				echo '<script>alert("Please check your Mails.")</script>';

			}
		} else {
			/*error*/
			$this -> load -> helper('directory');
			$this -> load -> view('layout/Header_login');
			$this -> load -> view('authentication/Register');
			$this -> load -> view('layout/Footer_login');

			echo '<script>alert("Please check the input.")</script>';

		}

	}

	public function complete() {
		$this -> load -> library('form_validation');
		$this -> load -> model('User_M');
		$token = base64_decode($this -> uri -> segment(4));

		$cleanToken = $this -> security -> xss_clean($token);

		$user_info = $this -> User_M -> isTokenValid($cleanToken);
		//either false or array();

		if (!$user_info) {
			$this -> session -> set_flashdata('flash_message', 'Token is invalid or expired');
			redirect(base_url() . index_page() . '/login');
		}
		$array = json_decode(json_encode($user_info), true);
		$this -> User_M -> updateUserInfo($array);
		

		//var_dump($this->s3->putBucket("usr".$bucket_name, ACL_PUBLIC_READ ));

		echo '<script>alert("Congratulation you are now an Member.")</script>';
		$this -> load -> view('layout/Header_login');
		$this -> load -> view('authentication/Login');
		$this -> load -> view('layout/Footer_login');

	}

}
?>