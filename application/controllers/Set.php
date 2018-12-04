<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
        /*debuggingtool: echo "<pre>";
        var_dump($value["Size"]) lol;
        die;*/

    }

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
        //
    }
    function edit() {
        $sessionid = $this->uri->segment(3);//set auch so machen
        $session_data = $this -> session -> userdata('userData');
        $data['email'] = $session_data['email'];
        $data['firstname'] = $session_data['firstname'];
        $data['lastname'] = $session_data['lastname'];
        $data['log_date'] = $session_data['log_date'];
        $data['session'] = $this->Session_M->getSessionById($sessionid);
        $data['set'] = $this->Session_M->getExerciseOfSessionById($sessionid);
        print_r($data);
        $this -> load -> view('layout/Header', $data);
        $this -> load -> view('authentication/Set');
        $this -> load -> view('authentication/PlusSetButton');
        $this -> load -> view('layout/Footer');
        //
    }
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
        //
    }
    public function save() {
        $setData = $this -> input -> post();
        $session_id = $this -> Session_M -> saveSet($setData);
        redirect('Set/edit/'.$setData['session_id']);


    }
    public function delete($sid) {
        $setid = $this->uri->segment(3);//set auch so machen
        $seessionid = $this->uri->segment(4);//set auch so machen
        $result = $this -> Session_M -> deleteSet($setid);
        redirect('Set/edit/'.$seessionid);


    }

    public function do_upload() {
        $session_data = $this -> session -> userdata('userData');
        $input = $this -> input -> post("userfile");
        echo $this -> Upload_M -> do_upload($input);

    }

    function logout() {
        $this -> session -> unset_userdata('userData');
        session_destroy();
        redirect('login', 'refresh');
    }

}
