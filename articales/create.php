<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
if(isset($_POST["insert"])){
    $title = $_POST["title"];
    $auther = $_SESSION['name'];
    $describtion = $_POST["describtion"];
    //for image
    $image_name = time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/$image_name";
    move_uploaded_file($tmp_name,$location);
    $insert = "INSERT INTO `articales` VALUES (NULL , '$title','$describtion','$auther','$image_name', DEFAULT, DEFAULT)";
    mysqli_query($connection , $insert);
    header('location: /task2/articales/list.php');
}
authent();
?>
<form method="post" enctype="multipart/form-data">
    <h1>PHP CRUD</h1>
    <label >Article Title</label>
    <input type="text" name="title">
    <label >Article image</label>
    <input type="file" name="image">
    <label >Article Auther</label>
    <input type="text" name="auther" value="<?= $_SESSION['name'] ?>"  readonly>
    <label >Article describtion</label>
    <textarea name="describtion"  rows="10"></textarea>
    <button name="insert" class="btn btn-success update">Add Article</button>
</form>
<?php include '../shared/footer.php'; ?>