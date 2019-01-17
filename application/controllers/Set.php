<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
    Aufgabe: Set bearbeiten,
    Autor: Nelson Lopez,
    Version: 1.0,
    Datum: 04.12.24
*/
class Set extends CI_Controller {
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
        $this -> load -> library('session', 'form_validation');
    }
    /*Default function: Ruf die benötigten Daten für die Set auf*/
    function index() {
        $session_data = $this -> session -> userdata('userData');
        $data['email'] = $session_data['email'];
        $data['firstname'] = $session_data['firstname'];
        $data['lastname'] = $session_data['lastname'];
        $data['log_date'] = $session_data['log_date'];
        $data['set'] = $this->Session_M->getExerciseOfSessionById();
        $this -> load -> view('layout/Header', $data);
        $this -> load -> view('authentication/Set');
        $this -> load -> view('authentication/PlusSetButton');
        $this -> load -> view('layout/Footer');
    }
    /*Function: Bearbeiten einer Set*/
    function edit() {
        $sessionid = $this->uri->segment(3);//set auch so machen
        $session_data = $this -> session -> userdata('userData');
        $data['email'] = $session_data['email'];
        $data['firstname'] = $session_data['firstname'];
        $data['lastname'] = $session_data['lastname'];
        $data['log_date'] = $session_data['log_date'];
        $data['session'] = $this->Session_M->getSessionById($sessionid);
        $data['set'] = $this->Session_M->getExerciseOfSessionById($sessionid);
        //print_r($data);
        $this -> load -> view('layout/Header', $data);
        $this -> load -> view('authentication/Set');
        $this -> load -> view('authentication/PlusSetButton');
        $this -> load -> view('layout/Footer');
        //
    }
    /*Function: Hinzufügen einer Set*/
    function add() {
        $sessionid = $this->uri->segment(3);//set auch so machen
        $session_data = $this -> session -> userdata('userData');
        $data['email'] = $session_data['email'];
        $data['firstname'] = $session_data['firstname'];
        $data['lastname'] = $session_data['lastname'];
        $data['log_date'] = $session_data['log_date'];
        $data['session_id'] = $sessionid;
        $data['session'] = $this->Session_M->getSessionById($sessionid);
        $data['set'] = $this->Session_M->getExerciseOfSessionById($sessionid);
        $this -> load -> view('layout/Header', $data);
        $this -> load -> view('authentication/Set_add');
        $this -> load -> view('authentication/SaveSetButton');
        $this -> load -> view('layout/Footer');
        //
    }
    /*Function: Betrachten einer Set*/
    function watch() {
        $setid = $this->uri->segment(3);//set auch so machen
        $seessionid = $this->uri->segment(4);//set auch so machen
        $session_data = $this -> session -> userdata('userData');
        $data['email'] = $session_data['email'];
        $data['firstname'] = $session_data['firstname'];
        $data['lastname'] = $session_data['lastname'];
        $data['log_date'] = $session_data['log_date'];
        $data['session'] = $this->Session_M->getSessionById($seessionid);
        $data['session_id'] = $seessionid;
        $data['set'] = $this->Session_M->getSetById($setid);
        if(isset($setid)){
            $_SESSION['SetId']= $setid;
        }
        $this -> load -> view('layout/Header', $data);
        $this -> load -> view('authentication/Set_add');
        $this -> load -> view('authentication/SaveSetButton');
        $this -> load -> view('layout/Footer');
    }
    /*Function: Speichern eines Set*/
    public function save() {
        $setData = $this -> input -> post();
        $session_id = $this -> Session_M -> saveSet($setData);
        redirect('Set/edit/'.$setData['session_id']);


    }
    /*Function: Löschen eines Set*/
    public function delete($sid) {
        $setid = $this->uri->segment(3);//set auch so machen
        $seessionid = $this->uri->segment(4);//set auch so machen
        $result = $this -> Session_M -> deleteSet($setid);
        redirect('Set/edit/'.$seessionid);


    }
}
