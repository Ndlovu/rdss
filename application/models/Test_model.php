<?php

class Test_model extends CI_Model
{

   //check if there are any scurrent essions
    public function check_if_session_exists($session_id, $phone_number){
        $this->db->select('*');
        $this->db->from('sessions');
        $this->db->where('session_id', $session_id);
        $this->db->where('phone_number', $phone_number);
        $query=$this->db->get();
        $rows = $query->num_rows();
        //$result = $query->result_array();
        if($rows>0){
        //return $result;
        $row = $query->row_array();
        return $row;
    }
        else 
        {
            return false;
        }
        
        }




          public function save_name($session_id, $full_name)
    {   $step = 2;
        $data = array(
            'full_name' => $full_name,
            'input_step' => $step,
        );

        $this->db->where('session_id', $session_id);
        $this->db->update('sessions', $data);
    }




	}


	?>


