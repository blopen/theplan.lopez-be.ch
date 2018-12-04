<?php

Class Session_M extends CI_Model
{

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
        return $this->db->where(array('id' => intval($id)))->get('session')->result_array();
    }
    public function getSessionByUserId($id)
    {
        return $this->db->where(array('user_id' => intval($id)))->get('session')->result_array();
    }
    public function getSetById($id)
    {
        $this->db->select('*');
        $dataSet =$this->db->where(array('id' => intval($id)))->get('set')->result_array()[0];
        $dataExcersise= $this->getExersiceById($dataSet['exercise_id']);
        $dataSet['name'] = $dataExcersise['name'];
        $dataSet['description'] =$dataExcersise['description'];
        $dataSet['exercise_id'] =$dataExcersise['id'];
        return $dataSet;
    }

    public function getExersiceById($id)
    {
        $this->db->select('*');
        return $this->db->where(array('id' => intval($id)))->get('exercise')->result_array()[0];
    }
    public function getExerciseOfSessionById($id)
    {
        $this->db->join('session_set', 'set.id = session_set.set_id');
        $this->db->join('exercise', 'set.exercise_id = exercise.id');
        $this->db->where('session_id', $id);
        return $this->db->get('set')->result_array();
        $sql = $this->db->last_query();
        echo $sql;
    }

    public function getAllKeygroupUsers()
    {
        $this->db->join('users', 'keygroup_user.uid = users.id');
        $this->db->join('keygroup', 'keygroup_user.kgid = keygroup.id');
        $this->db->order_by("groupname", "asc");
        return $this->db->get('keygroup_user')->result_array();
        $sql = $this->db->last_query();
        echo $sql;
    }

    public function delete($sid)
    {
        $this->db->where('id', $sid);
        if ($this->db->delete('session')) {
            //$this -> db -> where('kid', $kid);
            //$this -> db -> delete('password');
            echo $this->db->last_query();
        }
    }
    public function deleteSet($eid)
    {
        $this->db->where('id', $eid);
        if ($this->db->delete('set')) {
            //$this -> db -> where('kid', $kid);
            //$this -> db -> delete('password');
            echo $this->db->last_query();
        }
    }

    public function save($data)
    {
        if (!intval($data['id'])) {
            $session_data = $this->session->userdata('userData');
            $user_id = $session_data['id'];
            $data['user_id'] = $user_id;
            if(!isset($data['date'])){
                $date = date('Y-m-d',strtotime($data['date']));
                $time = date(' H:i:s');
                $data['date'] = $date.$time;
            }else{
                $date = date("Y-m-d");
                $time = date(' H:i:s');
                $data['date'] = $date.$time;
            }
            $this->db->insert('session', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        } else {
            $session_data = $this->session->userdata('userData');
            $user_id = $session_data['id'];
            $data['user_id'] = $user_id;
            $date = date("Y-m-d", strtotime($data['date']) );//DateTime::createFromFormat('d/m/Y', $data['date']);
            //$dateString = $date->format('Y-m-d');
            $data['date'] = $date.date(' H:i:s');
            $this->db->where(array('id' => intval($data['id'])))->update('session', $data);
            return $data['id'];
        }
    }

    public function saveSet($data)
    {
        if (!intval($data['set_id'])) {
        $session_data = $this->session->userdata('userData');
        $user_id = $session_data['id'];
        $dataEx['user_id'] = $user_id;
        $dataEx['name'] = $data['name'];
        $dataEx['description'] = $data['description'];
        $this->db->insert('exercise', $dataEx);
        $exercise_id = $this->db->insert_id();
        $dataSet['exercise_id'] = $exercise_id;
        $dataSet['weight'] = $data['weight'];
        $dataSet['repetition'] = $data['repetition'];
        $this->db->insert('set', $dataSet);
        $set_id = $this->db->insert_id();
        $dataSetSession['set_id'] = $set_id;
        $dataSetSession['session_id'] = $data['session_id'];
        $this->db->insert('session_set', $dataSetSession);
        } else {
            $dataEx['name'] = $data['name'];
            $dataEx['description'] = $data['description'];
            $this->db->where(array('id' => intval($data['exercise_id'])))->update('exercise', $dataEx);
            $dataSet['weight'] = $data['weight'];
            $dataSet['repetition'] = $data['repetition'];
            $this->db->where(array('id' => intval($data['set_id'])))->update('set', $dataSet);
        }
        return $data['session_id'];


    }
    /*SELECT * FROM exercise e JOIN `set` s on e.id=s.exercise_id
                                join session_set ss on ss.set_id=s.id
                                join `session` se on ss.session_id=se.id
                                WHERE e.user_id = 5*/
    public function getExersiceOfUser($id)
    {
        $this->db->join('set', 'exercise.id = set.exercise_id ');
        $this->db->join('session_set', 'session_set.set_id = set.id');
        $this->db->join('session', 'session_set.session_id = session.id');
        return $this->db->where(array('exercise.user_id' => intval($id)))->get('exercise')->result_array();

        //$sql = $this->db->last_query();
        //echo $sql;
    }
    public function  getSparklineInfosOfAllExercises($id)
    {
        $dataExerciose  = $this -> getExersiceOfUser($id);
        $sparklineInfos;
        $sparklinestring;
        foreach ($dataExerciose as $key => $values){
              $sparklineInfos[$key]['name'] = $dataExerciose[$key]['name'];
              $power = ($dataExerciose[$key]['weight'] * $dataExerciose[$key]['repetition']);
              $sparklinestring .= $power.",";
                //array_push($sparkline,$power.",");
        }
        $sparklineInfos['power'] =$sparklinestring;
        return $sparklineInfos['power']; //['weight'][repetition] [name]
    }

}

?>
