<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home extends CI_Controller {
	/*constructor for all uses elemets*/

	function __construct() {
		parent::__construct();
		$this -> load -> model('User_M', '', TRUE);
		$this -> load -> model('Folder_M', '', TRUE);
		$this -> load -> model('File_M', '', TRUE);
		$this -> load -> model('Upload_M', '', TRUE);
		$this -> load -> model('Download_M', '', TRUE);
		$this -> load -> model('Object_M', '', TRUE);
		$this -> load -> helper('form');
		$this -> load -> helper('url');
		$this -> load -> library('session', 'form_validation');
		/*debuggingtool: echo "<pre>";
		var_dump($value["Size"]) lol;
		die;*/

	}

	function index() {

        $this -> load -> library('session', 'form_validation');
		$session_data = $this -> session -> userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['firstname'] = $session_data['firstname'];
		$data['lastname'] = $session_data['lastname'];
		$data['log_date'] = $session_data['log_date'];
		$id = $session_data['id'];
		$this -> load -> view('layout/Header', $data);
		$this -> load -> view('authentication/Welcome');
		$this -> load -> view('layout/Footer');
        //
	}

	public function do_upload() {
		$session_data = $this -> session -> userdata('logged_in');
		$input = $this -> input -> post("userfile");
		echo $this -> Upload_M -> do_upload($input);
		
	}
	
	function logout() {
		$this -> session -> unset_userdata('logged_in');
		session_destroy();
		redirect('login', 'refresh');
	}

}
?>