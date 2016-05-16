<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller
{
	 function __construct()
    {
        parent::__construct();

		   $this->load->model('alert_model');
		  
   }

 	public function index(){
 		$data =  $this->alert_model->show_weekly_reports();
 		print_r($data);
 		
}

}
?>