<?php
include_once('../config.php');
$branch_id= $_GET['id'];
if($status='pending'){
    $sql = $conn->query("UPDATE staffs SET status='active' WHERE branch_id='$branch_id' ");

    header("location:manage-staff.php");
}
?>