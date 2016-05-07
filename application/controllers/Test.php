<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller
{
	 function __construct()
    {
        parent::__construct();

		   $this->load->model('session_model');
		  
   }

 	public function index(){
 		// $phoneNumber = "0724441238";
 		// $session_id = "2345gc56789jb";
 		//  $user_status = $this->session_model->check_if_session_exists($session_id, $phoneNumber);
 		//  echo($user_status);
 		$this->load->view('test2');
 	}

 	public function errors(){
 		$this->load->view('404');
 	}
}
?>
<!-- check_mfl_code($mfl_code){
 check_disease($disease_code){ -->



