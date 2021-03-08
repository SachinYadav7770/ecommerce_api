<?php
	$first_name = '';
   	$last_name = '';
   	$age = '';
   	$mobile = '';
   	$action = '';
   	$extra='';
   	$msg='';
   	if (isset($_GET['id']) && $_GET['id']>0) {
	$extra='?id='.$_GET['id'];
	}
if (isset($_POST['Submit'])) {
   	$id='';
	if (isset($_GET['id']) && $_GET['id']>0) {
	$id='&id='.$_GET['id'];
	}
	$url="http://localhost/api/manage.php?token=dnanjkbakvb1213".$id;
	$ch=curl_init();
	$arr['first_name'] = $_POST['first_name'];
	$arr['last_name'] = $_POST['last_name'];
	$arr['age'] = $_POST['age'];
	$arr['mobile'] = $_POST['mobile'];
	$arr['action'] = $_POST['action'];
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
	$result=curl_exec($ch);
	curl_close($ch);
	$result = json_decode($result,true);
	if (isset($result['status']) && isset($result['code']) && ($result['code']==12 || $result['code']==14)) {
		$msg = $result['data'];
	}else{
		$msg = $result['data'];
	}
}

if (isset($_GET['id']) && $_GET['id']>0) {
	$url="http://localhost/api/index.php?token=dnanjkbakvb1213&id=".$_GET['id'];
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result=curl_exec($ch);
	curl_close($ch);
	$result = json_decode($result,true);
	if (isset($result['status']) && isset($result['code']) && $result['code']==6) {
		$first_name = $result['data']['0']['first_name'];
   		$last_name = $result['data']['0']['last_name'];
   		$age = $result['data']['0']['age'];
   		$mobile = $result['data']['0']['mobile'];
   		$action = $result['data']['0']['action'];

	}else{
		header('location:tryflxed.php');
		die();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		input[type=text], select {
		  width: 100%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
		}

		input[type=submit] {
		  width: 100%;
		  background-color: #4CAF50;
		  color: white;
		  padding: 14px 20px;
		  margin: 8px 0;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		}

		input[type=submit]:hover {
		  background-color: #45a049;
		}

		div {
		  border-radius: 5px;
		  background-color: #f2f2f2;
		  padding: 20px;
		}
		@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
		body{
		  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
		  background: linear-gradient(to right, #25c481, #25b7c4);
		  font-family: 'Roboto', sans-serif; 
    	  padding-top: 1%;
		}
		.padding {
    		padding: 6px;
		}
		input,select:focus { 
	    outline: none !important;
	    border-color: #719ECE;
	    box-shadow: 0 0 10px #719ECE;
		}
</style>
</head>
<body>
    <p style="text-align:left;">
		<span style="font-size: 24px;">Using CSS to style an HTML Form</span>
    <span style="float:right;padding-right: 16ex;">
    	<button style="font-size: 18px;" class="btn btn-primary" onclick="window.location.href = 'tryflxed.php';">&crarr; Back <i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
    </span>
    </p>


<div class="container">
	<?php
	if (!empty($msg)) {
		?>
		<div class="alert alert-success" role="alert" id="msg">
			<?php echo $msg; ?>
		</div>
		<?php
	} ?>
	
  <form method="post" action="form.php<?php echo $extra;?>" id="form">
  	<input type="hidden" name="error" value="" id="error_input">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="first_name" value="<?php echo $first_name;?>" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="last_name" value="<?php echo $last_name; ?>" placeholder="Your last name..">

<div class="col-xs-6  padding">
    <label for="age">Age</label>
    <input type="text" id="age" name="age" value="<?php echo $age; ?>" placeholder="Your age..">
</div>
<div class="col-xs-6  padding">
    <label for="action">Action</label>
    <select id="action" name="action">
      <option value="0" <?php if($action==0){ echo "selected";} ?>>Off</option>
      <option value="1" <?php if($action==1){ echo "selected";} ?>>On</option>
    </select>
</div>
<div class="col-xs-12  padding">
    <label for="mobile">Mobile No.</label>
    <input type="text" id="mobile" name="mobile" value="<?php echo $mobile; ?>" placeholder="Your Mobile no..">
</div>
    <input type="submit" value="Submit" name="Submit" onclick="return err($('#error_input').val());" />
  </form>
</div>
<script type="text/javascript">
	function err(error){
        	console.log(error);
        	if(error==='true'){
	        	return false;
        	}else{
        		return true;
        	}
        }
        
	setTimeout(function() {
	    $('#msg').fadeOut('fast');
	}, 3000);

$(function(){
    $("input[type=text]").keyup(function(e){
        var This_id = $(this).attr("id");
        var error;
        if(This_id=='age'){
        var This_val = $(this).val();
	        if (This_val == parseInt(This_val)){
	        	if(This_val>150){
        		error = 'true';
		        $("#"+This_id).css("border", "1px solid red");
		        $('#error_input').val(error);
		       	}else{
        		error = 'false';
		        $("#"+This_id).css("border", "1px solid green");
		        $('#error_input').val(error);
		       	}
	        }else{
        	error = 'true';
	        $("#"+This_id).css("border", "1px solid red");
	        $('#error_input').val(error);
        	}
        }

        if(This_id=='mobile'){
        var This_val = $(this).val();
        var count =This_val.toString().length;
        var letters = /^[0-9+]+$/;
        var isValid = letters.test(This_val);
		   	if(isValid){
		   		if(count>12){
        		error = 'true';
		        $("#"+This_id).css("border", "1px solid red");
		        $('#error_input').val(error);
		       	}else{
        		error = 'false';
		        $("#"+This_id).css("border", "1px solid green");
		        $('#error_input').val(error);
		       	}
		    }else{
        		error = 'true';
		        $("#"+This_id).css("border", "1px solid red");
		        $('#error_input').val(error);
		    }
        }
    });
});

</script>
</body>
</html>