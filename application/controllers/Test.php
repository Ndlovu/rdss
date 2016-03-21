<?php

class Test extends CI_Controller
{

	  function __construct()
    {
        parent::__construct();

       $this->load->model('session_model');

    }
	public function index()
			{
		$session_id = "xt68456tt";
		$phone_number = "0724441239";
		$this->load->model('session_model');
		
		 $session_is_present = $this->session_model->check_if_session_exists($session_id, $phone_number);
		// var_dump($session_is_present);
		 echo $session_is_present[0]->input_step;
			}


}
?><!-- Session_model -->