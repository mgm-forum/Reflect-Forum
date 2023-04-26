<?php
session_start();
include 'partials/_dbconnect.php';
include 'partials/_loginmodal.php';
include 'partials/_signmodal.php';
include 'partials/_teacherLogin.php';


echo '<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #161A1D">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="./res/logo4.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Reflect Forum
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Reflect-Forum/index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        About
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">Teacher Login</a></li>
                        <li><a class="dropdown-item" href="https://www.gppen.ac.in/principal_desk">Alumni Login</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>

            </ul>
            ';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '<form class="d-flex" method="get" action="search.php">
                
                    <a href="partials/_logout.php" class="btn btn-outline-warning ml-2">Logout</a>
                    </form>';
} else {
    echo '<form class="d-flex">
                 
                  </form>
                  <button class="btn btn-outline-warning me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                  <button class="btn btn-outline-warning me-2" data-bs-toggle="modal" data-bs-target="#signModal">Register</button>
                  <button class="btn btn-outline-warning me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Admin</button>
                  ';
                  
}
echo '</div>
    </div>
</nav>';
