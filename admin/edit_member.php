<?php require_once 'header.php';?>

<?php 

	if(isset($_POST['name'])) {
		$memid = $_POST['name'];
	

		$query  = "SELECT * FROM users u 
		INNER JOIN address a ON u.userid=a.id
		INNER JOIN  health_status h ON u.userid=h.uid
		WHERE userid='$memid'";
			//echo $query;
			$result = mysqli_query($connection, $query);
				    
			$name="";
			$gender="";

			if (mysqli_affected_rows($connection) == 1) {
				   while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				    
				       $name    = $row['username'];
				       $gender =$row['gender'];
				       $mobile = $row['mobile'];
				       $email   = $row['email'];
				       $dob	 = $row['dob'];         
				       $jdate    = $row['joining_date'];
				       $streetname=$row['streetName'];
				       $state=$row['state'];
				       $city=$row['city'];  
				       $zipcode=$row['zipcode'];
				       $calorie=$row['calorie'];
				       $height=$row['height'];
				       $weight=$row['weight'];
				       $fat=$row['fat'];
				       $remarks=$row['remarks'];				            
				   }
			}
			else{
				 echo "<html><head><script>alert('Change Unsuccessful');</script></head></html>";
				 echo mysqli_error($connection);
			}
		}

		if(isset($_POST['update_submit'])) {

		   $uid=$_POST['uid'];
		   $uname=$_POST['uname'];
		   $gender=$_POST['gender'];
		   $mobile=$_POST['phone'];
		   $email=$_POST['email'];
		   $dob=$_POST['dob'];
		   $jdate=$_POST['jdate'];
		   $stname=$_POST['sname'];
		   $state=$_POST['state'];
		   $city=$_POST['city'];
		   $zipcode=$_POST['zipcode'];
		   $calorie=$_POST['calorie'];
		   $height=$_POST['height'];
		   $weight=$_POST['weight'];
		   $fat=$_POST['fat'];
		   $remarks=$_POST['remarks'];
		    
		    $query1="update users set username='".$uname."',gender='".$gender."',mobile='".$mobile."',email='".$email."',dob='".$dob."',joining_date='".$jdate."' where userid='".$uid."'";

		   if(mysqli_query($connection,$query1)){
		     $query2="update address set streetName='".$stname."',state='".$state."',city='".$city."',zipcode='".$zipcode."' where id='".$uid."'";
		     if(mysqli_query($connection,$query2)){
		        $query3="update health_status set calorie='".$calorie."',height='".$height."',weight='".$weight."',fat='".$fat."',remarks='".$remarks."' where uid='".$uid."'";
		        if(mysqli_query($connection,$query3)){
		            echo "<html><head><script>alert('Member Update Successfully');</script></head></html>";
		            echo "<meta http-equiv='refresh' content='0; url=edit_members.php'>";
		        }else{
		             echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
		             echo "error".mysqli_error($connection);
		        }
		     }else{
		        echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
		         echo "error".mysqli_error($connection);
		     }
		   }else{
		    echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
		    echo "error".mysqli_error($connection);
		   }

		}
 ?>

	<div class="container">
		<form action="edit_member.php" method="POST">
		  <div class="form-group row">
		    <label for="uid" class="col-sm-2 col-form-label">User ID:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="uid" name="uid" value='<?php echo $memid; ?>' >
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="name" class="col-sm-2 col-form-label">NAME:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="name" name="uname" value='<?php echo $name?>'>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="mobile" class="col-sm-2 col-form-label">MOBILE:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="mobile" name="phone" value=<?php echo $mobile?> >
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="email" class="col-sm-2 col-form-label">EMAIL:</label>
		    <div class="col-sm-6">
		      <input type="email" class="form-control" id="email" name="email" value=<?php echo $email?> >
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="dob" class="col-sm-2 col-form-label">DATE OF BIRTH:</label>
		    <div class="col-sm-6">
		      <input type="date" class="form-control" id="dob" name="dob" value=<?php echo $dob?> >
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="jd" class="col-sm-2 col-form-label">JOINING DATE:</label>
		    <div class="col-sm-6">
		      <input type="date" class="form-control" id="jd" name="jdate" value=<?php echo $jdate?>>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="sname" class="col-sm-2 col-form-label">STREET NAME:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="sname" name="sname" value='<?php echo $streetname?>'>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="state" class="col-sm-2 col-form-label">STATE:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="state" name="state" value='<?php echo $state?>'>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="city" class="col-sm-2 col-form-label">CITY:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="city" name="city" value='<?php echo $city?>'>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="zip" class="col-sm-2 col-form-label">ZIPCODE:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="zip" name="zipcode" value='<?php echo $zipcode?>'>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="cal" class="col-sm-2 col-form-label">CALORIE:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="cal" name="calorie" value=<?php echo $calorie?> >
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="height" class="col-sm-2 col-form-label">HEIGHT:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="height" name="height" value=<?php echo $height?> >
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="weight" class="col-sm-2 col-form-label">WEIGHT:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="weight" name="weight" value=<?php echo $weight?>>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="fat" class="col-sm-2 col-form-label">FAT:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="fat" name="fat" value=<?php echo $fat?>>
		    </div>
		  </div>

		  <fieldset class="form-group">
		    <div class="row">
		      <legend class="col-form-label col-sm-2 pt-0">GENDER:</legend>
		      <div class="col-sm-10">
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" <?php if($gender == 'Male'){echo("checked");}?>>
		          <label class="form-check-label" for="gridRadios1">
		            Male
		          </label>
		        </div>
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" <?php if($gender == 'Female'){echo("checked");}?>>
		          <label class="form-check-label" for="gridRadios2">
		            Female
		          </label>
		        </div>
		        
		      </div>
		    </div>
		  </fieldset>

		  <div class="form-group row">
		    <label for="remark" class="col-sm-2 col-form-label">REMARKS:</label>
		    <div class="col-sm-6">
		      <textarea class="form-control" id="remark" name="remarks" rows="3"><?php echo $remarks?></textarea>
		    </div>
		  </div>
		 
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button type="submit" name="update_submit" class="btn btn-primary">Update</button>
		    </div>
		  </div>
		</form>

	</div>

<?php require_once 'footer.php'; ?>