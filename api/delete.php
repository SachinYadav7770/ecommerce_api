<?php

include('token.php');

if (!isset($status) ) {
	if (isset($_POST['id']) && $_POST['id']>0) {
   		$userid = mysqli_real_escape_string($con,$_POST['id']);
				$sql="select * from user where id='$userid'";
				$res=mysqli_query($con,$sql);
				$count=mysqli_num_rows($res);
				if ($count>0) {
					mysqli_query($con,"delete from user where id='$userid'");
					$status = 'true';
					$data = 'Data Deleted';
					$code = '9';
				}else{
					$status = 'true';
					$data = 'Data not found';
					$code = '8';
				}		
	}else{
		$status = 'true';
		$data = 'Provied user id for Delete';
		$code = '7';
	}			
}
echo json_encode(["status"=>$status,"data"=>$data,"code"=>$code]);

?>