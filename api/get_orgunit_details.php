<?php
# Include system config file
require '../system/config.php';

session_start();
// Validate a user has logged in
// If not logged in, redirect to the log in page
if(!isset($_SESSION['login_id']))
{
    header('Location:'.$base_path.'');
}
else
{
    # API login Credentials
    $username = $access_user;
    $password = $access_password;

    //HTTP GET request -Using Curl -Response JSON
    $org_unit =$_GET['orgUnit'];

    $url = $dhis_url."/api/organisationUnits/"."$org_unit";

    // initailizing curl
    $ch = curl_init();
    //curl options
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    //execute
    $result = curl_exec($ch);

    //close connection
    curl_close($ch);


    if ($result){

        echo $result;
    }
    else{

        echo -1;
    }
}
?>
