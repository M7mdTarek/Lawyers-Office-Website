<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
$q_roles = "SELECT * FROM `roles`";
$roles = mysqli_query($connection , $q_roles);
$update = false;
$name = "";
$email ="";
$phone = "";
$age = "";
$adress = "";
$password = "";
$salary = "";
$exp = "";
if(isset($_GET['edit'])){
    $update = true;
    $id = $_GET['edit'];
    $editq = "SELECT * FROM `lawyers` WHERE id = $id";
    $editArr = mysqli_query($connection,$editq);
    $row= mysqli_fetch_assoc($editArr);
    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $age = $row["age"];
    $adress = $row["adress"];
    $password = $row["password"];
    $salary = $row["salary"];
    $exp = $row["years_exp"];
    if(isset($_POST['update'])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $age = $_POST["age"];
        $adress = $_POST["adress"];
        $password = $_POST["password"];
        $salary = $_POST["salary"];
        $exp = $_POST["exp"];
        //for image
        $image_name = time() . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = "./upload/$image_name";
        move_uploaded_file($tmp_name,$location);
        $updateq = "UPDATE `lawyers` SET `name`='$name',`age`=$age,`adress`='$adress',`salary`=$salary,`years_exp`=$exp
        ,`phone`='$phone',`email`='$email',`password`='$password',`image`='$image_name' WHERE `id`= $id ;";
        $updated = mysqli_query($connection,$updateq);
        header("location: /task2/lawyers/list.php");
    }
}
authent();
authoriz_semi_access();
?>

<form method="post" enctype="multipart/form-data">
        <h1>PHP CRUD</h1>
        <label >Lawyer Email</label>
        <input type="email" name="email" value="<?= $email ?>">
        <label >Lawyer Name</label>
        <input type="text" name="name" value="<?= $name ?>">
        <label >Lawyer Role</label>
        <select name="role" >
            <?php foreach($roles AS $data) : ?>
                <option value="<?= $data['id'] ?>"><?= $data['description'] ?></option>
            <?php endforeach; ?>
        </select>
        <label >Lawyer image</label>
        <input type="file" name="image" >
        <label >Lawyer Salary</label>
        <input type="text" name="salary" value="<?= $salary ?>">
        <label >Lawyer Years of Exp</label>
        <input type="text" name="exp" value="<?= $exp ?>">
        <label >Lawyer Age</label>
        <input type="text" name="age" value="<?= $age ?>">
        <label >Lawyer Adress</label>
        <input type="text" name="adress" value="<?= $adress ?>">
        <label >Lawyer Phone</label>
        <input type="text" name="phone" value="<?= $phone ?>">
        <label >Lawyer password</label>
        <input type="password" name="password" value="<?= $password ?>">
        <button name="update" class="btn btn-info update">Update</button>
</form>


<?php include '../shared/footer.php'; ?> 