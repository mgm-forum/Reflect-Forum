
<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    $sql = "SELECT * FROM users WHERE user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    $sql_teachers = "SELECT * FROM teachers WHERE email='$email'";
    $result_teachers = mysqli_query($conn, $sql_teachers);
    $numRows_teachers = mysqli_num_rows($result_teachers);

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
    } 
    elseif($numRows_teachers == 1){
        $row = mysqli_fetch_assoc($result_teachers);
        if (password_verify($pass, $row['passwd'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['useremail'] = $email;

            // Check if the user is an admin
            if ($email == 'admin@example.com') {
                $_SESSION['isadmin'] = true;
                header("Location: /Reflect-Forum/admin.php");
            }
        } else {
            $showError = "Invalid Credentials";
        }
    }
    else {
        $showError = "Invalid Credentials";
    }
    if ($_SESSION['isadmin']) {
        header("Location: /Reflect-Forum/admin.php");
    } else {
        header("Location: /Reflect-Forum/index.php?login=true&showError=$showError");
    }
}
?>

<?php
// $showError = "false";
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     include '_dbconnect.php';
//     $email = $_POST['loginEmail'];
//     $pass = $_POST['loginPass'];

//     // Query to fetch data from 'users' table
//     $sql_users = "SELECT * FROM users WHERE user_email='$email'";
//     $result_users = mysqli_query($conn, $sql_users);
//     $numRows_users = mysqli_num_rows($result_users);

//     // Query to fetch data from 'teachers' table
//     $sql_teachers = "SELECT * FROM teachers WHERE email='$email'";
//     $result_teachers = mysqli_query($conn, $sql_teachers);
//     $numRows_teachers = mysqli_num_rows($result_teachers);

//     // Check if user exists in 'users' table
//     if ($numRows_users == 1) {
//         $row = mysqli_fetch_assoc($result_users);
//         if (password_verify($pass, $row['user_pass'])) {
//             session_start();
//             $_SESSION['loggedin'] = true;
//             $_SESSION['sno'] = $row['sno'];
//             $_SESSION['useremail'] = $email;

//             // Check if the user is an admin
//             if ($email == 'admin@example.com') {
//                 $_SESSION['isadmin'] = true;
//                 header("Location: /Reflect-Forum/admin.php");
//             }
//         } else {
//             $showError = "Invalid Credentials";
//         }
//     }
//     // Check if user exists in 'teachers' table
//     else if ($numRows_teachers == 1) {
//         $row = mysqli_fetch_assoc($result_teachers);
//         if (password_verify($pass, $row['teacher_pass'])) {
//             session_start();
//             $_SESSION['loggedin'] = true;
//             $_SESSION['sno'] = $row['sno'];
//             $_SESSION['useremail'] = $email;

//             // Set 'isadmin' to false as teachers are not admins
//             $_SESSION['isadmin'] = false;

//             // Redirect to teacher's dashboard
//             header("Location: /Reflect-Forum/index.php?login=true&showError=$showError");
//         } else {
//             $showError = "Invalid Credentials";
//         }
//     } else {
//         $showError = "Invalid Credentials";
//     }

//     // Redirect to appropriate page based on login success or failure
//     if ($_SESSION['isadmin']) {
//         header("Location: /Reflect-Forum/admin.php");
//     } else {
//         header("Location: /Reflect-Forum/index.php?login=true&showError=$showError");
//     }
// }
?>


