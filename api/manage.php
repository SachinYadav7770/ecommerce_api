<?php

include('token.php');

if (!isset($status) ) {
	if (isset($_POST['first_name']) && isset($_POST['last_name'])) {
   		$first_name = mysqli_real_escape_string($con,$_POST['first_name']);
   		$last_name = mysqli_real_escape_string($con,$_POST['last_name']);
   		$age = mysqli_real_escape_string($con,$_POST['age']);
   		$mobile = mysqli_real_escape_string($con,$_POST['mobile']);
   		$action = mysqli_real_escape_string($con,$_POST['action']);
			if (isset($_GET['id']) && $_GET['id']>0) {
   				$id = mysqli_real_escape_string($con,$_GET['id']);
				$sql="update user set first_name='$first_name',last_name='$last_name',age='$age',mobile='$mobile',action='$action' where id='$id'";
				$res=mysqli_query($con,$sql);
				if ($res===true){
					$status = 'true';
					$data = 'Data updated';
					$code = '14';
				}else{
					$status = 'true';
					$data = 'Data not Updated';
					$code = '13';
				}

			}else{
				$sql="insert into user(first_name,last_name,age,mobile,action) values('$first_name','$last_name','$age','$mobile','$action')";
				$res=mysqli_query($con,$sql);
				if ($res===true){
					$status = 'true';
					$data = 'Data Inserted';
					$code = '12';
				}else{
					$status = 'true';
					$data = 'Data not Inserted';
					$code = '11';
				}
			}		
	}else{
		$status = 'true';
		$data = 'Provied user First name and Last name';
		$code = '10';
	}			
}
echo json_encode(["status"=>$status,"data"=>$data,"code"=>$code]);

?>