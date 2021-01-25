<?php

    require_once 'header.php';

    if(isset($_POST['submit'])) {

        $rname=$_POST["rname"];
        $day1=$_POST["day1"];
        $day2=$_POST["day2"];
        $day3=$_POST["day3"];
        $day4=$_POST["day4"];
        $day5=$_POST["day5"];
        $day6=$_POST["day6"];



        $sql="insert into timetable(tname,day1,day2,day3,day4,day5,day6) values('$rname','$day1','$day2','$day3','$day4','$day5','$day6')";

        $result=mysqli_query($connection,$sql);
        if($result){

            echo "<head><script>alert('Routine Added');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=detail_rout.php'>";
        }else{
            echo "<head><script>alert('Routine Added Failed');</script></head></html>";
            echo mysqli_error($connection);
        }

    }

?>

<div class="d-sm-flex justify-content-between align-items-center mb-4">
    <h3 class="text-dark mb-0">Add routing</h3>
</div>

    <div class="container">

        <form action="add_routine.php" method="post" onsubmit=" return validateForm()">
            <div class="form-group row">
                <label for="rn" class="col-sm-2 col-form-label">Routine Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-50" name="rname" id="rn" placeholder="Plan ID">
                </div>
            </div>
            <label style="color:red;" id="rname_error"></label>

            <div class="form-group row">
                <label for="day1" class="col-sm-2 col-form-label">Day 1</label>
                <textarea class="form-control w-50" name="day1" id="day1" rows="2" placeholder="Day 1"></textarea>
            </div>
            <label style="color:red;" id="day1_error"></label>

            <div class="form-group row">
                <label for="day2" class="col-sm-2 col-form-label">Day 2</label>
                <textarea class="form-control w-50" name="day2" id="day2" rows="2" placeholder="Day 2"></textarea>
            </div>
            <label style="color:red;" id="day2_error"></label>

            <div class="form-group row">
                <label for="day3" class="col-sm-2 col-form-label">Day 3</label>
                <textarea class="form-control w-50" name="day3" id="day3" rows="2" placeholder="Day 3"></textarea>
            </div>
            <label style="color:red;" id="day3_error"></label>

            <div class="form-group row">
                <label for="day4" class="col-sm-2 col-form-label">Day 4</label>
                <textarea class="form-control w-50" name="day4" id="day4" rows="2" placeholder="Day 4"></textarea>
            </div>
            <label style="color:red;" id="day4_error"></label>

            <div class="form-group row">
                <label for="day5" class="col-sm-2 col-form-label">Day 5</label>
                <textarea class="form-control w-50" name="day5" id="day5" rows="2" placeholder="Day 5"></textarea>
            </div>
            <label style="color:red;" id="day5_error"></label>

            <div class="form-group row">
                <label for="day6" class="col-sm-2 col-form-label">Day 6</label>
                <textarea class="form-control w-50" name="day6" id="day6" rows="2" placeholder="Day 6"></textarea>
            </div>
            <label style="color:red;" id="day6_error"></label>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Create Plan</button>
                </div>
            </div>
        </form>

    </div>
    <script type="text/javascript">
        function validateForm() {

           var rname = document.getElementById("rn");
           var day1 = document.getElementById("day1");
           var day2 = document.getElementById("day2");
           var day3 = document.getElementById("day3");
           var day4 = document.getElementById("day4");
           var day5 = document.getElementById("day5");
           var day6 = document.getElementById("day6");


           if(rname.value == "") {
            document.getElementById("rname_error").innerHTML = "Please required this field";         
           } else {
            document.getElementById("rname_error").innerHTML = "";
           }

           if(day1.value == "") {
            document.getElementById("day1_error").innerHTML = "Please required this field";         
           } else {
            document.getElementById("day1_error").innerHTML = "";
           }

           if(day2.value == "") {
            document.getElementById("day2_error").innerHTML = "Please required this field";         
           } else {
            document.getElementById("day2_error").innerHTML = "";
           }

           if(day3.value == "") {
            document.getElementById("day3_error").innerHTML = "Please required this field";         
           } else {
            document.getElementById("day3_error").innerHTML = "";
           }

           if(day4.value == "") {
            document.getElementById("day4_error").innerHTML = "Please required this field";         
           } else {
            document.getElementById("day4_error").innerHTML = "";
           }

           if(day5.value == "") {
            document.getElementById("day5_error").innerHTML = "Please required this field";         
           } else {
            document.getElementById("day5_error").innerHTML = "";
           }

           if(day6.value == "") {
            document.getElementById("day6_error").innerHTML = "Please required this field";         
           } else {
            document.getElementById("day6_error").innerHTML = "";
           }

           

           if((rname.value=="" || day1.value=="" || day2.value=="" || day3.value=="" || day4.value=="" || day5.value=="" || day6.value=="" ) == true) {
            return false;
           } else {
            return true;
           }
           
        }
    </script>
<?php require_once 'footer.php';?>
