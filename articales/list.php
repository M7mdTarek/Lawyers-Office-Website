<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
$select_articleq = "SELECT id,title,auther FROM `articales`;";
$select_article= mysqli_query($connection , $select_articleq);
include '../articales/remove.php';
authent();
?>
<table class="table">
        <thead>
            <th >#ID</th>
            <th>Article Title</th>
            <th>Article Auther</th>
            <th>Action</th>
        </thead>
        <?php 
            foreach($select_article as $data){ ?>
            <tr>
                <td><?= $data['id'] ?></td>  
                <td><?= $data['title'] ?></td>                  
                <td><?= $data['auther'] ?></td>
                <td>
                    <a href="/task2/articales/list.php?remove=<?= $data['id'] ?>"  name="remove" class="btn btn-outline-danger">remove</a>
                    <a href="/task2/articales/show.php?show=<?= $data['id'] ?>"  name="show" class="btn btn-outline-success">show</a>
                </td>
            </tr>
            <?php } ?>
    </table>
<?php include '../shared/footer.php'; ?> 