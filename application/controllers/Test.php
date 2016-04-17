<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller
{
	public function index(){
		$this->load->model("session_model");
        $mfl_code ="10742";
        $this->session_model->check_mfl_code($mfl_code);

        }


}
?>



