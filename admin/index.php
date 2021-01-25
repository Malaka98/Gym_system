<?php require_once 'header.php'; ?>
    
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Dashboard</h3>
    </div>
    
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card-header bg-danger text-white dcard">
                <div class="row">
                    <div class="col">
                        <i class="fa fa-money fa-4x" aria-hidden="true"></i>

                    </div>
                    <h3>Paid income this month</h3>
                </div>
                <div class="row">
                    <?php
                            date_default_timezone_set("Asia/Calcutta"); 
                            $date  = date('Y-m');
                            $query = "select * from enrolls_to WHERE  paid_date LIKE '$date%'";

                            //echo $query;
                            $result  = mysqli_query($connection, $query);
                            $revenue = 0;
                            if (mysqli_affected_rows($connection) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    $query1="select * from plan where pid='".$row['pid']."'";
                                    $result1=mysqli_query($connection,$query1);
                                    if($result1){
                                        $value=mysqli_fetch_row($result1);
                                    $revenue = $value[4] + $revenue;
                                    }
                                }
                            }
                            echo "<h4>Rs ".$revenue . "</br>";
                    ?>
                </div>
            </div>
            <div class="card-footer">
                <h5><a href="income_per_month.php">More Details <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                    </a>
                </h5>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card-header bg-primary text-white dcard">
                <div class="row">
                    <div class="col">
                        <i class="fa fa-users fa-4x" aria-hidden="true"></i>

                    </div>   
                        <h3>Total member</h3>
                </div>
                <div class="row">
                        <?php
                            $query = "select COUNT(*) from users";

                            $result = mysqli_query($connection, $query);
                            //$i      = 1;
                            if (mysqli_affected_rows($connection) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo "<h4>" . $row['COUNT(*)'] . "</h4>";
                                }
                            }
                            //$i = 1;
                    ?>
                    </div>
            </div>
            <div class="card-footer">
                <h5><a href="view_member.php">More Details <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                    </a>
                </h5>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card-header bg-secondary text-white dcard">
                <div class="row">
                    <div class="col">
                        <i class="fa fa-calendar fa-4x" aria-hidden="true"></i>

                    </div>
                    <h3>Joined this month</h3>
                </div>
                <div class="row">
                    
                    <?php
                            date_default_timezone_set("Asia/Calcutta"); 
                            $date  = date('Y-m');
                            $query = "select COUNT(*) from users WHERE joining_date LIKE '$date%'";

                            //echo $query;
                            $result = mysqli_query($connection, $query);
                            //$i      = 1;
                            if (mysqli_affected_rows($connection) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo "<h4>" . $row['COUNT(*)'] . "</h4>";
                                }
                            }
                            //$i = 1;
                    ?>

                </div>
            </div>
            <div class="card-footer">
                <h5><a href="member_per_month.php">More Details <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                    </a>
                </h5>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card-header bg-info text-white dcard">
                <div class="row">
                    <div class="col">
                        <i class="fa fa-line-chart fa-4x" aria-hidden="true"></i>
                    </div>
                    <h3>Total plane available</h3>
                </div>
                <div class="row">
                    
                    <?php
                            $query = "select COUNT(*) from plan where active='yes'";

                            //echo $query;
                            $result  = mysqli_query($connection, $query);
                            //$i = 1;
                            if (mysqli_affected_rows($connection) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo "<h4>" . $row['COUNT(*)'] . "</h4>";
                                }
                            }
                            //$i = 1;
                    ?>

                </div>
            </div>
            <div class="card-footer">
                <h5><a href="edit_subscription_details.php">More Details <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                    </a>
                </h5>
            </div>
        </div>

    </div>

<?php require_once 'footer.php'; ?>
