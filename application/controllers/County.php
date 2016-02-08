<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class County extends CI_Controller
{
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

        $this->load->model('county_model');
    }
    public function index()
    {
        $this->show_county_id();
    }
    public function show_county_id() {
        $set="";
        $id = $this->uri->segment(3);//get id from the url
        $data['counties'] = $this->county_model->show_counties();
        if ($this->county_model->show_county_id($id)) {$set="set";}
        $data['single_county'] = $this->county_model->show_county_id($id);
        $this->load->view('county',$data);
    }
    function update_county_id1() {
        $id= $this->input->post('county_id');
        $data = array(

            'county_description' => $this->input->post('county_comment'),
        );
        $this->county_model->update_counties_id1($id,$data);

        redirect(base_url()."index.php/county");
    }


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */