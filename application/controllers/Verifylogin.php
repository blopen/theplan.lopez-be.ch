<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('User_M', '', TRUE);
		$this -> load -> library('session', 'form_validation');
	}

	function index() {
		//This method will have the credentials validation
		$this -> load -> library('form_validation');

		$this -> form_validation -> set_rules('email', 'Email', 'trim|required');
		$this -> form_validation -> set_rules('password', 'Password', 'trim|required|callback_check_database');

		if ($this -> form_validation -> run() == FALSE) {
			//Field validation failed.  User redirected to login page
			$this -> load -> view('layout/Header_login');
			$this -> load -> view('authentication/Login');
			$this -> load -> view('layout/Footer_login');
		} else {
            $session_data = $this -> session -> userdata('userData');
			redirect(base_url(). "Home/watch/".$session_data['id']);
		}
	}

	function check_database($password) {
		$email = $this -> input -> post('email');
		$this -> load -> model('User_M');
        $this -> load -> library('session', 'form_validation');
		//query the database
		$result = $this -> User_M -> login($email, $password);
		if ($result) {
			foreach ($result as $row) {
				$sessarray = array('id' => $row -> id, 'email' => $row -> email, 'firstname' => $row -> firstname, 'lastname' => $row -> lastname, 'log_date' => $row -> log_date, );
				$this -> session -> set_userdata('userData', $sessarray);
			}
			return TRUE;
		} else {
			$this -> form_validation -> set_message('check_database', 'Invalid username or password');
			return false;
		}

	}

}
?>