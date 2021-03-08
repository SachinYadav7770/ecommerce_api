<?php

include('token.php');

if (!isset($status) ) {
		mysqli_query($con,"update api_token set hit_count=hit_count+1 where token = '$token'");
		$sql="select * from user ";
		if (isset($_GET['id']) && $_GET['id']>0) {
   			$id = mysqli_real_escape_string($con,$_GET['id']);
			$sql .= " where id ='$id'";
		}
				$res=mysqli_query($con,$sql);
				$count=mysqli_num_rows($res);
				if ($count>0) {
					while ($row=mysqli_fetch_assoc($res)) {
						$arr[] = $row;
					}
					$status = 'true';
					$data = $arr;
					$code = '6';
				}else{
					$status = 'true';
					$data = 'Data not found';
					$code = '5';
				}
}
echo json_encode(["status"=>$status,"data"=>$data,"code"=>$code]);

?>