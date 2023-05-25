<?php
include 'config.php';
$qry = $conn->query("SELECT * FROM staffs where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'staff-table.php';
?>