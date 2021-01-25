<?php
    require_once 'DBconnection.php';
    page_protect();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>GYM 404 - Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <style>
        .dcard{
            width: 250px;
            height: 190px;
            overflow: auto;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-2"><span>Gym 404</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="registration.php"><i class="fa fa-user-plus"></i><span>New Registration</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="payments.php"><i class="fa fa-credit-card-alt"></i><span>Payments</span></a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users"></i><span>Members</span></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="edit_members.php">Edit Members</a>
                            <a class="dropdown-item" href="view_member.php">View Members</a>
                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link active" href="Health_status.php"><i class="fa fa-heartbeat"></i><span>Health Status</span></a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-puzzle-piece"></i><span>Plan</span></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="new_plan.php">New Plane</a>
                            <a class="dropdown-item" href="edit_subscription_details.php">Edit Subscription Details</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list-alt"></i><span>Overview</span></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="member_per_month.php">Members per Month</a>
                            <a class="dropdown-item" href="year_per_month.php">Members per Year</a>
                            <a class="dropdown-item" href="income_per_month.php">Income per Month</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-child"></i><span>Exercise Routine</span></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="add_routine.php">Add Routine</a>
                            <a class="dropdown-item" href="edit_routing.php">Edit Routine</a>
                            <a class="dropdown-item" href="detail_rout.php">View Routine</a>
                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link active" href="profile.php"><i class="fa fa-folder-open"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>

                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>

            </div>
            </nav>
            <div class="container-fluid">