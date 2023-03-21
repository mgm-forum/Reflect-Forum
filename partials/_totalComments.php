<?php  
include './partials/_dbconnect.php';
$sql = "SELECT COUNT(*) as total_comments FROM comments";
$result = mysqli_query($conn, $sql);
$comments_count = mysqli_fetch_assoc($result)["total_comments"];
echo  $comments_count;
mysqli_close($conn);

?>