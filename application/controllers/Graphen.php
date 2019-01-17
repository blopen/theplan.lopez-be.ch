<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
    Aufgabe: Char ausgeben,
    Autor: Nelson Lopez,
    Version: 1.0,
    Datum: 04.12.24
*/
class Graphen extends CI_Controller {
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
    /*Default function: Ruf die benötigten Daten für den Char auf*/
    function index() {

        $session_data =  $_SESSION['userData'];
        $data['email'] = $session_data['email'];
        $data['firstname'] = $session_data['firstname'];
        $data['lastname'] = $session_data['lastname'];
        $data['log_date'] = $session_data['log_date'];
        $data['id']  = $session_data['id'];
        $data['sparkline'] = $this->Session_M->getSparklineInfosOfAllExercises($data['id']);
        $this -> load -> view('layout/Header', $data);
        $this -> load -> view('authentication/Graphen');
        $this -> load -> view('layout/Footer');
    }

}
?>