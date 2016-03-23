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
/*  $session_id = $this->input->post('sessionId');
  $phone_number = $this->input->post('phoneNumber');
  $text = $this->input->post('text');*/


$phone_number = "0724441239";
$session_id = "xt68456tt";


  //check if there are any current sessions running using the supplied credentials
  $session_is_present = $this->session_model->check_if_session_exists($session_id, $phone_number);
  if ($session_is_present==false){
  
    //created new session using user credentials: session id and phone number
    $this->session_model->new_session($session_id, $phone_number);
    
        $response = "CON Register to rdss. Please use the format: full names, ID number, email.\n Format:george oliech,2121212 georgeoliech@gmail.com";

      }   

        

      // Print the response onto the page so that our gateway can read it
     //header('Content-type: text/plain');
    echo $response;
      

       
    }


}















/*<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
  if ($session_is_present==false){
  
    //created new session using user credentials: session id and phone number
    $this->session_model->new_session($session_id, $phone_number);
    
        $response = "CON Register to rdss. Please use the format: full names, ID number, email.\n Format:george oliech,2121212 georgeoliech@gmail.com";

      }else if ($session_is_present['input_step'] == 1){
        $temp = $text;
        $temp = explode(',', $temp);//remove commas from the sting to identify each user input
        $full_name = $temp[0];
        $id_number = $temp[1];
        $email_address =$temp[2]; 
   
      
     $this->session_model->save_extra_information($session_id, $full_name, $id_number, $email_address);

     $response = "CON Registration successful: Welcome \n report disease incident\n MFL_CODE,DISEASE_CODE,AGE,GENDER,STATUS
             Format: PGH,CL,10,F,Alive";
      }else if($session_is_present['input_step']==2) {

                  $temp = $text;
                  $temp = explode('*', $temp);
                  $temp = $temp[1];
                  $temp = explode(',', $temp);
                 $mfl_code = $temp[0];
                  $disease_code = $temp[1];
                  $age = $temp[2];
                  $sex = $temp[3];
                  $status = $temp[4];
                  $this->session_model->save_incident_report($session_id, $mfl_code, $disease_code, $age, $sex, $status);
                  $response = "END Thank You for using RDSS \n.";

                }
        

        

      // Print the response onto the page so that our gateway can read it
     //header('Content-type: text/plain');
     echo $response;
      

       
    }


}


*/