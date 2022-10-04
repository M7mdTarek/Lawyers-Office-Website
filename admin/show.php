<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';

if(isset($_GET['show'])){
$id = $_GET['show'];
$select_adminq = "SELECT admin.id,name,age,adress,phone,email,`password`,image,roles.description AS rolename FROM `admin` 
    JOIN `roles` ON roles.id = admin.role where admin.id=$id ";
$select_admin= mysqli_query($connection,$select_adminq);
$row = mysqli_fetch_assoc($select_admin);
}
authent();
authoriz_all_access();
?>
<div class="card" style="width: 18rem;">
    <img src="/task2/admin/upload/<?= $row['image'] ?>" class="card-img-top" >
    <ul class="list-group list-group-flush">
        <li class="list-group-item">ID : <?= $row['id'] ?></li>
        <li class="list-group-item">Admin Name : <?= $row['name'] ?></li>
        <li class="list-group-item">Admin Email : <?= $row['email'] ?></li>
        <li class="list-group-item">Admin Adress : <?= $row['adress'] ?></li>
        <li class="list-group-item">Admin Phone : <?= $row['phone'] ?></li>
        <li class="list-group-item">Admin Age : <?= $row['age'] ?></li>
        <li class="list-group-item">Admin password : <?= $row['password'] ?></li>
        <li class="list-group-item">Role : <?= $row['rolename'] ?></li>
    </ul>
    <div class="card-body">
        <a href="/task2/admin/update.php?edit=<?= $row['id'] ?>" name="edit" class="btn btn-outline-info card-link">edit</a>
    </div>
</div>

<?php include '../shared/footer.php'; ?> 