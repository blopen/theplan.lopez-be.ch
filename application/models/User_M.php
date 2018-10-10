<?php
Class User_M extends CI_Model {
	function login($email, $password) {
		$this -> db -> select('*');
		$this -> db -> from('user');
		$this -> db -> where('email', $email);
		$this -> db -> where('password', hash('sha256',$password.SALT));
		$this -> db -> where('status', 1);
		$this -> db -> limit(1);
		$query = $this -> db -> get();
	
		if ($query -> num_rows() == 1) {
			return $query -> result();
		} else {
			return false;
		}
	}
	
	public function insertUser($d){  
       $string = array(
                'firstname'=>$d['firstname'],
                'lastname'=>$d['lastname'],
                'email'=>$d['email'],
                'password'=>hash('sha256',$d['password'].SALT),
                'rolle'=>0, 
                'status'=>0
            );
            $q = $this->db->insert_string('user',$string);             
            $this->db->query($q);
            return $this->db->insert_id();
    }
	
	public function updateToken($id) {
		$token = substr(sha1(rand()), 0, 30);
		$data = array('token' => $token);
		$this -> db -> where('id', $id);
		$this -> db -> update('user', $data);
		return $token;
	}

	public function isTokenValid($token)
    {
        $q = $this->db->get_where('user', array('token' => $token), 1);        
        if($this->db->affected_rows() > 0){
            $row = $q->row();             
            $user_info = $this->getUserInfo($row->id);
            return $user_info;     
        }else{
            return false;
        }
        
    } 
	
	public function updateUserInfo($post){
        $data = array(
               'log_date' => date('Y-m-d h:i:s A'), 
               'status' => 1
            );
        $this->db->where('id', $post['id']);
        $this->db->update('user', $data); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updateUserInfo('.$post['id'].')');
            return false;
        }
        
        $user_info = $this->getUserInfo($post['id']); 
        return $user_info; 
    }
	
	public function updateUserPassword($id,$password){
        $data = array(
              'password'=>hash('sha256',$password.SALT), 
            );
        $this->db->where('id', $id);
        $this->db->update('user', $data); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updateUserInfo('.$id.')');
            return false;
        }
        
        $user_info = $this->getUserInfo($id); 
        return $user_info; 
    }
	
	public function updateUserMail($id,$mail){
        $data = array(
              'email'=>$mail, 
            );
        $this->db->where('id', $id);
        $this->db->update('user', $data); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updateUserInfo('.$id.')');
            return false;
        }
        
        $user_info = $this->getUserInfo($id); 
        return $user_info; 
    }
	
	public function updateUserImage($filename,$id){
        $data = array(
              'profilepic'=>$filename, 
            );
        $this->db->where('id', $id);
        $this->db->update('user', $data); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updateUserInfo('.$id.')');
            return false;
        }
        
        $user_info = $this->getUserInfo($id); 
        return $user_info; 
    }
	
	
	public function getUserInfo($id){
        $q = $this->db->get_where('user', array('id' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }

}
?>