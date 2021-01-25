<?php
	require_once 'DBconnection.php';
	session_start();

	if(isset($_POST['submit'])){

	  	$key          = rtrim($_POST['pk']);
		$pass         = rtrim($_POST['npassword']);
		$user_id_auth = rtrim($_POST['adminid']);
		$passconfirm= rtrim($_POST['cpassword']);
		if($pass==$passconfirm){
		if (isset($user_id_auth) && isset($pass) && isset($key)) {
		    $sql    = "SELECT * FROM admin WHERE username='$user_id_auth'";
		    $result = mysqli_query($connection, $sql);
		    $count  = mysqli_num_rows($result);
		    if ($count == 1) {
		        mysqli_query($connection, "UPDATE admin SET pass_key='$pass',securekey='$key' WHERE username='$user_id_auth'");
		        echo "<html><head><script>alert('Profile Updated ,Login Again ');</script></head></html>";
		        echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
		    } else {
		        echo "<html><head><script>alert('Change Unsuccessful');</script></head></html>";
		        echo "error".mysqli_error($connection);
		        
		    }
		} else {
		    echo "<html><head><script>alert('Change Unsuccessful');</script></head></html>";
		    echo "error".mysqli_error($connection);
		 
		}
		}
		else{
		    echo "<html><head><script>alert('Confirm Password Mismatch');</script></head></html>";
		    echo "<meta http-equiv='refresh' content='0; url=change_pwd.php'>";
		}
	  
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<style type="text/css">
		* {
	box-sizing: border-box;
}
body{
	background-color: #6666ff;
}
.container{
	margin: 200px auto;
	height: 350px;
	width: 50%;
	padding: 30px;
	background-color: white;
	overflow: auto;
	box-sizing: border-box;
}
.head{
	text-align: center;
	font-family: "Times New Roman", Times, serif;
}
.heading{
	display: inline;
	text-align: center;
	font-size: 25px;
}
#text1{
	color: #66cd00;
}
#text2{
	color: #476b6b;
}
.row{
	display: grid;
	grid-template-columns: 150px auto;
	margin: 10px 0;
}

label{
	margin-top: 10px;
}
.btn{
	width: 100%;
	margin: 10px 0;
	background-color: #6666ff;
	padding: 10px 0;
	border: none;
	color: #ffffff;
	border-radius: 4px;
	cursor: pointer;
}

.error {
	color: red;
}
	</style>
</head>
<body>
	<section>
		<div class="container">
			<div class="head">
				<h1 class="heading" id="text1">Admin</h1>
				<h1 class="heading" id="text2">CHANGE PASSWORD</h1>
				<hr>
			</div> <!--head-->

			<form action="edit_password.php" method="post" name="myForm" onsubmit=" return validateForm()">
				<div class="row">
						<label>ID: </label>
						<input type="text" name="adminid" id="aid" value="<?php echo $_SESSION['admin_id']; ?>">
				</div> <!--row-->

				<div class="row">
						<label>pass key: </label>
						<input type="password" name="pk" id="cp">
				</div> <!--row-->

				<label class="error" id="cp_error"></label>

				<div class="row">
						<label>New Password: </label>
						<input type="password" name="npassword" id="npwd">
				</div> <!--row-->

				<label class="error" id="npwd_error"></label>

				<div class="row">
						<label>Confirm Password: </label>
						<input type="password" name="cpassword" id="cpwd">
				</div> <!--row-->

				<label class="error" id="cpwd_error"></label>


					<input type="submit" name="submit" class="btn" value="Submit">
			</form>
	</div> <!--container-->
	<script type="text/javascript">
		function validateForm() {

		   var cp = document.getElementById("cp");
		   var np = document.getElementById("npwd");
		   var cpwd = document.getElementById("cpwd");
		   var matchpass = true;

		   if(cp.value == "") {
		   	document.getElementById("cp_error").innerHTML = "Please required this field";		   	
		   } else {
		   	document.getElementById("cp_error").innerHTML = "";
		   }

		   if(np.value =="") {
		   	document.getElementById("npwd_error").innerHTML = "Please required this field";
		   }

		   if(cpwd.value == "") {
		   	document.getElementById("cpwd_error").innerHTML = "Please required this field";
		   	} else {
		   	document.getElementById("cpwd_error").innerHTML = "";
		   }

		   if(np.value != cpwd.value && (np.value !=="" && cpwd.value != "")) {
		   	matchpass = false;
		   	document.getElementById("npwd_error").innerHTML = "";
		   	document.getElementById("cpwd_error").innerHTML = "Password not match";
		   }


		   if((cpwd.value=="" || np.value=="" || cp.value=="" || matchpass==false) == true) {
		   	return false;
		   } else {
		   	return true;
		   }
		   
		}
	</script>
	</section>
</body>
</html>