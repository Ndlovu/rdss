<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
{
     private $data;
    protected $before_filter = array(
        'action' => '_check_if_logged_in',
        'except' => array()
    );


    function __construct()
    {
        parent::__construct();

        $this->load->model('alert_model');
    }


    function index(){

        $user_id= $this->session->userdata('user_id');

       echo  $user_id;

        //echo $_SESSION['user_id'];
    }





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */