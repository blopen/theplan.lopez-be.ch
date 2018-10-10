<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$this->load->view('layout/Header_login');
		$this->load->view('authentication/Login' );
		$this->load->view('layout/Footer_login');
	}
}
