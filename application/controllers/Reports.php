<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller
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

    public function index()
    {
        $this->show_ussd_report();
    }

  
    function show_ussd_report(){

        $data['ussd_report'] = $this->alert_model->show_ussd_disease_report();
        $this->load->view('ussd_report', $data);
        
    }  

    function report_per_county(){
        
    }  






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */