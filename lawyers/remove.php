<?php
include '../general/env.php';
if(isset($_GET['remove'])){
    $delid= $_GET['remove'];
    $delq = "DELETE FROM `lawyers` WHERE ID = $delid";
    mysqli_query($connection , $delq);
    header("location: /task2/lawyers/list.php");
}
?> 