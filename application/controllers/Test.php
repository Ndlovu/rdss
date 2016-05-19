<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller
{
	 function __construct()
    {
        parent::__construct();

		   $this->load->model('facility_model');
		   $this->load->model('disease_model');
		   $this->load->model('welcome_model');
		   $this->load->model('county_model');
		   $this->load->model('message_model');
           $this->load->model('sub_county_model');
		  
   }

 	public function index(){

        $data['disease']=$this->disease_model->show_diseases();
        $data['facility']=$this->facility_model->show_facilities();
        $data['messages'] = $this->message_model->get_messages();
        // $msgs = $this->message_model->get_messages();   

        $message_count =0;
  /*  foreach ($disease_report as $value) {

    foreach ($msgs as $key) {
        if ($key->alert_id == $value['alert_id']) {
            $message_count++;
        }

    }
    }*/
   $data['count'] = $message_count;    

        $this->load->view('facility_coordinator', $data);
 		
}

}
?>