<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_county extends CI_Controller
{
   	function __construct()
    {
        parent::__construct();

        $this->load->model('sub_county_model');
        
    }
    public function index()
    {
        $this->show_sub_county_id();
    }
    public function show_sub_county_id() {
        $set="";
        $id = $this->uri->segment(3);//get id from the url
        $data['sub_counties'] = $this->sub_county_model->show_sub_counties();
        if ($this->sub_county_model->show_sub_county_id($id)) {$set="set";}
        $data['single_sub_county'] = $this->sub_county_model->show_sub_county_id($id);
        $this->load->view('sub_county',$data);
    }
    function update_sub_county_id1() {
        $id= $this->input->post('sub_county_id');
        $data = array(

            'sub_county_description' => $this->input->post('sub_county_comment'),
        );
        $this->sub_county_model->update_sub_counties_id1($id,$data);

        redirect(base_url()."index.php/sub_county");
    }


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */