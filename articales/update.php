<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';

$update = false;
$title = "";
$description ="";
if(isset($_GET['edit'])){
    $update = true;
    $id = $_GET['edit'];
    $editq = "SELECT * FROM `articales` WHERE id = $id";
    $editArr = mysqli_query($connection,$editq);
    $row= mysqli_fetch_assoc($editArr);
    $title =  $row["title"];
    $description = $row["discreption"];
    //check the auther to update the articale
    if($row['auther']!=$_SESSION['name']){
        header("location: /task2/404.php");
    }
    if(isset($_POST['update'])){
        $title =  $_POST["title"];
        $description = $_POST["description"];
        //for image
        $image_name = time() . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = "./upload/$image_name";
        move_uploaded_file($tmp_name,$location);
        $updateq = "UPDATE `articales` SET `title`='$title',`discreption`='$description'
        ,`image`='$image_name' WHERE `id`= $id";
        $updated = mysqli_query($connection,$updateq);
        header("location: /task2/articales/list.php");
    }
}
authent();
?>

<form method="post" enctype="multipart/form-data">
        <h1>PHP CRUD</h1>
        <label >Article Title</label>
        <input type="text" name="title" value="<?= $title ?>">
        <label >Article image</label>
        <input type="file" name="image" >
        <label >Article Description</label>
        <input type="text" name="description" value="<?= $description ?>">
        <button name="update" class="btn btn-info update">Update</button>
</form>


<?php include '../shared/footer.php'; ?> 