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
  $this->load->model('facility_model');

  //check the registration status of the user
  $user_status = $this->session_model->check_user_status($phoneNumber);

  if ($user_status == false) {
     $session_is_present = $this->session_model->check_if_session_exists($sessionId, $phoneNumber);
     if ($session_is_present == false) {

      //if there is no session, create new session and guide user through the registration process
      $this->session_model->new_session($sessionId, $phoneNumber, $key);
      $response = "CON Register to continue using the system: \n Enter full names, national ID, email \n Format: Derrick Oloo, 12345678, derrickOloo@gmail.com";
      
     }elseif($session_is_present == 1){
        $text = explode(",", $text, 3);
        $full_name = $text[0];
        $id_number = $text[1];
        $email_address = $text[2];
        
        $user_id = uniqid();
        $password ="12345";
        $password = md5($password); 
       /* $facility_id = $this->facility_model->get_facility_id_given_code($mfl_code);
        $facility_name = $this->facility_model->get_facility_name_given_code($mfl_code);*/

        $data = array(
          'names'=>$full_name,
          'national_id'=>$id_number,
          'email'=>$email_address,
          'phone_number'=>$phoneNumber,
          'user_id'=>$user_id,
          'password'=>$password
         );
        $this->session_model->save_extra_information($data);

        $response = "END Thank you for registering. $full_name \n Your default password is 12345 identitiestech.com/rdss";
       
     }else{
      $response = "END Error. Please try again";
     }
  }else{
    // $response = "END A session is already running\n";
    $session_is_present = $this->session_model->check_if_session_exists($sessionId, $phoneNumber);
     if ($session_is_present == false) {
       $this->session_model->new_session($sessionId, $phoneNumber, $key);

       $response = "CON Welcome $user_status\n"; 
       $response .= "Select option: \n 1. Report single incident \n 2. Report multiple incidents";
  
    }elseif ($session_is_present == 1) {
      
      $text = trim($text);
      if ($text == 1) {
        $step = 2;
        $this->session_model->set_step($sessionId, $step);
        $response = "CON Single incident. \n Enter mfl code, disease code, age, sex, status, date \n Format: PGH,CL,10,F,Alive \n";

      }elseif ($text == 2) {
        $step = 3;
          $this->session_model->set_step($sessionId, $step);
          $response = "CON Multiple incident\n Enter facility code, disease code, reported cases, deaths, start date, end date \n Format: 21456, CHL, 30, 0, 20150305, 20150410\n";
      }else{
        $response = "END Incorrect input. Try again";
      }

    }elseif ($session_is_present == 2) {
     $text= explode('*', $text, 3);
      $text = $text[1];
      $text = explode(',', $text, 6);
      $mfl_code = $text[0];
      $disease_code = $text[1];
      $age = $text[2];
      $sex = $text[3];
      $status = $text[4];
      $date = $text[5];
      $record_id = uniqid();

      $data = array(
      'alert_id'=>$record_id,
      'user_id' => $user_id,
      'facility_id' => $facility_id,
      'disease_id' => $disease_id,
      'age'=> $age,
      'sex' => $sex,
      'status' => $status,
      'report_date'=>$date);
      
      // $is_disease_valid = $this->session_model->check_disease($disease_code);
      $response = "END  single incident report for $disease_code successfully saved. \n.";


    } elseif ($session_is_present == 3) {
      $text = explode('*', $text, 3);
      $text = $text[1];
      $text = explode(',', $text, 6);
      $mfl_code = $text[0];
      $disease_code = $text[1];
      $number_of_incidents = $text[2];
      $deaths = $text[3];
      $start_date = $text[4];
      $end_date = $text[5];
      $record_id = uniqid();

       $response = "END  multiple incident report successfully saved. \n.";

      
  
    }else{
      $response = "END Technical error. Please try again";

    }

  }

// Print the response onto the page so that our gateway can read it 
// header('Content‐type: text/plain'); 
echo $response; 
// DONE!!! 
}
}
?> 