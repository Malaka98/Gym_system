<?php
require_once 'DBconnection.php';
page_protect();

$msgid = $_POST['name'];
if (strlen($msgid) > 0) {
    mysqli_query($connection, "DELETE FROM users WHERE userid='$msgid'");
    mysqli_query($connection, "DELETE FROM health_status WHERE uid='$msgid'");
    mysqli_query($connection, "DELETE FROM address WHERE id='$msgid'");
    echo "<html><head><script>alert('Member Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=edit_members.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
   echo "error".mysqli_error($connection);
}

?>