<?php

    require_once 'header.php';

    if(isset($_POST['delete'])) {

        $msgid = $_POST['name'];
        if (strlen($msgid) > 0) {
            mysqli_query($connection, "update plan set active ='no' WHERE pid='$msgid'");
            echo "<html><head><script>alert('Member Deleted');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=edit_subscription_details.php'>";
        } else {
            echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
            echo "error".mysqli_error($connection);
        }

    }

?>

<div class="d-sm-flex justify-content-between align-items-center mb-4">
    <h3 class="text-dark mb-0">Manage Plan</h3>
</div>

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th>S.No</th>
        <th>Plan ID</th>
        <th>Plan name</th>
        <th>Plan Details</th>
        <th>Months</th>
        <th>Rate</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <?php

        $query  = "select * from plan where active='yes' ORDER BY amount DESC";
        //echo $query;
        $result = mysqli_query($connection, $query);
        $sno    = 1;

        if (mysqli_affected_rows($connection) != 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $msgid = $row['pid'];


                echo "<tr><td>" . $sno . "</td>";
                echo "<td>" . $row['pid'] . "</td>";
                echo "<td>" . $row['planName'] . "</td>";
                echo "<td width='380'>" . $row['description'] . "</td>";
                echo "<td>" . $row['validity'] . "</td>";
                echo "<td>Rs " . $row['amount'] . "</td>";

                $sno++;

                echo '<td><a href=edit_plan.php?id="'.$row['pid'].'"><input type="button" class="btn btn-primary m-1" id="boxxe" value="Edit Plan" ></a><form action="edit_subscription_details.php" method="post"><input type="hidden" name="name" value="' . $msgid .'"/><input type="submit" name="delete" id="button1" value="Delete Plan" class="btn btn-primary m-1"/></form></td></tr>';

                $msgid = 0;
            }

        }

    ?>

    </tbody>
</table>

<?php require_once 'footer.php'; ?>
