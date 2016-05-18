<?php
class Session_model extends CI_Model {

public function check_user_status($phone_number){
$this->db->where('phone_number', $phone_number);
$query = $this->db->get('user_table');
if ($query->num_rows() > 0){
$data = $query->result();
foreach ($data as $value) {
$name = $value->names; }
	return $name;

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
// ave_extra_information($full_name, $id_number, $email_address, $phoneNumber);
public function save_extra_information($full_name, $id_number, $email_address, $phoneNumber){
$data = array(
	'names'=>$full_name,
	'id_number'=>$id_number,
	'email_address'=>$email_address,
	'phone_number'=>$phoneNumber);

$this->db->insert('user_table', $data);

}


} 
?>