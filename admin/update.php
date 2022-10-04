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
if(isset($_GET['edit'])){
    $update = true;
    $id = $_GET['edit'];
    $editq = "SELECT * FROM `admin` WHERE id = $id";
    $editArr = mysqli_query($connection,$editq);
    $row= mysqli_fetch_assoc($editArr);
    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $age = $row["age"];
    $adress = $row["adress"];
    $password = $row["password"];
    if(isset($_POST['update'])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $age = $_POST["age"];
        $adress = $_POST["adress"];
        $password = $_POST["password"];
        //for image
        $image_name = time() . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = "./upload/$image_name";
        move_uploaded_file($tmp_name,$location);
        $updateq = "UPDATE `admin` SET `name`='$name',`age`='$age',`adress`='$adress',`phone`='$phone',`email`='$email',`password`='$password'
        ,`image`='$image_name' WHERE `id`= $id";
        $updated = mysqli_query($connection,$updateq);
        header("location: /task2/admin/list.php");
    }
}
authent();
authoriz_all_access();


?>

<form method="post" enctype="multipart/form-data">
        <h1>PHP CRUD</h1>
        <label >Admin Email</label>
        <input type="email" name="email" value="<?= $email ?>">
        <label >Admin Name</label>
        <input type="text" name="name" value="<?= $name ?>">
        <label >Admin Role</label>
        <select name="role" >
            <?php foreach($roles AS $data) : ?>
                <option value="<?= $data['id'] ?>"><?= $data['description'] ?></option>
            <?php endforeach; ?>
        </select>
        <label >Admin image</label>
        <input type="file" name="image" >
        <label >Admin Age</label>
        <input type="text" name="age" value="<?= $age ?>">
        <label >Admin Adress</label>
        <input type="text" name="adress" value="<?= $adress ?>">
        <label >Admin Phone</label>
        <input type="text" name="phone" value="<?= $phone ?>">
        <label >Admin password</label>
        <input type="password" name="password" value="<?= $password ?>">
        <button name="update" class="btn btn-info update">Update</button>
</form>


<?php include '../shared/footer.php'; ?> 