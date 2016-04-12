<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('message_model');
        }

    public function submit_message(){
    	$record_id = $this->input->post('alert_id');
    	$message = $this->input->post('message');
    	$user_id= $this->session->userdata('user_id');
    	$time = date("Y-m-d");

   	$this->message_model->save_message($record_id, $message, $user_id, $time);
   	$this->load->view('report_per_user');
   	  }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */