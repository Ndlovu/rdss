<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ussd extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();

        $this->load->model('session_model');
    }
    public function index(){
      // Reads the variables sent via POST from our gateway 
      
      $sessionId   = $_POST["sessionId"]; 
      $serviceCode = $_POST["serviceCode"]; 
      $phoneNumber = $_POST["phoneNumber"]; 
      $text        = $_POST["text"]; 

      $session_is_present = $this->session_model->check_if_session_exists($sessionId, $phoneNumber);
      if ( $session_is_present ==false) {
        $new_session = $this->session_model->new_session($sessionId, $phoneNumber);
        $response  = "CON What would you want to do \n"; 
        $response .= "1. Register \n"; 
        $response .= "2. Report incident";
      }//enf of $session_is_present ==false
     

    // Print the response onto the page so that our gateway can read it
   //header('Content-type: text/plain');
   echo $response; 


}//end of function index
}//end of Ussd_trial controller
     
?>