<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_county extends CI_Controller
{
     private $data;
    protected $before_filter = array(
        'action' => '_check_if_logged_in',
        'except' => array()
    );



   	function __construct()
    {
        parent::__construct();

        $this->load->model('sub_county_model');


        $this->load->helper('url');
       $this->load->database();
        $this->load->library('pagination');

        
    }
    public function index()
    {
        $this->show_sub_county_id();
    }
    public function show_sub_county_id() {


    

     //pagination settings
        $config['base_url'] = site_url('sub_county/index');
        $config['total_rows'] = $this->db->count_all('sub_county_table');
        $config['per_page'] = "50";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;



         $set="";
        $id = $this->uri->segment(3);//get id from the url
        $data['sub_counties'] = $this->sub_county_model->show_sub_counties($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
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