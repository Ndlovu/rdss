<?php
class Message_model extends CI_Model
{

public function save_message($record_id, $message, $user_id, $time){

	$message_details = array(
							'alert_id' =>$record_id,
							'message'=>$message,
							'user_id'=>$user_id,
							'date_time'=>$time);

	$this->db->insert('messages', $message_details);
	return $this->db->insert_id();
}

/*public function get_messages(){
	$this->db->order_by('message_id', 'asc');
	 $query = $this->db->get('messages');
     $query_result = $query->result();
     return $query_result; 
}*/



/*       public function alerts_per_county(){
         $sql ="SELECT disease_id as did, age, sex, status, user_id as id_user, report_date,facility_id as fid, (SELECT parent_id FROM facility_table WHERE facility_id = fid) as sub_id, (SELECT parent_id FROM sub_county_table WHERE sub_county_id = sub_id) as cid,(SELECT sub_county_name FROM sub_county_table WHERE sub_county_id = sub_id) as sub_county_name,(SELECT facility_name FROM facility_table WHERE facility_id = fid) as f_name, (SELECT disease_name FROM disease_table WHERE disease_id = did) as disease_name FROM alerts_table";
         $result = $this->db->query($sql);
         if ($result->num_rows()>0) {
             $result = $result->result();
             return $result;
         }else{return null;}
         
    }*/

    public function get_messages(){
	$sql = "SELECT alert_id, message_id, user_id as ui, message, date_time, (SELECT names FROM user_table WHERE user_id = ui) as user_name FROM messages ORDER BY message_id";
	$result = $this->db->query($sql);
	if ($result->num_rows()>0) {
             $result = $result->result();
             return $result;
         }else{return null;}


    }

    
    


    

    
}
?>

