<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facility extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('facility_model');
    }

    public function index()
    {
        $this->show_facilities();
    }

    public function show_facilities() {
        $data['facility'] = $this->facility_model->show_facilities();
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