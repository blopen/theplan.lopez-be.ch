<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Aufgabe: Login anzeigen,
    Autor: Nelson Lopez,
    Version: 1.0,
    Datum: 04.12.24
*/
class Login extends CI_Controller {

	/*standart aufruf der Webseite*/
	public function index()
	{
		$this->load->view('layout/Header_login');
		$this->load->view('authentication/Login' );
		$this->load->view('layout/Footer_login');
	}
}
