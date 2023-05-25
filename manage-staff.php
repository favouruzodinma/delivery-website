
<?php

include 'config.php'; 
// session_start();
if(isset($_GET['id'])){
//  echo $_GET['id'].' Status:'.$GET['status'];
$branch_id = $_GET['id'];

if($_GET['status']=='delete'){
    // delete user account
    $sql=$conn->query("DELETE FROM staffs WHERE branch_id='$branch_id'");
    if($sql){
        $_SESSION['mgs'] = "Account deleted successfully!";
    }

}else{
    // verify branch_ account
    $sql=$conn->query("UPDATE staffs SET status='verify' WHERE branch_id='$branch_id'");
    if($sql){
        $_SESSION['mgs'] = "Account has been verified!";
    }
}

header("Location: staff-table.php");
}
?>
<?php 

function getUserById($id, $db){
    $sql = "SELECT * FROM staffs WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->execute([$id]);
    
    if($stmt->rowCount() == 1){
        $user = $stmt->fetch();
        return $user;
    }else {
        return 0;
    }
}

 ?>
