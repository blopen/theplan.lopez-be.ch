<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
        $this -> load -> view('authentication/Sessions');
        $this -> load -> view('authentication/SaveButton');
        $this -> load -> view('layout/Footer');
        //
    }
    function watch($id) {

        $this -> load -> library('session', 'form_validation');
        $session_data = $this -> session -> userdata('logged_in');
        $data['email'] = $session_data['email'];
        $data['firstname'] = $session_data['firstname'];
        $data['lastname'] = $session_data['lastname'];
        $data['log_date'] = $session_data['log_date'];
        $data['session'] = $this->Session_M->getSessionById($id);
        $this -> load -> view('layout/Header', $data);
        $this -> load -> view('authentication/Sessions');
        $this -> load -> view('authentication/SaveButton');
        $this -> load -> view('layout/Footer');
        //
    }

    public function add() {
        $sessionData = $this -> input -> post();
        $sessionId = $this -> Session_M -> save($sessionData);
        $this->watch($sessionId);


    }

    function logout() {
        $this -> session -> unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }

}
?>