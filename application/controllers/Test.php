<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller
{
	public function index(){
		$this->load->model("session_model");
		$value = $this->session_model->check_disease('CHL');
		echo($value);
        
        }


}
?>
<!-- check_mfl_code($mfl_code){
 check_disease($disease_code){ -->



