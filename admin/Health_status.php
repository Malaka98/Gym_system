<?php require_once 'header.php'; ?>

<div class="d-sm-flex justify-content-between align-items-center mb-4">
    <h3 class="text-dark mb-0">Health Status</h3>
</div>

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th>Sl.No</th>
        <th>Membership Expiry</th>
        <th>Member ID</th>
        <th>Name</th>
        <th>Contact</th>
        <th>E-Mail</th>
        <th>Gender</th>
        <th>Joining Date</th>
        <th>Action</th></h2>
    </tr>
    </thead>
    <tbody>

    <?php
        $query  = "select * from users ORDER BY joining_date";
        //echo $query;
        $result = mysqli_query($connection, $query);
        $sno    = 1;

        if (mysqli_affected_rows($connection) != 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $uid   = $row['userid'];
                $uname;
                $udob;
                $ujoing;
                $ugender;
                $query1  = "select * from enrolls_to WHERE uid='$uid' AND renewal='yes'";
                $result1 = mysqli_query($connection, $query1);
                if (mysqli_affected_rows($connection) == 1) {
                    while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {

                        echo "<tr><td>".$sno."</td>";

                        echo "<td>" . $row['userid'] . "</td>";

                        echo "<td>" . $row['username'] . "</td>";

                        echo "<td>" . $row['mobile'] . "</td>";

                        echo "<td>" . $row['email'] . "</td>";

                        echo "<td>" . $row['gender'] . "</td>";

                        echo "<td>" . $row['dob'] . "</td>";

                        echo "<td>" . $row['joining_date'] ."</td>";

                        $uname=$row['username'];
                        $udob=$row['dob'];
                        $ujoing=$row['joining_date'];
                        $ugender=$row['gender'];

                        $sno++;

                        echo "<td><form action='edit_health_status.php' method='post'><input type='hidden' name='uid' value='" . $uid . "'/>
                                                <input type='hidden' name='uname' value='" . $uname . "'/>
                                                <input type='hidden' name='udob' value='" . $udob . "'/>
                                                
                                                <input type='hidden' name='ujoin' value='" . $ujoing . "'/>
                                                <input type='hidden' name='ugender' value='" . $ugender . "'/><input type='submit' name='submit' class='btn btn-primary' id='button1' value='Health Status'/></form></td></tr>";
                        $msgid = 0;
                    }
                }
            }
        }
    ?>

    </tbody>
</table>

<?php require_once 'footer.php';?>
