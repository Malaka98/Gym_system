<?php

    require_once 'header.php';

    if(isset($_GET['id'])) {

        $id=$_GET['id'];
        $sql="Select * from timetable t Where t.tid=$id";
        $res=mysqli_query($connection, $sql);
        if($res){
            $row=mysqli_fetch_array($res,MYSQLI_ASSOC);

        }

    }

    if(isset($_POST['submit'])) {

        $id=$_POST['tid'];
        $day1=$_POST['day1'];
        $day2=$_POST['day2'];
        $day3=$_POST['day3'];
        $day4=$_POST['day4'];
        $day5=$_POST['day5'];
        $day6=$_POST['day6'];


        $query1="update timetable set day1='".$day1."',day2='".$day2."',day3='".$day3."',day4='".$day4."',day5='".$day5."',day6='".$day6."' where tid=".$id."";

        if(mysqli_query($connection,$query1)){

            echo "<html><head><script>alert('Routine Updated Successfully');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=viewroutine.php'>";
        }
        else{
            echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
            echo "error".mysqli_error($connection);
        }

    }

?>

<div class="container">

    <form action="edit_routing_db.php" method="post">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Routine Name</label>
            <div class="col-sm-10">
                <input type="hidden" name="tid" value="<?php echo $id?>">
                <input type="text" name="routname" class="form-control w-50" id="inputEmail3" value='<?php echo $row['tname'] ?>'>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Day 1</label>
            <textarea class="form-control w-50" name="day1" id="exampleFormControlTextarea1" rows="2"><?php echo $row['day1'] ?></textarea>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Day 2</label>
            <textarea class="form-control w-50" name="day2" id="exampleFormControlTextarea1" rows="2"><?php echo $row['day2'] ?></textarea>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Day 3</label>
            <textarea class="form-control w-50" name="day3" id="exampleFormControlTextarea1" rows="2"><?php echo $row['day3'] ?></textarea>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Day 4</label>
            <textarea class="form-control w-50" name="day4" id="exampleFormControlTextarea1" rows="2"><?php echo $row['day4'] ?></textarea>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Day 5</label>
            <textarea class="form-control w-50" name="day5" id="exampleFormControlTextarea1" rows="2"><?php echo $row['day5'] ?></textarea>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Day 6</label>
            <textarea class="form-control w-50" name="day6" id="exampleFormControlTextarea1" rows="2"><?php echo $row['day6'] ?></textarea>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>

</div>

<?php require_once 'footer.php';?>
