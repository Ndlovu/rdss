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

		// Url to get the organisation units from the API
		$url = $href;

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
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
		//execute
		$response = curl_exec($ch);

		//close connection
		curl_close($ch);


		if ($response)
		{
			$details = json_decode($response,true);

			# Details of Organisation Units
			$id= $details['id'];
			$name = str_replace("'", "",$details['name']);
			$parent_id = $details['parent']['id'];
			$mfl_code = $details['code'];

			// Facilities level
			if($details["level"] == $level)
			{
				# Require the facilities insert script
				require '../db/insertion/insert_facilities.php';
			}

			// Sub-Counties Level
			else if($details["level"] == $level)
			{
				# Require the sub-counties insert script
				require '../db/insertion/insert_sub_counties.php';
			}

			// County Level
			else if($details["level"] == $level)
			{
				# Require the counties insert script
				require '../db/insertion/insert_counties.php';
			}
		}
		else
		{
		    echo -1;
		}
	}
?>
