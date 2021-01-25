<?php
    require_once 'DBconnection.php';
$pid=$_GET['q'];
$query="select * from plan where pid='".$pid."'";
$res=mysqli_query($connection,$query);
if($res){
    $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
    
    echo "
		<div class='form-group row'>
            <label for='inputEmail3' class='col-sm-2 col-form-label'>Amount</label>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' name='prevPlan' readonly id='boxx' value='Rs ".$row['amount']."' id='inputEmail3'>
                </div>
        </div>
		<div class='form-group row'>
            <label for='inputEmail3' class='col-sm-2 col-form-label'>Price</label>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' name='prevPlan' readonly id='boxx' value='".$row['validity']." Month' id='inputEmail3'>
                </div>
        </div>
		
	";
}

?>