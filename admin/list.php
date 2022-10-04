<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../admin/remove.php';
$select_adminq = "SELECT admin.id,name,age,adress,phone,email,`password`,image,roles.description AS rolename FROM `admin` 
    JOIN `roles` ON roles.id = admin.role;";
$select_admin= mysqli_query($connection , $select_adminq);
authent();
authoriz_semi_access();
?>
<table class="table">
        <thead>
            <th >#ID</th>
            <th>Admin Name</th>
            <th>Admin Email</th>
            <?php if($_SESSION['role'] == 1) { ?>
                <th>Action</th>
                <?php } ?>
        </thead>
        <?php 
            foreach($select_admin as $data){ ?>
            <tr>
                <td><?= $data['id'] ?></td>  
                <td><?= $data['name'] ?></td>                  
                <td><?= $data['email'] ?></td>
                <?php if($_SESSION['role'] == 1) { ?>
                    <td>
                        <a href="/task2/admin/list.php?remove=<?= $data['id'] ?>"  name="remove" class="btn btn-outline-danger">remove</a>
                        <a href="/task2/admin/show.php?show=<?= $data['id'] ?>"  name="show" class="btn btn-outline-success">show</a>
                    </td>
                <?php } ?>
            </tr>
            <?php } ?>
    </table>
<?php include '../shared/footer.php'; ?> 