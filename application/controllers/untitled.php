<?php 
public function index()
    {
        // Reads the variables sent via POST from our gateway 
        $sessionId   = $_POST["sessionId"]; 
        $serviceCode = $_POST["serviceCode"]; 
        $phoneNumber = $_POST["phoneNumber"]; 
        $text        = $_POST["text"]; 

      $session_is_present = $this->session_model->check_if_session_exists($session_id, $phone_number);
       if ( $session_is_present ==false) { 
        $new_session = $this->session_model->new_session($sessionId, $phoneNumber);
         $response  = "CON What would you want to do \n"; 
         $response .= "1. Register \n";
         $response .= "2. Report incident";
        } elseif ($session_is_present = 1) {
          $temp =$text;
          if ( $temp ==1) { 
              $input_step = 2;
              $this->session_model->set_input_step($sessionId, $input_step);
              $response = "CON Register to rdss. Please use the format: full names, ID number, email.\n";
              $response .="Format:george oliech,2121212 georgeoliech@gmail.com";
                 
             } 
             else if($temp == 2) { 
              $response ="CON Type of report to be submitted:";
              $response .="1. Single incident report";
              $response .= "2. Weekly report";
              }
              else if ( $temp ="2*1" ) { 
               $input_step = 3;
               $this->session_model->set_input_step($sessionId, $input_step);                        
            $response = "CON Welcome. \n Report disease incident\n ";
            $response .= "MFL_CODE,DISEASE_CODE,AGE,GENDER,STATUS";
            $response .= "Format: PGH,CL,10,F,Alive";


            }elseif ($temp = "2*2") {
              $input_step = 4;
               $this->session_model->set_input_step($sessionId, $input_step);  
                $response = "CON Weekly report\n";
                $response .= "Enter facility mfl code, disease, number of incidents, deaths, date\n ";
                $response .= "Format: 21456, CHL, 30, 0, 20150305";          
            } 

        
          
        }                 
        else if($session_is_present == 2) {
                $temp = $text;
          
                $temp = explode(',', $temp);//remove commas from the sting to identify each user input
                $full_name = $temp[0];
                $id_number = $temp[1];
                $email_address =$temp[2]; 
              
             $this->session_model->save_extra_information($sessionId, $full_name, $id_number, $email_address);
             $response ="END Thank you for registering.";
          
          } 
        elseif ($session_is_present ==3) {
            $temp = $text;
            $temp = explode('*', $temp);
            $temp = $temp[1];
            $temp = explode(',', $temp);
            $mfl_code = $temp[0];
            $disease_code = $temp[1];
            $age = $temp[2];
            $sex = $temp[3];
            $status = $temp[4];

            if ($this->session_model->check_mfl_code($mfl_code)==1) {
                  if ($this->session_model->check_disease($disease_code)==1) {
                  $this->session_model->save_incident_report($sessionId, $mfl_code, $disease_code, $age, $sex, $status);
                  $response = "END incident report successfully saved. \n.";   
                  $response .= "Thank You for using RDSS";                     
                  }else{
                    $response = "END Enter a valid disease.\n";
                $response .= "System tracks cholera, Meningitis, Yellow Fever etc.";
                  }                  
              }else{
              $response = "END Please enter a valid mfl code.";
              }

        }
        elseif ($session_is_present == 4) {
          $temp = $text;
          $temp = explode('*', $temp);
          $temp = $temp[1];
          $temp = explode(',', $temp);
          $mfl_code = $temp[0];
          $disease_code = $temp[1];
          $number_of_incidents = $temp[2];
          $deaths = $temp[3];
          $date = $temp[4];
          if ($this->session_model->check_mfl_code($mfl_code)==1) {
            if ($this->session_model->check_disease($disease_code)==1) {
              $this->session_model->save_weekly_report($sessionId,$mfl_code, $disease_code, $number_of_incidents, $deaths, $date);
              $response = "END  Weekly report successfully saved\n.";    
              $response .= "Thank You for using RDSS";                   
              }else{
                $response = "END Enter a valid disease.\n";
                $response .= "System tracks cholera, Meningitis, Yellow Fever etc.";
                }                  
                }else{
                  $response = "END Please enter a valid mfl code.\n";
             }
        }





        echo $response; 
        // DONE!!! 
            }


            ?>