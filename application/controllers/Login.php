<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
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
        $this->load->model('user_model');
        $this->load->model('facility_model');

    }

    public function index()
    {
        $this->load->view('login');
    }

    function __encrip_password($password)
    {
        return md5($password);
    }

    /**
     * check the username and the password with the database
     * @return void
     */
    function validate()
    {
        
        $email = $this->input->post('email');
        $password = $this->__encrip_password($this->input->post('password'));
        $is_valid = $this->user_model->validate($email, $password);


        if ($is_valid) {
            $role = $is_valid[0]['role'];
            $user_id = $is_valid[0]['user_id'];
            $names = $is_valid[0]['names'];
            $phone_number = $is_valid[0]['phone_number'];
            $national_id = $is_valid[0]['national_id'];
            $facility_id = $is_valid[0]['facility_id'];

            $data = $this->facility_model->get_county_id_given_facility_id($facility_id);
        foreach ($data as $key) {
            $county_id = $key->cid;
        }
             
            $data = array(
                'email' => $email,
                'user_id' => $user_id,
                'is_logged_in' => true,
                'role' => $role,
                'names' => $names,
                'phone_number'=> $phone_number,
                'national_id'=> $national_id,
                'facility_id'=>$facility_id,
                'county_id'=>$county_id
            );

            $this->session->set_userdata($data);
            redirect(base_url());

         
        } else // incorrect username or password
        {
            // redirect('login');
     
            $data['error_message'] = TRUE;
            $this->load->view('login', $data);
            /*$this->load->view('login');*/
        }
        }



    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */