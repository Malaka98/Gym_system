<?php

    require_once 'header.php';

    if(isset($_POST['submit'])) {

        $planid =$_POST['planid'];
        $name = $_POST['planname'];
        $desc = $_POST['desc'];
        $planval = $_POST['planval'];
        $amount = $_POST['amount'];

        //Inserting data into plan table
        $query="insert into plan(pid,planName,description,validity,amount,active) values('$planid','$name','$desc','$planval','$amount','yes')";



        if(mysqli_query($connection,$query)==1){

            echo "<head><script>alert('PLAN Added ');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=edit_subscription_details.php'>";

        }

        else{
            echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
            echo "error".mysqli_error($connection);
        }

    }

?>

<div class="d-sm-flex justify-content-between align-items-center mb-4">
    <h3 class="text-dark mb-0">Add New plan</h3>
</div>

<div class="container">
    <form action="new_plan.php" method="post" onsubmit=" return validateForm()">
        <div class="form-group row">
            <label for="pid" class="col-sm-2 col-form-label">Plan ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control w-50" name="planid" id="pid" placeholder="Plan ID">
                <label style="color:red;" id="pid_error"></label>
            </div>
        </div>

        <div class="form-group row">
            <label for="pn" class="col-sm-2 col-form-label">Plane Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control w-50" name="planname" id="pn" placeholder="Plane Name">
                <label style="color:red;" id="pn_error"></label>
            </div>
        </div>

        <div class="form-group row">
            <label for="pd" class="col-sm-2 col-form-label">Plan Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control w-50" name="desc" id="pd" placeholder="Plan Description">
                <label style="color:red;" id="pd_error"></label>
            </div>
        </div>

        <div class="form-group row">
            <label for="pv" class="col-sm-2 col-form-label">Plan Validity</label>
            <div class="col-sm-10">
                <input type="text" class="form-control w-50" name="planval" id="pv" placeholder="Plan Validity">
                <label style="color:red;" id="pv_error"></label>
            </div>
        </div>

        <div class="form-group row">
            <label for="pa" class="col-sm-2 col-form-label">Plan Amount</label>
            <div class="col-sm-10">
                <input type="text" class="form-control w-50" name="amount" id="pa" placeholder="Plan Amount">
                <label style="color:red;" id="pa_error"></label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" name="submit" class="btn btn-primary">Create Plan</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
        function validateForm() {

           var plan_id      = document.getElementById("pid");
           var plan_name    = document.getElementById("pn");
           var plan_d       = document.getElementById("pd");
           var plan_v       = document.getElementById("pv");
           var plan_a       = document.getElementById("pa");


           if(plan_id.value == "") {
            document.getElementById("pid_error").innerHTML = "Please required this field";         
           } else {
            document.getElementById("pid_error").innerHTML = "";
           }

           if(plan_name.value == "") {
            document.getElementById("pn_error").innerHTML = "Please required this field";         
           } else {
            document.getElementById("pn_error").innerHTML = "";
           }

           if(plan_d.value == "") {
            document.getElementById("pd_error").innerHTML = "Please required this field";         
           } else {
            document.getElementById("pd_error").innerHTML = "";
           }

           if(plan_v.value == "") {
            document.getElementById("pv_error").innerHTML = "Please required this field";         
           } else {
            document.getElementById("pv_error").innerHTML = "";
           }

           if(plan_a.value == "") {
            document.getElementById("pa_error").innerHTML = "Please required this field";         
           } else {
            document.getElementById("pa_error").innerHTML = "";
           }


           if((plan_id.value=="" || plan_name.value=="" || plan_d.value=="" || plan_v.value=="" || plan_a.value=="") == true) {
            return false;
           } else {
            return true;
           }
           
        }
</script>
<?php require_once 'footer.php';?>
