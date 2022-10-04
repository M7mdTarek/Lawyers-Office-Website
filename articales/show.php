<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';

if(isset($_GET['show'])){
$id = $_GET['show'];
$select_adminq = "SELECT * FROM `articales` WHERE id = $id;";
$select_admin= mysqli_query($connection,$select_adminq);
$row = mysqli_fetch_assoc($select_admin);
}
authent();
?>
<div class="card" style="width: 18rem;">
    <img src="/task2/articales/upload/<?= $row['image'] ?>" class="card-img-top" >
    <ul class="list-group list-group-flush">
        <li class="list-group-item">ID : <?= $row['id'] ?></li>
        <li class="list-group-item">Article Title : <?= $row['title'] ?></li>
        <li class="list-group-item">Article Auther : <?= $row['auther'] ?></li>
        <li class="list-group-item">Article Created_time : <?= $row['create_time'] ?></li>
        <li class="list-group-item">Article Updated_time : <?= $row['update_time'] ?></li>
        <li class="list-group-item">Article Describtion : <?= $row['discreption'] ?></li>
    </ul>
    <div class="card-body">
        <a href="/task2/articales/update.php?edit=<?= $row['id'] ?>" name="edit" class="btn btn-outline-info card-link">edit</a>
    </div>
</div>

<?php include '../shared/footer.php'; ?> 