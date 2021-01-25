<?php require_once 'header.php'; ?>

    <table class="table">
        <thead class="thead-dark">

        <tr>
            <th>Sl.No</th>
            <th>Routine Name</th>
            <th>Routine Details</th>
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

                echo '<td><a href="viewdetailroutine.php?id='.$row['tid'].'"><input type="button" class="btn btn-primary" value="View Details" ></a></td></tr>';

                $uid = 0;


            }
        }

        ?>
        </tbody>
    </table>

<?php require_once 'footer.php'; ?>
