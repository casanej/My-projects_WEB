<?php
require_once("php/framework.php");
require_once("php/@system/session_manager.php");

$fwSessionManager = new SessionManager();

$isUserLogged = $fwSessionManager->sessionUserLogin();
?>

<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <!-- i class="btn btn-light menu-link material-icons" href="#menu">&#xE8D4;</i> -->
    <div class="container">
        <a class="navbar-brand" href="index.php">To Do List</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBarTop" aria-controls="navBarTop" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navBarTop">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="tasks.php">Tasks</a></li>
                <?php if($isUserLogged): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                    <div class="dropdown-menu" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#">Account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out</a>
                    </div>
                </li>
                <?php else: ?>
                <li class="float-right nav-item "><a class="nav-link" href="access.php">Login/Register</a></li>
                <?php endif ?>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
