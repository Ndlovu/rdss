<?php
class Session_model extends CI_Model {

    public function check_user_status($phone_number){
        $this->db->where('phone_number', $phone_number);
        $query = $this->db->get('user_table');
        if ($query->num_rows() > 0){
        return 1;
        }else {
                return false;
        }
    }


    public function check_if_session_exists($session_id, $phone_number)
    {
        $this->db->where('session_id', $session_id);
        $this->db->where('phone_number', $phone_number);
        $result = $this->db->get('session');
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


   public function new_session($session_id, $phone_number, $key)
    {
         $data = array(
            'session_id' => $session_id,
            'phone_number' => $phone_number,
            'session_table_pk'=> $key,
        );
        $this->db->insert('session', $data);
    }

     public function save_extra_information($full_name, $id_number, $email_address, $phone_number){
       $data = array(  'full_name'=>$full_name,
                        'id_number'=>$id_number,
                        'email_address'=>$email_address,
                        'phone_number'=>$phone_number);

        $this->db->insert('user_table', $data);

    }

        function set_step($session_id,$step){
        $data = array('input_step' => $step);
        $this->db->where('session_id',$session_id);
        $this->db->update('session', $data);
    }


    function check_mfl_code($mfl_code){
            $this->db->select("facility_name");
            $this->db->where('mfl_code', $mfl_code);
            $query = $this->db->get('facility_table');
            if($query->num_rows() > 0){
                // return 1;
                $result = $query->row()->facility_name;
                return($result);
            }else{
                return false;
            }
        }

    function check_disease($disease_code){
        $this->db->select("disease_name");
        $this->db->where('disease_acronym', $disease_code);
        $query = $this->db->get('disease_table');
        if ($query->num_rows()>0) {
            $result = $query->row()->disease_name;
            return($result);
        }
        else{
            return false;
        }

   }


     public function save_incident_report($phone_number, $mfl_code, $disease_code, $age, $sex, $status, $date, $record_id){
        
        $user_id = $this->getUserid($phone_number);
        $data = array(
            'alert_id'=>$record_id,
            'user_id' => $user_id,
            'mfl_code' => $mfl_code,
            'disease_code' => $disease_code,
            'age'=> $age,
            'sex' => $sex,
            'status' => $status,
            'date'=>$date);
        
         $this->db->insert('alert_tables', $data);
    }

    function save_weekly_report($phoneNumber, $mfl_code, $disease_code, $number_of_incidents, $deaths, $start_date, $end_date, $record_id){

    $user_id = $this->getUserid($phoneNumber);
    $disease_id = $this->get_disease_id($disease_code);
    $facility_id = $this->get_facility_id();


    $data =array('mfl_code' => $mfl_code,
                'disease_code'=>$disease_code,
                'number_of_incidents'=>$number_of_incidents,
                'number_of_deaths'=>$deaths,
                'date_from' =>$start_date,
                'date_to'=>$end_date,
                'user_id'=>$user_id,
                'record_id' => $record_id);
    $this->db->update('weekly_ussd_reports', $data);

   }

   function getUserid($phoneNumber){
    $this->db->select('user_id');
    $this->db->from('user_table');
    $this->db->where('phone_number', $phoneNumber);
    $query = $this->db->get();
    $result = $query->row()->user_id;
    return $result;
   }

   public function get_disease_id($disease_code)
   {
    $this->db->select('disease_id');
    $this->db->from('disease_table');
    $this->db->where('disease_acronym', $disease_code);
    $query = $this->db->get();
    $result = $query->row()->disease_id;
    return $result;
   }


   public function get_facility_id($mfl_code)
   {
    $this->db->select('facility_id');
    $this->db->from('facility_table');
    $this->db->where('mfl_code', $mfl_code);
    $query = $this->db->get();
    $result = $query->row()->facility_id;
    return $result;
   }

} 
?>