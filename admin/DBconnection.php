<?php
$servername = "localhost";
$username   = "gymwebda_gym404";
$password   = ")jH%TdKy3ZRK";
$dbname     = "gymwebda_gym_system";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

function page_protect()
{
    session_start();

    if (!isset($_SESSION['username']) && !isset($_SESSION['logged'])) {
        session_destroy();
        header("location: login.php");
        exit();
    }

}

?>