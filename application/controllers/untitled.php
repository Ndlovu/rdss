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
        $msgs = $this->message_model->get_messages();
        $county_id = "jkG3zaihdSs";
       // $county_id = $this->county_model->get_county_id_given_name($county_name);
        $data['sub_counties'] = $this->sub_county_model->show_sub_county_by_county_id($county_id);

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
                                        "status"=>$value->status,
                                        "county_id"=>$value->cid,
                                        "facility_id"=>$value->fid,
                                        "disease_id"=>$value->did,
                                        "alert_id"=>$value->alert_id,
                                        );   
                                              
          }
          
          }
     // $data['counties'] = $this->county_model->show_counties();
$data['filter_by_county'] = $disease_report;




  // $this->load->view('county_coordinator', $data);
    $message_count =0;
    foreach ($disease_report as $value) {
     
        foreach ($msgs as $key) {
            if ($key->alert_id == $value['alert_id']) {
                $message_count++;
            }
        
        }
    }

    $sub_county_name = $this->input->post('sub_county_name');
    $sub_county_id = $this->sub_county_model->get_sub_county_id_given_name($sub_county_name);

    $values = $this->welcome_model->alerts_per_sub_county();
            $disease_per_sub = null;
            foreach ($values as $value) {
                if ($value->sub_id == $sub_county_id) {
                $disease_per_sub[] = array(

                                        "disease"=>$value->disease_name,
                                        "age"=>$value->age,
                                        "sex"=>$value->sex,
                                        "date"=>$value->report_date,
                                        "facility"=>$value->f_name,
                                        "sub_county" =>$value->sub_county_name,
                                        "status"=>$value->status,
                                        "county_id"=>$value->cid,
                                        "facility_id"=>$value->fid,
                                        "disease_id"=>$value->did,
                                        "alert_id"=>$value->alert_id,);   
                                                
                    
                }
            }
     $data['sub_counties_reports'] = $disease_per_sub;


    // echo $message_count;
    $data['count'] = $message_count;
     $this->load->view('county_coordinator', $data);
    // var_dump($disease_per_sub['disease']);
   

    
}

public function report_by_sub(){
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
     // $sub_counties_reports = $this->sub_county_model->show_sub_counties();
     // $this->index();
     print_r($disease_per_sub);
}




}
?>