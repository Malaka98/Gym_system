<?php

    require_once 'header.php';

    if (isset($_POST['userID']) && isset($_POST['planID'])) {
        $uid = $_POST['userID'];
        $planid = $_POST['planID'];
        $query1 = "select * from users WHERE userid='$uid'";

        $result1 = mysqli_query($connection, $query1);

        if (mysqli_affected_rows($connection) == 1) {
            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {

                $name = $row1['username'];
                $query2 = "select * from plan where pid='$planid'";

                $result2 = mysqli_query($connection, $query2);
                if ($result2) {
                    $planValue = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                    $planName = $planValue['planName'];
                }
            }
        }

?>

        <form id="form1" name="form1" method="post" action="subimt_payment.php">

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">MEMBERSHIP ID:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="m_id" id="boxx" value="<?php echo $uid; ?>" id="inputEmail3">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">NAME:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="u_name" id="boxx" value="<?php echo $name; ?>" id="inputEmail3">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">CURRENT PLAN</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="prevPlan" id="boxx" value="<?php echo $planName; ?>" id="inputEmail3">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <select class="custom-select mr-sm-2 w-25" name="plan" id="boxx"  required onchange="myplandetail(this.value)">
                        <option value="">Please select</option>
                        <?php

                        $query = "select * from plan where active='yes'";

                        //echo $query;
                        $result = mysqli_query($connection, $query);

                        if (mysqli_affected_rows($connection) != 0) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                echo "<option value=" . $row['pid'] . ">" . $row['planName'] . "</option>";

                            }
                        }

                        ?>
                    </select>
                </div>
            </div>

            <div id="plandetls"></div>

            <div class="row">
                <div class="col-10"></div>
                <button class="btn btn-primary btn-block text-white btn-user col-2" type="submit" name="submit">Add Payment</button>
            </div>

        </form>
<?php } ?>


        <script>
            function myplandetail(str){

                if(str==""){
                    document.getElementById("plandetls").innerHTML = "";
                    return;
                }else{
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("plandetls").innerHTML=this.responseText;

                        }
                    };

                    xmlhttp.open("GET","plane_detail.php?q="+str,true);
                    xmlhttp.send();
                }

            }
        </script>

<?php require_once 'footer.php'; ?>
