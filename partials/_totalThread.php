<?php  
include './partials/_dbconnect.php';
$sql = "SELECT COUNT(*) as total_threads FROM threads";
$result = mysqli_query($conn, $sql);
$threads_count = mysqli_fetch_assoc($result)["total_threads"];
echo  $threads_count;
mysqli_close($conn);
?>