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

    function __construct()
    {
        parent::__construct();

           $this->load->model('facility_model');
            $this->load->model('user_model');
  
   }

	public function index()
	{
        $data['facilities'] = $this->facility_model->show_facilities();
		$this->load->view('register', $data);
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


    /*userName, password, confirm, names, national_id, email, phone_number, address*/
    public function create_user()
    {
        $user_name = $this->input->get('userName');
        $names= $this->input->get('name'); 
        $phone_number=$this->input->get('phone_number');
        $national_id=$this->input->get('national_id');
        $password= md5($this->input->get('password'));
        // $address = $this->input->get('address');
        $email=$this->input->get('email');
        $facility_name = $this->input->get("facility_name");
        $facility_id = $this->facility_model->get_facility_id_given_name($facility_name);
        $user_id = uniqid();


       
        if ($this->user_model->new_user($names,$phone_number,$national_id,$password,$email,$user_id, $user_name, $facility_id)) {
  /*         $message = "successful registration";
           echo "$message";
           $this->validate();
*/           // redirect(base_url());
            redirect(base_url()."index.php/login");


        }else{
            $data['message'] = "Email already registered";
          $this->load->view('test2', $data);

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
            $facility_id = $is_valid[0]['facility_id'];
           
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