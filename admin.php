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
<table style="border-collapse: collapse; width: 100%; max-width: 800px; margin: 0 auto;">
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
                        <button type="submit" name="delete_user" style="background-color: #dc3545; color: #fff; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<?php
// Handle the delete user functionality
if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];

    // Delete the user record from the database
    $sql = "DELETE FROM users WHERE sno='$user_id'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        echo "<script>alert('User Delete Successfully');</script>";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}
?>
