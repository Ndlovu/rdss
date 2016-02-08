<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

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
	public function index()
	{
		$this->load->view('register');
	}


    /**
     * encript the password
     * @return mixed
     */
    function __encrip_password($password) {
        return md5($password);
    }
    /**
     * check the username and the password with the database
     * @return void
     */

    public function create_user()
    {
        $names=$this->input->post('names');
        $phone_number=$this->input->post('phone_number');
        $national_id=$this->input->post('national_id');
        $password=$this->input->post('password');
        $email=$this->input->post('email');
        $role=0;
        $this->load->model('user_model');

        if($this->user_model->new_user($names,$phone_number,$national_id,$password,$email,$role))
        {
            $data['flash_message']=TRUE;
            redirect(base_url());
        
        }
    }

    function validate()
    {
        $this->load->model('user_model');
        $user_name = $this->input->post('user_name');
        $password = $this->__encrip_password($this->input->post('password'));
        $is_valid = $this->user_model->validate($user_name, $password);

        if($is_valid)
        {
            $role=$is_valid[0]['role'];
            $user_id=$is_valid[0]['user_id'];
            $names=$is_valid[0]['name'];
           
            $data = array(
                'user_name' => $user_name,
                'user_id' => $user_id,
                'is_logged_in' => true,
                'role' => $role,
                'names'=>$names
            );
            $this->session->set_userdata($data);
            if($role==0)
            {
                redirect(base_url());
            }
            else
            {
                show_404();
            }
            //redirect('admin/products');
        }
        else // incorrect username or password
        {
            $data['message_error'] = TRUE;
            $this->load->view('login', $data);
        }
    }



}

/* End of file Register.php */
/* Location: ./application/controllers/welcome.php */