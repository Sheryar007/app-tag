<?php 
$servername="us-cdbr-iron-east-04.cleardb.net";
$username="b77cfb6e5654c6";
$password="db79ff493032d7a";
//$servername="localhost";
//$username="root";
//$password="";

if(isset($_POST["tgname"]) && isset($_POST["tgloc"])&& isset($_POST["encoded_string"]))
{
	
	
	$encoded_string = $_POST["encoded_string"];
	$image_name = $_POST["image_name"];
	$name = $_POST["tgname"];
	$loc = $_POST["tgloc"];
	$decoded_string = base64_decode($encoded_string);
	$path = 'images/'.$image_name;
	$file = fopen($path, 'wb');

	$is_written = fwrite($file,$decoded_string);
	fclose($file);

	$con= mysqli_connect($servername,$username,$password);
	mysqli_select_db( $con ,"heroku_7bf75d7fb8c2e8a");
//	mysqli_select_db( $con ,"Webservice");
	if($con->connect_error)
	{
		die("connection:failed:".$con->connect_error);
	}
	$query = "INSERT INTO tag(tgname, tgloc,name,path) VALUES
								(
								'".$name."',
								'".$loc."',
								'".$image_name."',
								'".$path."')";
								
	$var = mysqli_query($con, $query);
								
	
	if($var)
	{		
			$var1 = mysqli_query($con, "SELECT * FROM tag ORDER by id DESC LIMIT 1");
			$arr = array();
			$row = mysqli_fetch_array($var1);
			$arr[] = $row;
			// echo"<pre>";
			echo json_encode($arr[0]);
			// print_r($arr);
			//exit;
			
	}
	else{
		echo "ERROR";
	}


}
else{
	echo "PARAMETERS MISSING";
}
?>