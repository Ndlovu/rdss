<?php
class Ussd extends CI_Controller
{
  public function index(){
  $sessionId = $this->input->post('sessionId');
  $phoneNumber = $this->input->post('phoneNumber');
  $text = $this->input->post('text');

  $record_id = uniqid();

  $this->load->model('session_model');
  $session = $this->session_model->check_if_session_exists($sessionId, $phoneNumber);

  if($session == false){
  $this->session_model->new_session($sessionId, $phoneNumber, $record_id);
  $response = "CON Select option: \n 1. Register \n 2. Single incident \n 3. Multiple incidents \n";
  }elseif($session == 1){
  $test_variable = $text;
  if($test_variable == 1 ){
  $step = 2;
  $this->session_model->set_step($sessionId, $step);
  $response = "END Register with us. Enter Full name, ID number, E-mail \n Format: george oliech,2121212 georgeoliech@gmail.com ";

  }else if($test_variable == 2){
  $step = 3;
  $this->session_model->set_step($sessionId, $step);
  $response = "END Report incident. \n Enter mfl code, disease code, age, sex, status, date \n Format: PGH,CL,10,F,Alive \n";

  }else if ($test_variable == 3){
  $step = 4;
  $this->session_model->set_step($sessionId, $step);
  $response = "END Weekly report\n Enter facility code, disease code, reported cases, deaths, start date, end date \n Format: 21456, CHL, 30, 0, 20150305, 20150410";

  }else{

  $response = "END Incorrect input! Try again.";

  }

  }
  elseif ($session == 2) {
  $temp = $text;
       
  $temp = explode(',', $temp);//remove commas from the sting to identify each user input
  $full_name = $temp[0];
  $id_number = $temp[1];
  $email_address =$temp[2]; 
            
  $this->session_model->save_extra_information($sessionId, $full_name, $id_number, $email_address);
  $response ="END Thank you for registering.";

  }elseif ($session == 3) {
  $temp = $text;
  $temp = explode('*', $temp);
  $temp = $temp[1];
  $temp = explode(',', $temp);
  $mfl_code = $temp[0];
  $disease_code = $temp[1];
  $age = $temp[2];
  $sex = $temp[3];
  $status = $temp[4];

  $this->session_model->save_incident_report($sessionId, $mfl_code, $disease_code, $age, $sex, $status);
  $response = "END incident report successfully saved. \n."; 

  }elseif ($session == 4) {
  $temp = $text;
  $temp = explode('*', $temp);
  $temp = $temp[1];
  $temp = explode(',', $temp);
  $mfl_code = $temp[0];
  $disease_code = $temp[1];
  $number_of_incidents = $temp[2];
  $deaths = $temp[3];
  $start_date = $temp[4];
  $end_date = $temp[5];
  // save_weekly_report($session_id, $mfl_code, $disease_code, $number_of_incidents, $number_of_deaths, $start_date, $end_date)
  $this->session_model->save_weekly_report($sessionId, $mfl_code, $disease_code, $number_of_incidents, $deaths, $start_date, $end_date);
  $response = "END  Weekly report successfully saved\n.";
  }
  else{
    $response = "END Incorrect input. Try again.";
  }
  echo $response;
  } 
}
?>