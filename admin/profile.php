<?php
	require_once 'DBconnection.php';
	session_start();

	if(isset($_POST['submit'])){

	  $aid=$_POST['admin_id'];
	  $fulname=$_POST['full_name'];

	  $query="UPDATE admin SET username='".$aid."',Full_name='".$fulname."' where username='".$_SESSION['admin_id']."'";

	  if(mysqli_query($connection, $query)){
	  	echo "<head><script>alert('Profile Change ');</script></head></html>";

	     echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
	  }
	  else{
	  	echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
		 echo "error".mysqli_error($connection);
	  }

	  
	}

	if(isset($_POST['changep'])) {

		header('Location: edit_password.php');

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
	width: 40%;
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
				<h1 class="heading" id="text2">CHANGE PROFILE</h1>
				<hr>
			</div> <!--head-->

			<form action="profile.php" method="post" name="myForm" onsubmit=" return validateForm()">
				<div class="row">
						<label>ID: </label>
						<input type="text" name="admin_id" id="fName" value="<?php echo $_SESSION['admin_id']; ?>">
				</div> <!--row-->

				<label class="error" id="name_error"></label>

				<div class="row">
						<label>Full Name: </label>
						<input type="text" name="full_name" id="add" value="<?php echo $_SESSION['admin_name']; ?>">
				</div> <!--row-->

				<label class="error" id="add_error"></label>

				<div class="row">
						<input type="submit" name="changep" class="btn" value="Change password">
				</div> <!--row-->

					<input type="submit" name="submit" class="btn" value="Submit">
			</form>
	</div> <!--container-->
	<script type="text/javascript">
		function validateForm() {

		   var fName = document.getElementById("fName");
		   var add = document.getElementById("add");

		   if(fName.value == "") {
		   	document.getElementById("name_error").innerHTML = "Please required this field";		   	
		   } else {
		   	document.getElementById("name_error").innerHTML = "";
		   }

		   if(add.value == "") {
		   	document.getElementById("add_error").innerHTML = "Please required this field";
		   	
		   } else {
		   	document.getElementById("add_error").innerHTML = "";
		   }


		   if((fName.value=="" || add.value=="") == true) {
		   	return false;
		   } else {
		   	return true;
		   }
		   
		}
	</script>
	</section>
</body>
</html>