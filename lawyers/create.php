<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
if(isset($_POST["insert"])){
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
    $insert = "INSERT INTO `lawyers` VALUES (Null,'$name',$age,'$adress',$salary,$exp,'$phone','$email','$password','$image_name',3)";
    mysqli_query($connection , $insert);
    header('location: /task2/lawyers/list.php');
}
authent();
authoriz_semi_access();
?>

    <form method="post" enctype="multipart/form-data">
        <h1>PHP CRUD</h1>
        <label >Lawyer Email</label>
        <input type="email" name="email">
        <label >Lawyer Name</label>
        <input type="text" name="name">
        <label >Lawyer image</label>
        <input type="file" name="image">
        <label >Lawyer Salary</label>
        <input type="text" name="salary">
        <label >Lawyer Age</label>
        <input type="text" name="age">
        <label >Lawyer Years of Exp</label>
        <input type="text" name="exp">
        <label >Lawyer Adress</label>
        <input type="text" name="adress">
        <label >Lawyer Phone</label>
        <input type="text" name="phone">
        <label >Lawyer password</label>
        <input type="password" name="password">
        <button name="insert" class="btn btn-success update">Add Lawyer</button>
    </form>
    
<?php include '../shared/footer.php'; ?>