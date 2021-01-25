<?php

    require_once 'header.php';

    $uid=0;
    $uname=0;
    $udob=0;
    $ujoin=0;
    $ugender=0;
    $cal="";
    $hei="";
    $wei="";
    $fa="";
    $remar="";

    if(isset($_POST['updateh'])){
        $calorie=$_POST['calorie'];
        $height=$_POST['height'];
        $weight=$_POST['weight'];
        $fat=$_POST['fat'];
        $remarks=$_POST['remarks'];
        $userid=$_POST['usrid'];

        $query="update health_status set calorie='".$calorie."', height='".$height."',weight='".$weight."',fat='".$fat."',remarks='".$remarks."' where uid='".$userid."'";

        if(mysqli_query($connection,$query)){
            echo "<head><script>alert('Health Status Added ');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=Health_status.php'>";

        }
        else{
            echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
            echo "error".mysqli_error($connection);
            echo "<meta http-equiv='refresh' content='0; url=Health_status.php'>";

        }


    }
    else{
        $uid=$_POST['uid'];
        $uname=$_POST['uname'];
        $udob=$_POST['udob'];
        $ujoin=$_POST['ujoin'];
        $ugender=$_POST['ugender'];

        $sql="select * from health_status where uid='".$uid."'";
        $result=mysqli_query($connection,$sql);
        if($result){
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $cal=$row['calorie'];
            $hei=$row['height'];
            $wei=$row['weight'];
            $fa=$row['fat'];
            $remar=$row['remarks'];
        }
    }

?>

    <div class="container">
        <form action="edit_health_status.php" method="post">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Membership ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-50" readonly name="usrid" id="inputEmail3" value=<?php echo $uid ?>>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-50" readonly id="inputEmail3" value=<?php echo $uname ?>>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Date of birth</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-50" readonly id="inputEmail3" value=<?php echo $udob ?>>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-50" readonly id="inputEmail3" value=<?php echo $ugender ?>>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Join date</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-50" readonly id="inputEmail3" value=<?php echo $ujoin ?>>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Calorie</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-50" name="calorie" id="inputEmail3" value='<?php echo $cal?>'>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Height</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-50" name="height" id="inputEmail3" value='<?php echo $hei?>' placeholder="Enter Height in cm">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Weight</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-50" name="weight" id="inputEmail3" value='<?php echo $wei?>' placeholder="Enter Weight in kg">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Fat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-50" name="fat" id="inputEmail3" value='<?php echo $fa?>'>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Remarks</label>
                <textarea class="form-control w-50" name="remarks" id="exampleFormControlTextarea1" rows="2" placeholder="Remarks not more than 200 character"></textarea>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" name="updateh" class="btn btn-primary">Create Plan</button>
                </div>
            </div>
        </form>
    </div>

<?php require_once 'footer.php';?>