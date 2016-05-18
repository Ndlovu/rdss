<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	private $data;
    protected $before_filter = array(
        'action' => '_check_if_logged_in',
        'except' => array()
    );

	


    function __construct()
    {
        parent::__construct();

		   $this->load->model('welcome_model');
		   $this->load->model('county_model');
		   $this->load->model('user_model');
		   $this->load->model('sub_county_model');
		   $this->load->model('message_model');
		   $this->load->model('disease_model');
   }

		public function index()
		{
			$this->load->view('welcome_message');
				

		}

		public function disease_location(){
			$some_data = $this->welcome_model->map_disease_location();
		    $some_data = json_encode($some_data);
		   echo $some_data;
		   
		  }

		  public function location(){
			$some_data = $this->welcome_model->map_location();
		    $some_data = json_encode($some_data);
		   echo $some_data;
		   
		  }
		  public function map_ussd_locations(){

		  	$data = $this->welcome_model->show_ussd_disease_report();
		  	$data = json_encode($data);
		  	echo($data);
		  }
		  public function report_by_county(){
		  	$county_name = $this->input->post('county_name');
		  	$county_id = $this->county_model->get_county_id_given_name($county_name);

		  	$values = $this->welcome_model->alerts_per_county();
		  	$disease_report = null;
            foreach ($values as $value) {
     		   if ($value->cid == $county_id) {
     		   	$disease_report[] = array(
                                        "disease"=>$value->disease_name,
                                        "age"=>$value->age,
                                        "sex"=>$value->sex,
                                        "date"=>$value->report_date,
                                        "facility"=>$value->f_name,
                                        "sub_county" =>$value->sub_county_name,
                                        "status"=>$value->status);   
                                           		
        	}
        	
        	}
        	$data['counties'] = $this->county_model->show_counties();
        	$data['filter_by_county'] = $disease_report;
        	$this->load->view('report_by_county', $data);

	  }

	  public function report_per_user(){
	  	$user_name = $this->input->post('user_name');
	   $user_id = $this->user_model->get_user_id_given_name($user_name);
	   	$data['filtered_by_user'] = $this->welcome_model->alerts_per_user($user_id);
	  	$data['users'] = $this->user_model->get_all_users();
	  	$data['messages'] = $this->message_model->get_messages();
	  	
	  	$this->load->view('report_per_user', $data);

	  }

	  public function view_twitter_reports(){
		$this->load->view('tweet');
		}

		public function report_per_sub_county(){
			$sub_county_name = $this->input->post('sub_county_name');
			$sub_county_id = $this->sub_county_model->get_sub_county_id_given_name($sub_county_name);

			$values = $this->welcome_model->alerts_per_sub_county();
			$disease_per_sub = null;
			foreach ($values as $value) {
				if ($value->sub_id == $sub_county_id) {
				$disease_per_sub = array(
                                        "disease"=>$value->disease_name,
                                        "age"=>$value->age,
                                        "sex"=>$value->sex,
                                        "date"=>$value->report_date,
                                        "facility"=>$value->f_name,
                                        "sub_county" =>$value->sub_county_name,
                                        "status"=>$value->status);   
                                           		
					
				}
			}
			$data['sub_counties'] = $this->sub_county_model->show_sub_counties();
			$data['filtered_data']= $disease_per_sub;
			$this->load->view('report_per_sub_county', $data);

		}

		public function view_report_by_disease(){
			$disease_name=$this->input->post('disease_name');
			$disease_id = $this->disease_model->get_disease_id_given_name($disease_name);

			$data['filter_by_disease'] = $this->welcome_model->alerts_by_disease($disease_id);
			$data['diseases'] = $this->disease_model->show_diseases();
			$this->load->view("report_per_disease", $data);

		}


		public function facility_coordinator(){
			$facility_id = $this->session->userdata("facility_id");
			$data["facility_alerts"]= $this->welcome_model->get_facilty_alerts($facility_id);
			$this->load->view("facility_coordinator", $data);
		}



}