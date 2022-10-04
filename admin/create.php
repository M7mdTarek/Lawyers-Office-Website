<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
authent();
authoriz_all_access();
$q_roles = "SELECT * FROM `roles`";
$roles = mysqli_query($connection , $q_roles);
if(isset($_POST["insert"])){
    $name = $_POST["name"];
    $role = $_POST["role"];
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
    $insert = "INSERT INTO `admin` VALUES (Null,'$name',$age,'$adress','$phone','$email','$password','$image_name','$role')";
    mysqli_query($connection , $insert);
    header('location: /task2/admin/list.php');
}

?>

    <form method="post" enctype="multipart/form-data">
        <h1>PHP CRUD</h1>
        <label >Admin Email</label>
        <input type="email" name="email">
        <label >Admin Name</label>
        <input type="text" name="name">
        <label >Admin Role</label>
        <select name="role" >
            <?php foreach($roles AS $data) : ?>
                <option value="<?= $data['id'] ?>"><?= $data['description'] ?></option>
            <?php endforeach; ?>
        </select>
        <label >Admin image</label>
        <input type="file" name="image">
        <label >Admin Age</label>
        <input type="text" name="age">
        <label >Admin Adress</label>
        <input type="text" name="adress">
        <label >Admin Phone</label>
        <input type="text" name="phone">
        <label >Admin password</label>
        <input type="password" name="password">
        <button name="insert" class="btn btn-success update">Add Admin</button>
    </form>
    
<?php include '../shared/footer.php'; ?>