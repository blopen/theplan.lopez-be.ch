<?php
/*
    Aufgabe: Session ausgeben,
    Autor: Nelson Lopez,
    Version: 1.0,
    Datum: 04.12.24
*/
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
		$this -> load -> model('Session_M', '', TRUE);
		$this -> load -> helper('form');
		$this -> load -> helper('url');
        $this->load->library('session');
	}
    /*Default function: Ruf die benötigten Daten für die Tranings Session auf*/
	function index() {
        if(false)
        {

            self::overview();
        }
        else
        {
            $session_data = $this -> session -> userdata('userData');
            redirect('Home/watch/'.$session_data['id']);
        }
	}
	/*Funktion zum betrachten der Session*/
    function watch($id) {
        $this->load->library('session');
        $session_data = $this -> session -> userdata('userData');
        $data['email'] = $session_data['email'];
        $data['firstname'] = $session_data['firstname'];
        $data['lastname'] = $session_data['lastname'];
        $data['log_date'] = $session_data['log_date'];
        $data['id'] = $id;
        $data['session'] = $this->Session_M->getSessionByUserId($id);
        $this -> load -> view('layout/Header', $data);
        $this -> load -> view('authentication/Home');
        $this -> load -> view('authentication/PlusButton');
        $this -> load -> view('layout/Footer');
    }
    /*Funktion zum Ausloggen*/
	function logout() {
		$this -> session -> unset_userdata('userData');
		session_destroy();
		redirect('login', 'refresh');
	}
}
?>