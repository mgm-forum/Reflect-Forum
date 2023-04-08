<!-- Modal -->
<form action="" method="post">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Teacher Login</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name Here.">
          </div>
          <div class="mb-3">
            <label for="contact" class="form-label">Contact No.</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="+91 9370946170">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="branch" class="form-label">Branch</label>
            <input type="text" class="form-control" id="branch" name="branch" placeholder="Computer, Mechanical, Civil..">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
          <div class="mb-3">
            <label for="repassword" class="form-label">Re-enter Password</label>
            <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Re-enter Password">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>

<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $branch = isset($_POST['branch']) ? $_POST['branch'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $repassword = isset($_POST['repassword']) ? $_POST['repassword'] : '';

    // Check whether this email exists
    $existSql = "select * from `teachers` where email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $showError = "Email already in use";
    } else {
        if ($password == $repassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `teachers`(`sno`, `fullname`, `phoneno`, `email`, `passwd`, `branch`, `loggedin`, `dt`) VALUES ('','$name','$contact','$email','$hash','$branch',0,current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                ob_start();
                ob_end_flush();
                exit();
            }
        } else {
            $showError = "Passwords do not match";
        }
    }
}
