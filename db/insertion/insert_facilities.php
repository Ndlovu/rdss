<?php
	// Require system config file
    require '../system/config.php';

    session_start();
    // Validate a user has logged in
    // If not logged in, redirect to the log in page
    if(!isset($_SESSION['login_id']))
    {
        header('Location:../../');
    }
    else
    {
        // If user has logged in
		
		# Database connection parameters
	    $servername = $server;
	    $username = $user;
	    $authentication = $password;
	    $dbname = $database;

	    # Create connection
	    $conn = new mysqli($servername, $username, $authentication, $dbname);

	    # Check connection
	    if ($conn->connect_error) 
	    {
	        die("Connection failed: " . $conn->connect_error);
	    }

		//Check if the facility exists
		$exists = "SELECT * FROM facilities WHERE facility_id = '$id'";
		$result = mysqli_query($conn,$exists);
		if(mysqli_num_rows($result)>0)
		{
			// Check if the name has changed
			while($row = mysqli_fetch_assoc($result))
			{
				if($row['facility_name'] == $name)
				{
					echo 1;
				}
				else
				{
					// Update county name
					$update_name = "UPDATE facilities SET facility_name = '$name' WHERE
					facility_id = '$id'";
					if(mysqli_query($conn,$update_name))
					{
						echo 10;
					}
				}

			}
		}

		else
		{
			$sql = "INSERT INTO facilities (facility_id, facility_name, parent_id, mfl_code)
			VALUES ('$id','$name',$parent_id,$mfl_code)";

			if (mysqli_query($conn, $sql)) 
			{
			    echo 0;
			} 
			else 
			{
			    echo -1;
			}

		}

		mysqli_close($conn);
	}
?> 