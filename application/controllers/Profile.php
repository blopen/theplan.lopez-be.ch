<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> helper('form');
		$this -> load -> helper('url');
		$this -> load -> model('User_M', '', TRUE);
		$this -> load -> model('Profile_M', '', TRUE);
		$this -> load -> library('session', 'form_validation');
		$this -> load -> database();
	}

	public function index() {
		$session_data = $this -> session -> userdata('userData');
		$data['email'] = $session_data['email'];
		$data['firstname'] = $session_data['firstname'];
		$data['lastname'] = $session_data['lastname'];
		$data['log_date'] = $session_data['log_date'];
		$this -> load -> view('layout/Header', $data);
		$this -> load -> view('authentication/Profile', $data);
		$this -> load -> view('layout/Footer');
		$this -> load -> helper('directory');
		$map = directory_map('./mydirectory/');
	}

	function changePassword() {
		$session_data = $this -> session -> userdata('userData');
		$this -> load -> library('form_validation');
		$this -> load -> helper('form');
		$this -> load -> model('User_M');
		$id = $session_data['id'];
		$newpassword = $this->input->post('password2');
				/*set validation rules*/
		
		$this -> form_validation -> set_rules('password', 'Password', 'callback_check_database');
		$this -> form_validation -> set_rules('password1', 'Password1', 'trim|required');
		$this -> form_validation -> set_rules('password2', 'Password2', 'trim|required|matches[password1]');

		if ($this -> form_validation -> run() == FALSE) {/*error*/
			echo "Please check the input.";
		} else {
			$this -> User_M -> updateUserPassword($id, $newpassword);
			echo 'done';

		}

	}
	function changeMail() {
		$session_data = $this -> session -> userdata('userData');
		$this -> load -> library('form_validation');
		$this -> load -> helper('form');
		$this -> load -> model('User_M');
		$id = $session_data['id'];
		$newMail = $this->input->post('emailM');
		/*set validation rules*/
		
		$this -> form_validation -> set_rules('emailM', 'EmailM', 'trim|required');
		$this -> form_validation -> set_rules('passwordM', 'PasswordM', 'callback_check_database');

		if ($this -> form_validation -> run() == FALSE) {/*error*/
			echo "Please check the input.";
		} else {
			$this -> User_M -> updateUserMail($id, $newMail);
			echo 'done';

		}

	}
		public function setProfileImage() { 
		$session_data = $this -> session -> userdata('userData');
		$input = $this -> input -> post("userfileimge");
		var_dump($input);
		die();
		if($this -> Profile_M -> do_upload($input)){
			echo 'done';
		}else{
			echo 'not work';
		}
		

	}

	function check_database($password) {
		$session_data = $this -> session -> userdata('userData');
		$email = $session_data['email'];
		$this -> load -> model('User_M');
		
		//query the database
		$result = $this -> User_M -> login($email, $password);
		if ($result) {
			return TRUE;
		} else {
			$this -> form_validation -> set_message('check_database', 'Invalid Password');
			return false;
		}
		

	}

}
