<?php 
$servername="us-cdbr-iron-east-04.cleardb.net";
$username="b77cfb6e5654c6";
$password="db79ff493032d7a";
//$servername="localhost";
//$username="root";
//$password="";

$con= mysqli_connect($servername,$username,$password);
		//mysqli_select_db( $con ,"Webservice");
		mysqli_select_db( $con ,"heroku_7bf75d7fb8c2e8a");
		if($con->connect_error)
		{
			echo "database not connected";
			die("connection:failed:".$con->connect_error);
			
		}
		if(!empty($_GET['id'])){
			$some_id = $_GET['id'];
			//echo $some_id;
			//exit;
			$query = "DELETE FROM tag WHERE id = '".$_GET['id']."'";
			//echo $query;
			echo mysqli_query($con,$query);
			echo "Query Executating";
		}
		else{
			echo "Query is not executing";
			
		}


?>