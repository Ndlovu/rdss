<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
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

        $this->load->model('welcome_model');

    }
/*	public function index()
	{
		$this->load->view('welcome_message');
	}*/


	public function index()
{
	$some_data = $this->welcome_model->map_disease_location();
    //$some_data = $this->Some_model->get_some_data();
    $some_data = json_encode($some_data);
  /*  $data = array (
            'some_data' => $some_data
    );*/
    $data['test_data'] = $some_data;
       $this->load->view('test',$data);


}


  /*	public function disease_locations(){

        //$disease_locations = $this->welcome_model->map_diseases();
		$disease_locations = $this->welcome_model->map_disease_location();
        
        //header('Content-Type: application/x-json; charset=utf-8');
        echo json_encode($disease_locations);
        // exit();
        $data =  array('disease_locations' => $disease_locations
        	);

        $this->load->view('welcome_message', $data);
    }
*/


}

/*$data = array (
            'some_data' => $some_data;
    );

    $this->load->view('some_view',$data)*/





