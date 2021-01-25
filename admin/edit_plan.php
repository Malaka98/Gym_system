<?php

require_once 'header.php';

    if(isset($_GET['id'])) {

        $id=$_GET['id'];
        $sql="Select * from plan t Where t.pid=$id";
        $res=mysqli_query($connection, $sql);

        if($res){
            $row=mysqli_fetch_array($res,MYSQLI_ASSOC);

        }

    }

    if(isset($_POST['submit'])) {

        $id=$_POST['planid'];
        $pname=$_POST['planname'];
        $pdesc=$_POST['desc'];
        $pval=$_POST['planval'];
        $pamt=$_POST['amount'];


        $query1="update plan set planName='".$pname."',description='".$pdesc."',validity='".$pval."',amount='".$pamt."' where pid='".$id."'";

        if(mysqli_query($connection,$query1)){

            echo "<html><head><script>alert('PLAN Updated Successfully');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=edit_subscription_details.php'>";
        }
        else{
            echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
            echo "error".mysqli_error($connection);
        }

    }



?>

<div class="container">
    <form action="edit_plan.php" method="post">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Plan ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control w-50" name="planid" id="inputEmail3" value='<?php echo $row['pid'] ?>'>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Plane Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control w-50" name="planname" id="inputEmail3" value='<?php echo $row['planName'] ?>'>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Plan Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control w-50" name="desc" id="inputEmail3" value='<?php echo $row['description'] ?>'>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Plan Validity</label>
            <div class="col-sm-10">
                <input type="text" class="form-control w-50" name="planval" id="inputEmail3" value='<?php echo $row['validity'] ?>'>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Plan Amount</label>
            <div class="col-sm-10">
                <input type="text" class="form-control w-50" name="amount" id="inputEmail3" value='<?php echo $row['amount'] ?>'>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" name="submit" class="btn btn-primary">Create Plan</button>
            </div>
        </div>
    </form>
</div>

<?php require_once 'footer.php';?>
