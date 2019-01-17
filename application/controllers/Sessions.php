<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
    Aufgabe: Session bearbeiten,
    Autor: Nelson Lopez,
    Version: 1.0,
    Datum: 04.12.24
*/
class Sessions extends CI_Controller {
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
        $this -> load -> library('form_validation');
        $this->load->library('session');
    }
    /*Default function: Ruf die benötigten Daten für die Session auf*/
    function index() {
        $session_data =  $_SESSION['userData'];
        $data['email'] = $session_data['email'];
        $data['firstname'] = $session_data['firstname'];
        $data['lastname'] = $session_data['lastname'];
        $data['log_date'] = $session_data['log_date'];
        $data['id']  = $session_data['id'];
        $this -> load -> view('layout/Header', $data);
        $this -> load -> view('authentication/Sessions');
        $this -> load -> view('authentication/SaveButton');
        $this -> load -> view('layout/Footer');
        //
    }
    /*Function: Bearbeiten einer Session*/
    function edit($id) {
        if(!isset($id)) {
            $id = $this->uri->segment(3);
        }//set auch so machen
        $session_data =$_SESSION['userData'];
        $data['email'] = $session_data['email'];
        $data['firstname'] = $session_data['firstname'];
        $data['lastname'] = $session_data['lastname'];
        $data['log_date'] = $session_data['log_date'];
        $data['id']= $id;
        $data['session'] = $this->Session_M->getSessionById($id);
        $data['set'] = $this->Session_M->getExerciseOfSessionById($id);
        //print_r($data);
        $this -> load -> view('layout/Header', $data);
        $this -> load -> view('authentication/Sessions');
        $this -> load -> view('authentication/SaveButton');
        $this -> load -> view('layout/Footer');
    }
    /*Function: Hinzufügen einer Session*/
    public function add() {
        $sessionData = $this -> input -> post();
        $sessionId = $this -> Session_M -> save($sessionData);
        $this->edit($sessionId);
    }
    /*Function: Löschen einer Session*/
    public function delete($sid) {
        $result = $this -> Session_M -> delete($sid);
        echo $result;
        redirect('home');
    }
}
?>