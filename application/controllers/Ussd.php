
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ussd extends CI_Controller
{
    public function index()
    {
        $session_id = $this->input->post('sessionId');
        $phone_number = $this->input->post('phoneNumber');
        $text = $this->input->post('text');

       
        $this->load->model('session_model');

        if (1==5) {

            $response = "END You reached your daily limit please try again after 24 hrs.";
        } else //limit not exceeded
        {
            $session_is_present = $this->session_model->check_if_session_exists($session_id, $phone_number);

            if ($session_is_present == false) //new session
            {
                $this->session_model->new_session($session_id, $phone_number);
                $response = "CON Please select your option \n";
                $response = "1. Register \n";
                $response = "2. Submit alert";

            } else //session exists
            {

                if ($session_is_present->input_step == 1) //get the selected option
                {               
                    /*$text = strtolower($text);*/
                    $text = trim($text);
                    $text = str_replace(" ", null, $text);
                  
                    if ($text==1) {
                    $response = "CON Please enter your name,national ID,e-mail";
                    }
                    else{
                        //enter alternative texts here
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

                                $response = "END Your order has been successfully placed for the domain: " . $this->session_model->get_domain_name($session_id) . ". the cost of the domain name is " . $this->session_model->get_domain_price($session_id) . "";

                            }
                        }
                    }
                }
            }

        }



    }


}




/*    <?php
    // Reads the variables sent via POST from our gateway
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text        = $_POST["text"];
    if ( $text == "" ) {
         // This is the first request. Note how we start the response with CON
         $response  = "CON What would you want to check \n";
         $response .= "1. My Account \n";
         $response .= "2. My phone number";
    }
    else if ( $text == "1" ) {
      // Business logic for first level response
      $response = "CON Choose account information you want to view \n";
      $response .= "1. Account number \n";
      $response .= "2. Account balance";
      
     }
     else if($text == "2") {
      // Business logic for first level response
      $phoneNumber  = "+254711XXXYYY";
      // This is a terminal request. Note how we start the response with END
      $response = "END Your phone number is $phoneNumber";
     }
     else if($text == "1*1") {
      // This is a second level response where the user selected 1 in the first instance
      $accountNumber  = "ACC1001";
      // This is a terminal request. Note how we start the response with END
      $response = "END Your account number is $accountNumber";
     }
        
     else if ( $text == "1*2" ) {
      
         // This is a second level response where the user selected 1 in the first instance
         $balance  = "KES 1,000";
         // This is a terminal request. Note how we start the response with END
         $response = "END Your balance is $balance";
    }
    // Print the response onto the page so that our gateway can read it
    header('Content-type: text/plain');
    echo $response;
    // DONE!!!
    ?>*/