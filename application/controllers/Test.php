<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller
{
	public function index(){
		$this->load->model("alert_model");
		$value = $this->alert_model->show_weekly_reports();
		print_r($value);
		
        
        }


}
?>
<!-- check_mfl_code($mfl_code){
 check_disease($disease_code){ -->



