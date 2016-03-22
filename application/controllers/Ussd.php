<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ussd extends CI_Controller
{
function __construct()
{
  parent::__construct();

  //loads the session model to the controller
  $this->load->model('session_model');
        
    }
public function index(){
  $session_id = $this->input->post('sessionId');
  $phone_number = $this->input->post('phoneNumber');
  $text = $this->input->post('text');



  //check if there are any current sessions running using the supplied credentials
  $session_is_present = $this->session_model->check_if_session_exists($session_id, $phone_number);
  echo $session_is_present;        

        

      // Print the response onto the page so that our gateway can read it
     //header('Content-type: text/plain');
     echo $response;
      

       
    }


}


