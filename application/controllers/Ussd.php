<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Ussd
 */
class Ussd extends CI_Controller
{
    public function index()
    {
        $session_id = $this->input->post('sessionId');
        $phone_number = $this->input->post('phoneNumber');
        $text = $this->input->post('text');

        //loads the model whic will be used to manioulate data stored in the database
       $this->load->model('session_model');

         $session_is_present = $this->session_model->check_if_session_exists($session_id, $phone_number);

            if ($session_is_present == false) //new session
            {
                $this->session_model->new_session($session_id, $phone_number);
                $response = "CON Register to rdss. Please use the format: full names, ID number, email.\n"; 
                $response .= "Format:kevin wafula,21212121,kevinwafula@gmail.com";

                } else{ //session exists

                if ($session_is_present->input_step == 1) //get name, email and national ID
                {
                    $temp = $text;
                    $temp = explode("*", $temp);
                    $temp = $temp[1];
                    $temp = explode(",", $temp);
                    $full_name = $temp[0];
                    $id_number = $temp[1];
                    $email_address = $temp[2];
                     if (is_numeric($full_name)||is_string($id_number)) {
                       $response = "END The name or ID is Invalid: $text is not valid. Please try again.";
                    }
                    else //user credentials are valid
                    {
                        $this->session_model->save_extra_information($session_id, $full_name, $id_number, $email_address);
                         $response = "CON Registration successful: Welcome $full_name.\n";
                         $response .= "report disease incident\n";
                        $response .= "MFL_CODE,DISEASE_CODE,AGE,GENDER,STATUS\n";
                         $response .="Format: PGH,CL,10,F,Alive";
                     }
                } elseif ($session_is_present->input_step == 2) {


                    $is_entry_valid = is_entry_valid(trim($temp = explode("*", $text)[1]));
                    if ($is_entry_valid == false) //user entries are not valid
                    {
                        $response =  "END Invalid entry. Please enter MFL_CODE,disease_code,age,gender,status\n";
                         $response .= "format: PGH,CL,10,F,Alive";

                    } else {
                        $temp = $text;
                        $temp = explode("*", $temp);
                        $temp = $temp[1];
                        $temp = explode(",", $temp);
                        $mfl_code = $temp[0];
                        $disease_code = $temp[1];
                        $age = $temp[2];
                        $sex = $temp[3];
                        $status = $temp[4];
                        $this->session_model->save_incident_report($session_id, $mfl_code, $disease_code,
                        $age, $sex, $status); //save disease incident

                    $response =  "END Thanks you for using the system.\n"
                    $response .= "'Enhance surveillance efforts with rdss'";

                    }
                }
            }

        // Print the response onto the page so that our gateway can read it
        header('Content-type: text/plain');
        echo $response;

        // DONE!!!
        //END OF FILE



    }


}