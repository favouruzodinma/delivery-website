<?php
include 'config.php';
     if (isset($_POST['login'])){
      $email = cleaninput($_POST['email']);
  
      $password = md5(cleaninput($_POST['password']));
     
     $sql= $conn->query("SELECT * FROM staffs WHERE  email= '$email' AND password = '$password'");

     if($sql->num_rows>0){
        $row = $sql->fetch_assoc ();
        $_SESSION['email'] = $row['email'];
        $_SESSION['branch_id'] = $row['branch_id'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['success']=true;
        header('location:dashboard.php');
    }else{
      $_SESSION['mgs'] = '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Invalid Email or Password submitted!!</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    header('Location:login.php');          
     }
    }
?>