
<!-- Modal -->
<form  action=" " method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Teacher Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label" name="name">Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your Name Here.">
        </div>

        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label" name="contact">Contact No.</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="+91 9370946170">
        </div>

        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label" name="email">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label" name="branch">Branch</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Computer, Mechanical, Civil..">
        </div>

        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label" name="password">Password</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>

        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label" name = "repassword">Re-enter Password</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit" value="submit" name="submit">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php 
include "partials/_dbconnect.php"; 
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $branch = $_POST['branch'];
    $password = $POST['password'];
    $repassword = $POST['repassword'];
    $sql = "INSERT INTO `teachers`(`id`, `fullname`, `phoneno`, `email`, `passwd`, `branch`, `loggedin`, `dt`) VALUES ('','$name','$contact','$email','$password','$branch','0','')";
    if(mysqli_query($conn, $sql)){
        echo"<script>alert('New data added successfully')</script>";
    }
    else
    {
        echo "<script>alert('error')</script>";
    }
    mysqli_close($conn);
}
else
{
  $name = "";
  $contact = "";
  $email = "";
  $branch = "";
  $password = "";
  $repassword = "";
}

?>