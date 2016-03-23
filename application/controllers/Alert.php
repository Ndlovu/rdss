<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alert extends CI_Controller
{
    private $data;
    protected $before_filter = array(
        'action' => '_check_if_logged_in',
        'except' => array()
    );

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


    function __construct()
    {
        parent::__construct();

        $this->load->model('alert_model');
        $this->load->model('disease_model');
        $this->load->model('facility_model');
        $this->load->model('sub_county_model');
        $this->load->model('county_model');
    }

    public function index()
    {
        $this->show_alerts();
    }

    public function show_alerts() {
        $data['alert'] = $this->alert_model->show_alerts();
        $data['disease']=$this->disease_model->show_diseases();
        $data['facility']=$this->facility_model->show_facilities();
        $data['sub_county']=$this->sub_county_model->show_sub_counties();
        $data['county'] = $this->county_model->show_counties();
        $this->load->view('alert',$data);

    }

    public function save_alert(){
        $disease_name=$this->input->post('disease_name');
        $facility_name = $this->input->post('facility_name');
        $facility_id=$this->facility_model->get_facility_id_given_name($facility_name);
        $disease_id=$this->disease_model->get_disease_id_given_name($disease_name);
       // $user_id="4323wrw234";
        $user_id= $this->session->userdata('user_id');
        $county_name = $this->input->post('county_name');
        $county_id = $this->county_model->get_county_id_given_name($county_name);

        $sub_county_name = $this->input->post('sub_county_name');
        $sub_county_id = $this->sub_county_model->get_sub_county_id_given_name($sub_county_name);

        $facility_name = $this->input->post('facility_name');
        $facility_id = $this->facility_model->get_facility_id_given_name($facility_name);

               
        $alert = array(
            'date'=>$this->input->post('date'),
            'age'=>$this->input->post('age'),
            'sex'=>$this->input->post('sex'),
            'status'=>$this->input->post('status'),
            'facility_id'=>$facility_id,
            'disease_id'=>$disease_id,
            'user_id'=>$user_id,
             'alert_id'=>uniqid(),
             'facility_id'=>$facility_id,
             'sub_county_id'=>$sub_county_id,
             'county_id'=>$county_id
            
        );

        $disease_id = $this->alert_model->add_alert($alert);
        $this->show_alerts();



    }
    //


function update_alert() {
        $id= $this->input->post('alert_id');
        $disease_name=$this->input->post('disease_name');
        $facility_name = $this->input->post('facility_name');
        $facility_id=$this->facility_model->get_facility_id_given_name($facility_name);
        $disease_id=$this->disease_model->get_disease_id_given_name($disease_name);
        // $user_id="4323wrw234";
        $user_id= $this->session->userdata('user_id');
        $county_name = $this->input->post('county_name');
        $county_id = $this->county_model->get_county_id_given_name($county_name);

        $sub_county_name = $this->input->post('sub_county_name');
        $sub_county_id = $this->sub_county_model->get_sub_county_id_given_name($sub_county_name);

        $facility_name = $this->input->post('facility_name');
        $facility_id = $this->facilty_model->get_facility_id_given_name($facility_name);

        $data = array(
            'date'=>$this->input->post('date'),
            'age'=>$this->input->post('age'),
            'sex'=>$this->input->post('sex'),
            'status'=>$this->input->post('status'),
            'facility_id'=>$facility_id,
            'disease_id'=>$disease_id,
            'user_id'=>$user_id,
            'facility_id'=>$facility_id,
            'sub_county_id'=>$sub_county_id,
            'county_id'=>$county_id
         
        );

        $this->alert_model->update_alert($id,$data);
        $this->show_alerts();


    }


    function delete_alert($id)   {
        $this->db->where('alert_id', $id);
        $deleterecord=$this->db->delete('alerts_table');
        $data['status'] =  "";

        $this->show_alerts();
    }




    function weekly_report(){


        $data['w_report'] =  $this->alert_model->show_weekly_reports();
     
         $data['disease']=$this->disease_model->show_diseases();
        $data['facility']=$this->facility_model->show_facilities();
        $data['sub_county']=$this->sub_county_model->show_sub_counties();
        $data['county'] = $this->county_model->show_counties();
         $this->load->view('weekly_report',$data);
      
    


    }


    function save_weekly_report(){
        $disease_name=$this->input->post('disease_name');
        $facility_name = $this->input->post('facility_name');
        $facility_id=$this->facility_model->get_facility_id_given_name($facility_name);
        $disease_id=$this->disease_model->get_disease_id_given_name($disease_name);
      
        $user_id= $this->session->userdata('user_id');
        $weekly_cases = $this->input->post('weekly_cases');
        $number_of_deaths = $this->input->post('number_of_deaths');
        $start_date = $this->input->post('start_date');
         $end_date = $this->input->post('end_date');

               
        $alert = array(
            
            'facility_id'=>$facility_id,
            'disease_id'=>$disease_id,
            'user_id'=>$user_id,
             'alert_id'=>uniqid(),
             'facility_id'=>$facility_id,
             'start_date'=>$start_date,
             'end_date'=>$end_date
            
            
        );

        $disease_id = $this->alert_model->add_weekly_report($alert);
        //$this->show_alerts();

     //   $this->load->view('weekly_report');
        $this->weekly_report();
    }



}



