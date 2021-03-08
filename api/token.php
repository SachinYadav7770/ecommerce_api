<?php 
include('db.php');
header('Content-Type: application/json');
if (isset($_GET['token'])) {
	$token=mysqli_real_escape_string($con,$_GET['token']);
	$check_token=mysqli_query($con,"select * from api_token where token = '$token'");
	if(mysqli_num_rows($check_token)>0){
		$api_token = mysqli_fetch_assoc($check_token);
		if($api_token['status']==1){
			if($api_token['hit_count']>=$api_token['hit_limit']){
				$status = 'true';
				$data = 'API token hit limits exceeded';
				$code = '4';
			}
		}else{
			$status = 'true';
			$data = 'API token is deactivated';
			$code = '3';
		}
	}else{
		$status = 'true';
		$data = 'API token is not valid';
		$code = '2';
	}
}else{
	$status = 'true';
	$data = 'Please provide API token';
	$code = '1';
}
?>