<?php
include './general/env.php';
include './general/functions.php';
include './shared/header.php';
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email_adminq="SELECT * FROM `admin` WHERE `email` = '$email' and `password` = '$password'";
    $email_admin = mysqli_query($connection , $email_adminq);
    $admin_exist = mysqli_num_rows($email_admin);
    $data_admin = mysqli_fetch_assoc($email_admin);
    $email_lawyerq="SELECT * FROM `lawyers` WHERE `email` = '$email'  and `password` = '$password'";
    $email_lawyer = mysqli_query($connection , $email_lawyerq);
    $lawyer_exist = mysqli_num_rows($email_lawyer);
    $data_lawyer = mysqli_fetch_assoc($email_lawyer);
    if($admin_exist==1 ){
        $_SESSION['id'] = $data_admin['id'];
        $_SESSION['role'] = $data_admin['role'];
        $_SESSION['name'] = $data_admin['name'];
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header('location: /task2/index.php');
    }
    elseif($lawyer_exist==1){
        $_SESSION['id'] = $data_lawyer['id'];
        $_SESSION['role'] = $data_lawyer['role'];
        $_SESSION['name'] = $data_lawyer['name'];
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header('location: /task2/index.php');
    }
    else{
        echo '<p class="alert alert-danger" role="alert" >email or password is invalid</p>';
    }
}
not_authent();
?>

<form method="POST" class="loginform">
    <h1>Login</h1>
    <label>Email</label>
    <input type="email" name="email">
    <label>Password</label>
    <input type="password" name="password">
    <button class="btn btn-primary update" name="login"> Login</button>
</form>



<?php include './shared/footer.php'; ?>