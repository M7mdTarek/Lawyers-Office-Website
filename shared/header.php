<?php
session_start();
if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header('location:/task2/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="/task2/css/all.min.css">
    <link rel="stylesheet" href="/task2/css/style.css">
    <title>CRUD Project</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/task2/index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/task2/profile.php">Profile</a>
                </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Admins
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="/task2/admin/list.php">Admins List</a>
                        <a class="dropdown-item" href="/task2/admin/create.php">Create Admins</a>
                    </div>
                    </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Lawyers
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="/task2/lawyers/list.php">Lawyers List</a>
                    <a class="dropdown-item" href="/task2/lawyers/create.php">Create Lawyers</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Articales
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="/task2/articales/list.php">Articales List</a>
                    <a class="dropdown-item" href="/task2/articales/create.php">Create Articales</a>
                    </div>
                </li>
            </ul>
            <?php if($_SESSION) : ?>
                <form class="logout">
                    <button name="logout" class="btn btn-outline-danger my-2 my-sm-0"> LogOut </button>
                </form>
            <?php endif; ?>
        </div>
    </nav>