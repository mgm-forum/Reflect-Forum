<?php  
include './partials/_dbconnect.php';
$sql = "SELECT COUNT(*) as total_users FROM users";
$result = mysqli_query($conn, $sql);
$user_count = mysqli_fetch_assoc($result)["total_users"];
echo  $user_count;
mysqli_close($conn);
?>