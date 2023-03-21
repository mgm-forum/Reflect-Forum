<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['isadmin'] != true) {
    header("Location: /Reflect-Forum/index.php");
    exit;
}
include './partials/_dbconnect.php';
// Fetch user details from the database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

?>

<!-- Display the user details in a table -->

<style type="text/css">
p{
padding: 7px;
text-align: justify; }
.left{
    margin-top: 20px;
    margin-left: 20px;
width: 45%;
float: left; }
.right{
    margin-top: 20px;
    margin-right: 20px;
width: 45%;
float: right; }
</style>


<!-- Left Class -->
<div class="left"> 
<table style="border-collapse: collapse; width: 100%; max-width: 800px; margin: 0 auto; border: 1px solid #1a2436;  background-color: #d3e0f2;">
    <thead>
        <tr>
            <th style="padding: 12px 15px; text-align: left; background-color: #f2f2f2; border-bottom: 1px solid #ddd;">Name</th>
            <th style="padding: 12px 15px; text-align: left; background-color: #f2f2f2; border-bottom: 1px solid #ddd;">Email</th>
            <th style="padding: 12px 15px; text-align: left; background-color: #f2f2f2; border-bottom: 1px solid #ddd;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo $row['sno']; ?></td>
                <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo $row['user_email']; ?></td>
                <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;">
                    <form action="" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $row['sno']; ?>">
                        <button type="submit" name="delete_user" style="background-color: #036bfc; color: #fff; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>

<style>
.grid-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr 1fr;
  gap: 10px;
}

.grid-item { 
  background-color: #d3e0f2;
  border: 1px solid #1a2436;
  border-radius: 20px;
  padding: 10px;
}

</style>
<!-- Right Class -->
<div class="right"> 
<div class="grid-container" >

  <div class="grid-item">
    <p style="color: #036bfc; font-size: 40px; text-align: center;">&#9787;<br>Users<br> <?php include './partials/_totalUser.php' ?></p>
  </div>
  
  <div class="grid-item">
  <p style="color: #036bfc; font-size: 40px; text-align: center;"> &#9777;<br> Threads<Br> <?php include './partials/_totalThread.php' ?></p>
  </div>

  <div class="grid-item">
  <p style="color: #036bfc; font-size: 40px; text-align: center;"> &#9870; <br>Comments<br> <?php include './partials/_totalComments.php'?></p>
  </div>

  <div class="grid-item">
  <p style="color: #036bfc; font-size: 40px; text-align: center;"> &#9751;<br> Teachers<br> <?php include './partials/_totalTeachers.php'?></p>
  </div>

</div>
</div>

<?php
if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM users WHERE sno='$user_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('User Delete Successfully');</script>";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}
?>
