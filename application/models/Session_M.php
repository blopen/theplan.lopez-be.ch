<?php
Class Session_M extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function getAllSession()
    {
        return $this->db->get('session')->result_array();
    }
    public function getSessionById($id)
    {
        $this->db->select('*');
        return $this->db->where(array('id' => intval($id)))->get('session')->result_array()[0];
    }
    public function save($data)
    {
        if(!intval($data['id'])) {
            $session_data = $this -> session -> userdata('logged_in');
            $user_id = $session_data['id'];
            $data['user_id'] = $user_id;
            $data['date'] = date('Y-m-d');
            $this->db->insert('session', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        } else {
            $session_data = $this -> session -> userdata('logged_in');
            $user_id = $session_data['id'];
            $data['user_id'] = $user_id;
            $data['date'] = date('Y-m-d');
            $this->db->where(array('id' => intval($data['id'])))->update('session', $data);
            return $data['id'];
        }
    }

}
?>
