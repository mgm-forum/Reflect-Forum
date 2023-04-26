<div class="modal fade" id="signModal" tabindex="-1" aria-labelledby="signModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand" href="#">
                    <img src="./res/logo4.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                </a>
                <h5 class="modal-title" id="signModalLabel" style="color: #001845">Register Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="partials/_handlesignup.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" style="color: #002855">Email address:</label>
                        <input type="email" class="form-control" name="signupEmail" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="color: #002855">Password:</label>
                        <input type="password" class="form-control" name="signupPassword" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label" style="color: #002855">Confirm Password:</label>
                        <input type="password" class="form-control" name="signupcPassword" id="exampleInputPassword2">
                    </div>
                    <p style = "color:red">Note: Use Email-id that was register in Collage </p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Register</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>