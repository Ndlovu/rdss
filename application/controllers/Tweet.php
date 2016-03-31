<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Tweet extends CI_Controller
{


 function __construct()
    {
        parent::__construct();
        $this->load->model('county_model');
        $this->load->model('sub_county_model');
    }

		public function index(){
		//$data['counties']=$this->county_model->show_counties();
		$this->load->view('tweet');
		//$this->get_by_id();
      //  var_dump($data);
		

		}


    function get_by_id()
{
     	$county_id = $_GET['pending_shipment_id'];
       
        $sub_counties = $this->sub_county_model->show_sub_county_by_county_id($county_id);
        
        $data_array;

        foreach($sub_counties as $myvalue){
        	$sub_county_name = $myvalue->sub_county_name;
	       $data_array[] = array($sub_county_name => $sub_county_name );
      
        //echo($funding_agency_name." ".$commodity_name);
        }
       
        $data = json_encode($data_array);
        echo $data;
        
    }



   /* function get_by_id()
    {	$county_name ="Kericho County";
        //$county_name = $_GET['county_name'];
        $county_id =$this->county_model->get_county_id_given_name($county_name);
        // $data=$this->stocks_model->show_pending_shipment_by_id($pending_shipment_id);
        $data = $this->sub_county_model->show_sub_county_by_county_id($county_id);
        $data_array = null;

        foreach ($data as $value) {
           $data_array[] = array($value->sub_county_name => $value->sub_county_name);
        }
        $data_array = json_encode($data_array);
       print_r($data_array);
       
    }*/
}
?>



