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

        /*$data['disease']=$this->disease_model->show_diseases();
        $data['facility']=$this->facility_model->show_facilities();
        $data['messages'] = $this->message_model->get_messages();
        // $msgs = $this->message_model->get_messages();  
        $user_id = $this->session->userdata('user_id');
        // $facility_id=$this->session->userdata('facility_id');
        $data['user_report'] = $this->welcome_model->alerts_per_user($user_id);


        $message_count =0;
        foreach ($disease_report as $value) {

        foreach ($msgs as $key) {
            if ($key->alert_id == $value['alert_id']) {
                $message_count++;
            }

        }
        }
        $data['count'] = $message_count;    
        $this->load->view('individual_dashboard', $data);
 		*/
         $cty_id = $this->session->userdata('facility_id');
         echo($cty_id);

          $data = $this->facility_model->get_county_id_given_facility_id($cty_id);
        foreach ($data as $key) {
            $county_id = $key->cid;
        }
        var_dump($county_id);


}

}
?>