<?php 

$url="http://localhost/api/index.php?token=dnanjkbakvb1213";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);
$result = json_decode($result,true);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title></title>
	<style type="text/css">
		h1{
		  font-size: 30px;
		  color: #fff;
		  text-transform: uppercase;
		  font-weight: 300;
		  text-align: center;
		  margin-bottom: 15px;
		}
		table{
		  width:100%;
		  table-layout: fixed;
		}
		.tbl-header{
		  background-color: rgba(255,255,255,0.3);
		 }
		.tbl-content{
		  height:420px;
		  overflow-x:auto;
		  margin-top: 0px;
		  border: 1px solid rgba(255,255,255,0.3);
		}
		th{
		  padding: 20px 15px;
		  text-align: left;
		  font-weight: 500;
		  font-size: 12px;
		  color: #fff;
		  text-transform: uppercase;
		}
		td{
		  padding: 15px;
		  text-align: left;
		  vertical-align:middle;
		  font-weight: 300;
		  font-size: 12px;
		  color: #fff;
		  border-bottom: solid 1px rgba(255,255,255,0.1);
		}


		/* demo styles */

		@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
		body{
		  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
		  background: linear-gradient(to right, #25c481, #25b7c4);
		  font-family: 'Roboto', sans-serif;
		}
		section{
		  margin: 50px;
		}


		/* follow me template */
		.made-with-love {
		  margin-top: 40px;
		  padding: 10px;
		  clear: left;
		  text-align: center;
		  font-size: 10px;
		  font-family: arial;
		  color: #fff;
		}
		.made-with-love i {
		  font-style: normal;
		  color: #F50057;
		  font-size: 14px;
		  position: relative;
		  top: 2px;
		}
		.made-with-love a {
		  color: #fff;
		  text-decoration: none;
		}
		.made-with-love a:hover {
		  text-decoration: underline;
		}


		/* for custom scrollbar for webkit browser*/

		::-webkit-scrollbar {
		    width: 6px;
		} 
		::-webkit-scrollbar-track {
		    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
		} 
		::-webkit-scrollbar-thumb {
		    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
		}
		input{
		    background-repeat: repeat-x;
		    border: 0px solid;
		    height: 30px;
		    width: 165px;
		    font-size: 12px;
		}
		.modal-body {
	    background-color: aquamarine;
		}
		.model-table td{
			color: #171616;
		}
</style>
</head>
<body>

	<section>
  <!--for demo wrap-->
    <h1>Fixed Table header</h1>
    <span></span>
    <p style="text-align:left;">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search in table.." title="Type in a name">
    <span style="float:right;">
    	<button class="btn btn-primary" onclick="window.location.href = 'form.php';">ADD <i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
    </span>
    </p>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>S.no</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Mobile</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0" id="myTable">
      <tbody>
      	<?php

		if (isset($result['status']) && isset($result['code']) && $result['code']==6) {
			$i=1;
		   foreach ($result['data'] as $list) {

		     echo "<tr>";
		     echo "<td>".$i."</td>";
		     echo "<td>".$list['first_name']."</td>";
		     echo "<td>".$list['last_name']."</td>";
		     echo "<td>".$list['mobile']."</td>";
		     echo "<td>

<button class='btn btn-warning' onclick=\"window.location.href = 'form.php?id=".$list['id']."';\" >Edit <i class='fa fa-edit'></i></button>
<button class='btn btn-danger' onclick=\"if (confirm('Are you sure ! to Delete this data')) {window.location.href = 'delete.php?id=".$list['id']."';}\" >Delete <i class='fa fa-trash'></i></button></td>";
		     echo "</tr>";
		     $i++;
		   } }
		   else{
		     echo "<tr>";
		     echo "<td>".$result['data']."</td>";
		     echo "<tr>";
		   }
		   ?>
    
      </tbody>
    </table>
  </div>
</section>
</body>
	<script type="text/javascript">
	  function myFunction() {
	    var input = document.getElementById("myInput");
	    var filter = input.value.toUpperCase();
	    var table = document.getElementById("myTable");
	    var tr = table.getElementsByTagName("tr");
	    for (var i = 0; i < tr.length; i++) {
	        if (tr[i].textContent.toUpperCase().indexOf(filter) > -1) {
	            tr[i].style.display = "";
	        } else {
	            tr[i].style.display = "none";
	        }      
	    }
	}
	</script>
</html>