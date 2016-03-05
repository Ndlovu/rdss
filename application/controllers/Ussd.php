
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ussd extends CI_Controller
{
    public function index()
    {
        $session_id = $this->input->post('sessionId');
        $service_code =$serviceCode = $_POST["serviceCode"];
        $phone_number = $this->input->post('phoneNumber');
        $text = $this->input->post('text');

       
        $this->load->model('session_model');
        $session_is_present = $this->session_model->check_if_session_exists($session_id, $phone_number);

            if ($session_is_present == false) //new session
            {
                $this->session_model->new_session($session_id, $phone_number);
                $response = "CON Please select your option \n";
                $response = "1. Register \n";
                $response = "2. Submit alert \n";

            } 
            else
            {//session exists
                if ($session_is_present->input_step == 1) //get the selected option
                {               
                    /*$text = strtolower($text);*/
                    $text = trim($text);
                    $text = str_replace(" ", null, $text);
                  
                    if ($text==1) {
                    $response = "CON Enter your name,national ID,e-mail.  format: Dennis Ongati,21212121,kevinwafula@gmail.com. ";
                    }
                    else if ($text==2){
                        $response = "CON Enter your mfl-code,disease-code,age, sex, status. Format: PGH, CHL, 10, M, Alive. ";
                    }


                } elseif ($session_is_present->input_step == 2) {


                    $is_entry_valid = is_entry_valid(trim($temp = explode("*", $text)[1]));
                    if ($is_entry_valid == false) //entries are not valid
                    {
                        $response = "END Invalid entry. Please use the format: full names, ID number, email. eg. 'kevin wafula,21212121,kevinwafula@gmail.com'";

                    } else {
                        $temp = $text;
                        $temp = explode("*", $temp);
                        $temp = $temp[1];
                        $temp = explode(",", $temp);
                        $full_name = $temp[0];
                        $id_number = $temp[1];
                        $email_address = $temp[2];
                        $this->session_model->save_extra_information($session_id, $full_name, $id_number, $email_address); //save id number, names and email address

                        $client = 1;//post_client($session_id);

                        if ($client == false) //error in client creation
                        {
                            $response = "END An error occurred in saving your details, please contact user support.";

                        } else //client creation successful
                        {



                            $order = 1;//post_order($session_id, $client);

                            if ($order == false) //error in placing order
                            {
                                $response = "END An error occurred in placing your order, please contact user support.";

                            } else {

                                $response = "END Successful. Alert ID: " . $this->session_model->get_domain_name($session_id) . ". the cost of the domain name is " . $this->session_model->get_domain_price($session_id) . "";

                            }
                        }
                    }
                }
            }

    }


}