<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';

if(isset($_GET['show'])){
$id = $_GET['show'];
$select_lawyerq = "SELECT lawyers.id, `name`, `age`, `adress`, `salary`, `years_exp`, `phone`, `email`, `password`, `image`, roles.description AS rolename 
    FROM `lawyers` JOIN roles on lawyers.role = roles.id WHERE lawyers.id = $id ";
$select_lawyer= mysqli_query($connection,$select_lawyerq);
$row = mysqli_fetch_assoc($select_lawyer);
}
authent();
authoriz_semi_access();
?>
<div class="card" style="width: 18rem;">
    <img src="/task2/lawyers/upload/<?= $row['image'] ?>" class="card-img-top" >
    <ul class="list-group list-group-flush">
        <li class="list-group-item">ID : <?= $row['id'] ?></li>
        <li class="list-group-item">Lawyer Name : <?= $row['name'] ?></li>
        <li class="list-group-item">Lawyer Email : <?= $row['email'] ?></li>
        <li class="list-group-item">Lawyer salary : <?= $row['salary'] ?></li>
        <li class="list-group-item">Lawyer exp : <?= $row['years_exp'] ?></li>
        <li class="list-group-item">Lawyer Adress : <?= $row['adress'] ?></li>
        <li class="list-group-item">Lawyer Phone : <?= $row['phone'] ?></li>
        <li class="list-group-item">Lawyer Age : <?= $row['age'] ?></li>
        <li class="list-group-item">Lawyer password : <?= $row['password'] ?></li>
        <li class="list-group-item">Role : <?= $row['rolename'] ?></li>
    </ul>
    <div class="card-body">
        <a href="/task2/lawyers/update.php?edit=<?= $row['id'] ?>" name="edit" class="btn btn-outline-info card-link">edit</a>
    </div>
</div>

<?php include '../shared/footer.php'; ?> 