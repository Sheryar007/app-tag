<?php 
$servername = "us-cdbr-iron-east-04.cleardb.net";
$user_name = "b77cfb6e5654c6";
$password="db79ff493032d7a";


$con= mysqli_connect($servername,$user_name,$password);
		mysqli_select_db( $con ,"heroku_7bf75d7fb8c2e8a");
		if($con->connect_error)
		{
			die("connection:failed:".$con->connect_error);
		}
		$result = mysqli_query($con,"SELECT * FROM tag");
	
		$response = array();
		
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		
		//echo "<pre>"; print_r($response);  
		echo json_encode($response);
		
?>