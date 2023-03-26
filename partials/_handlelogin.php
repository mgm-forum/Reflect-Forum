
<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];
    $sql = "SELECT * FROM users WHERE user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['user_pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['useremail'] = $email;

            // Check if the user is an admin
            if ($email == 'admin@example.com') {
                $_SESSION['isadmin'] = true;
                header("Location: /Reflect-Forum/admin.php");
            }
        } else {
            $showError = "Invalid Credentials";
        }
    } else {
        $showError = "Invalid Credentials";
    }
    if ($_SESSION['isadmin']) {
        header("Location: /Reflect-Forum/admin.php");
    } else {
        header("Location: /Reflect-Forum/index.php?login=true&showError=$showError");
    }
}

