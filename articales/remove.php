<?php
include '../general/env.php';
if(isset($_GET['remove'])){
    $delid= $_GET['remove'];
    $delq = "DELETE FROM `articales` WHERE ID = $delid";
    mysqli_query($connection , $delq);
    header("location: /task2/articales/list.php");
}
?> 