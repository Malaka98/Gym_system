<?php

    require_once 'header.php';

    if(isset($_POST['delete'])) {

        $msgid = $_POST['delete'];
        if (strlen($msgid) > 0) {
            mysqli_query($connection, "DELETE FROM timetable WHERE tid='$msgid'");
            echo "<html><head><script>alert('Routine Deleted');</script></head></html>";
        } else {
            echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
            echo "error".mysqli_error($connection);
        }

    }

?>

<div class="d-sm-flex justify-content-between align-items-center mb-4">
    <h3 class="text-dark mb-0">Edit routing</h3>
</div>

        <table class="table">
            <thead class="thead-dark">

            <tr>
                <th>Sl.No</th>
                <th>Routine Name</th>
                <th>Routine Details</th>
                <th>Delete Routine</th>
            </tr>
            </thead>

            <tbody>

            <?php


            $query  = "select * from timetable";
            //echo $query;
            $result = mysqli_query($connection, $query);
            $sno    = 1;

            if (mysqli_affected_rows($connection) != 0)
            {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {




                    echo "<tr><td>".$sno."</td>";
                    echo "<td>" . $row['tname'] . "</td>";


                    $sno++;

                    echo '<td><a href="edit_routing_db.php?id='.$row['tid'].'"><input type="button" class="btn btn-primary" id="boxxe" value="Edit Routine" ></a></td>';
                    // echo '<td><a href="deleteroutine.php?id='.$row['tid'].'"><input type="button" class="a1-btn a1-blue" value="Delete Routine" ></a></td></tr>';
                    echo "<td><form action='edit_routing.php' method='post' onsubmit='return ConfirmDelete()'><input type='hidden' name='delete' value='" . $row['tid'] . "'/><input type='submit' value='Delete' width='20px' id='boxxe' class='btn btn-danger'/></form></td></tr>";

                    $uid = 0;


                }
            }

            ?>
            </tbody>
        </table>

<?php require_once 'footer.php'?>
