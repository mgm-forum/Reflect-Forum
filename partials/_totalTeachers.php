<?php  
include './partials/_dbconnect.php';
$sql = "SELECT COUNT(*) as total_teachers FROM teachers";
$result = mysqli_query($conn, $sql);
$teachers_count = mysqli_fetch_assoc($result)["total_teachers"];
echo $teachers_count;
mysqli_close($conn);
?>


