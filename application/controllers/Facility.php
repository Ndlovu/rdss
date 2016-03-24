<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facility extends CI_Controller
{
     private $data;
    protected $before_filter = array(
        'action' => '_check_if_logged_in',
        'except' => array()
    );


    function __construct()
    {
        parent::__construct();

        $this->load->model('facility_model');


        
        $this->load->helper('url');
       $this->load->database();
        $this->load->library('pagination');

    }

    public function index()
    {
        $this->show_facilities();
    }

    public function show_facilities() {



     //pagination settings
        $config['base_url'] = site_url('facility/index');
        $config['total_rows'] = $this->db->count_all('facility_table');
        $config['per_page'] = "500";
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



        $data['facility'] = $this->facility_model->show_facility($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('facility',$data);

    }

    function update_facility() {
        $id= $this->input->post('facility_id');
        $data = array(
            'facility_name' => $this->input->post('facility_name'),
            'facility_description' => $this->input->post('facility_description'),
        );
        $this->facility_model->update_facility($id,$data);
        $this->show_facilities();

    }


    function delete_facility($id)   {

        $this->db->where('facility_id', $id);
        $deleterecord=$this->db->delete('facility_table');
        $data['status'] =  "";

        $this->show_facilities();
    }

    public function save_facility(){
        $facility = array(
            'facility_name' => $this->input->post('facility_name'),
            'facility_description' => $this->input->post('facility_description'),
            'facility_id'=>uniqid()
        );

        $facility_id = $this->facility_model->add_facility($facility);
        $this->show_facilities();



    }


    






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */