<?php 

class Ussd extends CI_Controller
{
  public function index(){
  $sessionId = $this->input->post('sessionId');
  $phoneNumber = $this->input->post('phoneNumber');
  $text = $this->input->post('text');
  $key = uniqid();

  //load the model to be used to store and retrieve data to and from a database
  $this->load->model('sessions_model');

  //check the registration status of the user
  $user_status = $this->sessions_model->check_user_status($phoneNumber);
  if ($user_status == false) {
  //if the user has not registered execute this block of code
    $session_is_present = $this->sessions_model->check_if_session_exists($sessionId, $phoneNumber);
    if ($session_is_present == false) {
      //if there is no session, create new session and guide user through the registration process
      $this->sessions_model->new_session($sessionId, $phoneNumber, $key);
      $response = "CON Register to continue using the system:";
      $response .= "Enter full names, national ID, email";
      $response .= "Format: Derrick Oloo, 12893465, derrickOloo@gmail.com";
      }elseif($session_is_present == 1){

        $temp_variable = $text;
        $temp_variable = explode(",", $temp_variable);
        $full_name = $temp_variable[0];
        $id_number = $temp_variable[1];
        $email_address = $temp_variable[2];
        $this->sessions_model->save_extra_information($full_name, $id_number, $email_address, $phoneNumber);
        $response = "END Thank you for registering. $full_name";
    }else{
      $response = "END Sorry. an error has occured. please try again";
    }

  }else{
       $session_is_present = $this->sessions_model->check_if_session_exists($sessionId, $phoneNumber);
    if ($session_is_present == false) {
       $this->sessions_model->new_session($sessionId, $phoneNumber, $key);

       $response = "CON Select option: \n 1. Single incident \n 2. Multiple incidents \n "
  
    }elseif ($session_is_present == 1) {
      $temp_variable = $text;
      if ($temp_variable == 1) {
        $step = 2;
        $this->sessions_model->set_step($sessionId, $step);
        $response = "END Report incident. \n Enter mfl code, disease code, age, sex, status, date \n Format: PGH,CL,10,F,Alive \n";

      }elseif ($temp_variable == 2) {
        $step = 3;
          $this->sessions_model->set_step($sessionId, $step);
          $response = "END Weekly report\n Enter facility code, disease code, reported cases, deaths, start date, end date \n Format: 21456, CHL, 30, 0, 20150305, 20150410";
      }else{
        $response = "END Incorrect input. Try again";
      }

    }elseif ($session_is_present == 2) {
    $temp = $text;
      $temp = explode('*', $temp);
      $temp = $temp[1];
      $temp = explode(',', $temp);
      $mfl_code = $temp[0];
      $disease_code = $temp[1];
      $age = $temp[2];
      $sex = $temp[3];
      $status = $temp[4];
      $date = $temp[5];
      $record_id = uniqid();
      $is_disease_valid = $this->sessions_model->check_disease($disease_code);
      if ($is_disease_valid == false) {
        $response = "END Incorrect disease code. Please try again.";
      }else{
        $is_facility_valid = $this->sessions_model->check_mfl_code($mfl_code);
        if ($is_facility_valid == false) {
          $response = "END Incorrect facility code. Please try again";
        }else{

          $this->sessions_model->save_incident_report($phoneNumber, $mfl_code, $disease_code, $age, $sex, $status, $date, $record_id);
          $response = "END $is_disease_valid incident report for $is_facility_valid successfully saved. \n.";

        }
      }

     /* $this->sessions_model->save_incident_report($phoneNumber, $mfl_code, $disease_code, $age, $sex, $status, $date);
      $response = "END incident report successfully saved. \n."; */

    }elseif ($session_is_present == 3) {
      
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
      $record_id = uniqid();
      
            $is_disease_valid = $this->sessions_model->check_disease($disease_code);
      if ($is_disease_valid == false) {
        $response = "END Incorrect disease code. Please try again.";
      }else{
        $is_facility_valid = $this->sessions_model->check_mfl_code($mfl_code);
        if ($is_facility_valid == false) {
          $response = "END Incorrect facility code. Please try again";
        }else{

  $this->sessions_model->save_weekly_report($phoneNumber, $mfl_code, $disease_code, $number_of_incidents, $deaths, $start_date, $end_date, $record_id);
          $response = "END $is_disease_valid mulitple incident report for $is_facility_valid successfully saved. \n.";

        }
      }
    /*$this->sessions_model->save_weekly_report($sessionId, $mfl_code, $disease_code, $number_of_incidents, $deaths, $start_date, $end_date);
      $response = "END  Multiple incident report successfully saved\n.";*/

    }
    else{
      $response = "END Technical error. Please try again";
    }


  }
    echo $response;
    } 
  }
?>