<?php

class Sessions_model extends CI_Model
{
    

    public function check_user_status($phone_number){
        $this->db->where('phone_number', $phone_number);
        $query = $this->db->get('session');
        if ($query->num_rows() > 0){
        return 1;
        }else {
                return false;
        }
    }


    public function check_if_session_exists($session_id, $phone_number){
        $this->db->where('session_id', $session_id);
        $this->db->where('phone_number', $phone_number);
        $result = $this->db->get('sessions');
        $val = null;
        if ($result->num_rows() > 0) {
           $variable=$result->result();
           foreach ($variable as $value) {

               $val = $value->input_step;
           }
            return $val;
           
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


    public function save_extra_information($session_id, $full_name, $id_number, $email_address){
        $data = array(  'full_name'=>$full_name,
                        'id_number'=>$id_number,
                        'email_address'=>$email_address);

         $this->db->where('session_id', $session_id);
         $this->db->update('sessions', $data);

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


    function check_mfl_code($mfl_code){
        $this->db->where('mfl_code', $mfl_code);
        $query = $this->db->get('facility');
        if($query->num_rows() > 0){
            return 1;
        }else{
            return false;
        }
    }

    function check_disease(){
        $this->db->where('disease_code', $disease_code);
        $query = $this->db->get('disease_table');
        if ($query->num_rows()>0) {
            return 1;
        }
        else{
            return false;
        }

   }

   function save_weekly_report($session_id, $mfl_code, $disease_code, $number_of_incidents, $number_of_deaths, $start_date, $end_date){
    $data =array('mfl_code' => $mfl_code,
                'disease_code'=>$disease_code,
                'number_of_incidents'=>$number_of_incidents,
                'number_of_deaths'=>$number_of_deaths,
                'date_from' =>$start_date,
                'date_to'=>$end_date);

    $this->db->where('session_id',$session_id);
    $this->db->update('sessions', $data);
   }
} 



?>