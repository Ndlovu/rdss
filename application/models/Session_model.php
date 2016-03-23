<?php

class Session_model extends CI_Model
{
    public function check_if_session_exists($session_id, $phone_number){
        $this->db->where('session_id', $session_id);
        $this->db->where('phone_number', $phone_number);
        $query = $this->db->get('sessions');
        if ($query->num_rows() > 0) {
            $variable = $query->row();
           // return($variable=$result->result()[0]);
            return $variable;

            } else {
            return false;
        }

    }


    public function new_session($session_id, $phone_number)
    {
        $data = array(
            'session_id' => $session_id,
            'phone_number' => $phone_number,
        );
        $this->db->insert('sessions', $data);
    }

  

   public function save_incident_report($session_id, $mfl_code, $disease_code, $age, $sex, $status){
        $data = array(
            'session_id' => $session_id,
            'mfl_code' => $mfl_code,
            'disease_code' => $disease_code,
            'age'=> $age,
            'sex' => $sex,
            'status' => $status
        );

        $this->db->where('session_id', $session_id);
         $this->db->update('sessions', $data);

    }


  


} 