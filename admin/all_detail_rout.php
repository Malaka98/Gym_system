<?php

    require_once 'header.php';

    $id=$_GET['id'];
    $sql="Select * from timetable t Where t.tid=$id";
    $res=mysqli_query($connection, $sql);
    if($res){
        $row=mysqli_fetch_array($res,MYSQLI_ASSOC);

    }

?>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col" colspan="2" class="text-center h4">Routine Name: <?php echo $row['tname'] ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="font-weight-bold h5 col-2 text-center text-dark">Day 1</th>
                <td class="text-center"><?php echo $row['day1'] ?></td>
            </tr>
            <tr>
                <th class="font-weight-bold h5 col-2 text-center text-dark">Day 2</th>
                <td class="text-center"><?php echo $row['day2'] ?></td>
            </tr>
            <tr>
                <th class="font-weight-bold h5 col-2 text-center text-dark">Day 3</th>
                <td class="text-center"><?php echo $row['day3'] ?></td>
            </tr>
            <tr>
                <th class="font-weight-bold h5 col-2 text-center text-dark">Day 4</th>
                <td class="text-center"><?php echo $row['day4'] ?></td>
            </tr>
            <tr>
                <th class="font-weight-bold h5 col-2 text-center text-dark">Day 5</th>
                <td class="text-center"><?php echo $row['day5'] ?></td>
            </tr>
            <tr>
                <th class="font-weight-bold h5 col-2 text-center text-dark">Day 6</th>
                <td class="text-center"><?php echo $row['day6'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>

<?php require_once 'footer.php'?>
