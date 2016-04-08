<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller
{
	public function index(){
		$this->load->model('welcome_model');
       // $this->load->view('test');
		$county_id = "jkG3zaihdSs";
		$values = $this->welcome_model->alerts_per_county();
        // print_r($values);
        // $data_array = null;
        foreach ($values as $value) {
        if ($value->cid == $county_id) {
        	 $disease_report[] = array(/*"facility" => $value->sub_id,*/
                                        "disease"=>$value->disease_name,
                                        "age"=>$value->age,
                                        "sex"=>$value->sex,
                                        "date"=>$value->report_date,
                                        "facility"=>$value->f_name,
                                        "sub_county" =>$value->sub_county_name,
                                        "status"=>$value->status);   
                                           		
        	}
        	// echo($disease_report->Disease);

        	}
        	// print_r($disease_report[0]['disease']);
        	$data['filter_by_county'] = $disease_report;

        	$this->load->view('test', $data);

        }


}
?>



