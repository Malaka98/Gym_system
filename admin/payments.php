<?php require_once 'header.php'?>

    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Payments</h3>
    </div>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Sl.No</th>
                <th>Membership Expiry</th>
                <th>Name</th>
                <th>Member ID</th>
                <th>Phone</th>
                <th>E-Mail</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $query  = "select * from enrolls_to where renewal='yes' ORDER BY expire";
            //echo $query;
            $result = mysqli_query($connection, $query);
            $sno    = 1;

            if (mysqli_affected_rows($connection) != 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $uid   = $row['uid'];
            $planid=$row['pid'];
            $query1  = "select * from users WHERE userid='$uid'";
            $result1 = mysqli_query($connection, $query1);
            if (mysqli_affected_rows($connection) == 1) {
            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {

            echo "<tr><td>".$sno."</td>";
                echo "<td>" . $row['expire'] . "</td>";
                echo "<td>" . $row1['username'] . "</td>";
                echo "<td>" . $row1['userid'] . "</td>";
                echo "<td>" . $row1['mobile'] . "</td>";
                echo "<td>" . $row1['email'] . "</td>";
                echo "<td>" . $row1['gender'] . "</td>";

                $sno++;

                echo "<td><form action='make_payment.php' method='post'><input type='hidden' name='userID' value='" . $uid . "'/>
                        <input type='hidden' name='planID' value='" . $planid . "'/><input type='submit' class='btn btn-primary' value='Add Payment ' class='btn btn-info'/></form></td></tr>";

                            $uid = 0;
                        }
                    }
                }
            }

            ?>

            </tbody>
        </table>

<?php require_once 'footer.php'?>
