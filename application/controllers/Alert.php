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
        $user_id="4323wrw234";
               
        $alert = array(
            'date'=>$this->input->post('date'),
            'age'=>$this->input->post('age'),
            'sex'=>$this->input->post('sex'),
            'status'=>$this->input->post('status'),
            'facility_id'=>$facility_id,
            'disease_id'=>$disease_id,
            'user_id'=>$user_id,
             'alert_id'=>uniqid()
            
        );

        $disease_id = $this->alert_model->add_alert($alert);
        $this->show_alerts();



    }


function update_alert() {
        $id= $this->input->post('alert_id');
        $disease_name=$this->input->post('disease_name');
        $facility_name = $this->input->post('facility_name');
        $facility_id=$this->facility_model->get_facility_id_given_name($facility_name);
        $disease_id=$this->disease_model->get_disease_id_given_name($disease_name);
        $user_id="4323wrw234";
        $data = array(
            'date'=>$this->input->post('date'),
            'age'=>$this->input->post('age'),
            'sex'=>$this->input->post('sex'),
            'status'=>$this->input->post('status'),
            'facility_id'=>$facility_id,
            'disease_id'=>$disease_id,
            'user_id'=>$user_id,

            
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




}




/*function get_by_id()
    {
        $pending_shipment_id = $_GET['pending_shipment_id'];
        $data=$this->stocks_model->show_pending_shipment_by_id($pending_shipment_id);
        
        $data_array = array();
        foreach($data as $myvalue){
        $commodity_id=$myvalue->commodity_id;
        $funding_agency_id=$myvalue->funding_agency_id;
        $funding_agency_name=$this->stocks_model->get_funding_agency_name($funding_agency_id);
        $commodity_name= $this->stocks_model->get_commodity_id_with_the_given_id($commodity_id);
       
        $data_array[] = $funding_agency_id;
        $data_array[] = $funding_agency_name;
        $data_array[] = $commodity_id;
        $data_array[] = $commodity_name;
        //echo($funding_agency_name." ".$commodity_name);
        }
        /*NOTES:
            0 - funding agency id
            1 - funding agency name
            2 - commodity id
            3 - commodity name
    
        $return = json_encode($data_array);
        echo $return;
        
    }
*/
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */