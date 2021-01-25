<?php require_once 'header.php'; ?>

    <h3>Member History</h3>

    Details of : - <?php
    $id     = $_POST['name'];
    $query  = "select * from users WHERE userid='$id'";
    //echo $query;
    $result = mysqli_query($connection, $query);

    if (mysqli_affected_rows($connection) != 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $name = $row['username'];
            $memid=$row['userid'];
            $gender=$row['gender'];
            $mobile=$row['mobile'];
            $email=$row['email'];
            $joinon=$row['joining_date'];
            echo $name;
        }
    }
?>

    <hr />
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Membership ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Join On</th>
            </tr>
            </thead>
            <tbody>

            <?php
            echo "<tr><td>" . $memid . "</td>";

            echo "<td>" . $name . "</td>";

            echo "<td>" . $gender . "</td>";

            echo "<td>" . $mobile . "</td>";

            echo "<td>" . $email . "</td>";

            echo "<td>" . $joinon . "</td></tr>";
            ?>

            </tbody>
        </table>
    </div>

    <hr>

    <h3>Payment history of : - <?php echo $name;?></h3>

    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Sl.No</th>
                <th>Plan Name</th>
                <th>Plan Desc</th>
                <th>Validity</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Expire Date</th>
            </tr>
            </thead>
            <tbody>

            <?php

            $query1  = "select * from enrolls_to WHERE uid='$memid'";
            //echo $query;
            $result = mysqli_query($connection, $query1);
            $sno    = 1;

            if (mysqli_affected_rows($connection) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $pid=$row['pid'];
                    $query2="select * from plan where pid='$pid'";
                    $result2=mysqli_query($connection,$query2);
                    if($result2){
                        $row1=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                        echo "<tr>";
                        echo "<td>" . $sno . "</td>";

                        echo "<td>" . $row1['planName'] . "</td>";

                        echo "<td width='380'>" . $row1['description'] . "</td>";

                        echo "<td>" . $row1['validity'] . "</td>";

                        echo "<td>" . $row1['amount'] . "</td>";

                        echo "<td>" . $row['paid_date'] . "</td>";

                        echo "<td>" . $row['expire'] . "</td>";
                        echo "</tr>";
                        $sno++;
                    }
                }

            }

            ?>

            </tbody>
        </table>
    </div>

<?php require_once 'footer.php'; ?>