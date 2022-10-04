<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
$select_adminq = "SELECT lawyers.id,name,email FROM `lawyers`;";
$select_admin= mysqli_query($connection , $select_adminq);
include '../lawyers/remove.php';
authent();
authoriz_semi_access();
?>
<table class="table">
        <thead>
            <th >ID</th>
            <th>Lawyer Name</th>
            <th>Lawyer Email</th>
            <th>Action</th>
        </thead>
        <?php 
            foreach($select_admin as $data){ ?>
            <tr>
                <td><?= $data['id'] ?></td>  
                <td><?= $data['name'] ?></td>                  
                <td><?= $data['email'] ?></td>
                <td>
                    <a href="/task2/lawyers/list.php?remove=<?= $data['id'] ?>"  name="remove" class="btn btn-outline-danger">remove</a>
                    <a href="/task2/lawyers/show.php?show=<?= $data['id'] ?>"  name="show" class="btn btn-outline-success">show</a>
                </td>
            </tr>
            <?php } ?>
    </table>
<?php include '../shared/footer.php'; ?> 