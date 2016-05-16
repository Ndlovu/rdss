<?php 
class Ussd extends CI_Controller
{
  public function index(){
  $sessionId = $this->input->post('sessionId');
  $phoneNumber = $this->input->post('phoneNumber');
  $serviceCode = $this->input->post('serviceCode');
  $text = $this->input->post('text');
  $key = uniqid();

 //load the model to be used to store and retrieve data to and from a database
  $this->load->model('session_model');

  //check the registration status of the user
  $user_status = $this->session_model->check_user_status($phoneNumber);

  if ($user_status == false) {
     $session_is_present = $this->session_model->check_if_session_exists($sessionId, $phoneNumber);
     if ($session_is_present == false) {

      //if there is no session, create new session and guide user through the registration process
      $this->session_model->new_session($sessionId, $phoneNumber, $key);
      $response = "CON Register to continue using the system: \n Enter full names, national ID, email \n Format: Derrick Oloo, 12345678, derrickOloo@gmail.com";
      
     }else{
        $temp_variable = $text;
        $temp_variable = explode(",", $temp_variable);
        $full_name = $temp_variable[0];
        $id_number = $temp_variable[1];
        $email_address = $temp_variable[2];
        $this->session_model->save_extra_information($full_name, $id_number, $email_address, $phoneNumber);
        $response = "END Thank you for registering. $full_name";
     }
  }else{
    $response = "END A session is already running\n";
  }

// Print the response onto the page so that our gateway can read it 
header('Content‐type: text/plain'); 
echo $response; 
// DONE!!! 
}
}
?> 