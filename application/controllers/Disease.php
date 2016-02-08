<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Disease extends CI_Controller
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

        $this->load->model('disease_model');
    }

    public function index()
    {
        $this->show_diseases();
    }

    public function show_diseases() {
        $data['disease'] = $this->disease_model->show_diseases();
        $this->load->view('disease',$data);

    }

    function update_disease() {
        $id= $this->input->post('disease_id');
        $data = array(
            'disease_acronym'=>$this->input->post('disease_acronym'),
            'disease_name' => $this->input->post('disease_name'),
            'disease_description' => $this->input->post('disease_description'),
        );
        $this->disease_model->update_disease($id,$data);
        $this->show_diseases();

    }


    function delete_disease($id)   {

        $this->db->where('disease_id', $id);
        $deleterecord=$this->db->delete('disease_table');
        $data['status'] =  "";

        $this->show_diseases();
    }

    public function save_disease(){

      
        $disease = array(
            'disease_acronym'=>$this->input->post('disease_acronym'),
            'disease_name' => $this->input->post('disease_name'),
            'disease_description' => $this->input->post('disease_description'),
            'disease_id'=>uniqid()
        );

        $disease_id = $this->disease_model->add_disease($disease);
        $this->show_diseases();



    }





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */