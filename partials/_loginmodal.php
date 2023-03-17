<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand" href="#">
                    <img src="./res/logo4.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                </a>
                <h5 class="modal-title" id="loginModalLabel">Login Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="partials/_handlelogin.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="loginPass" id="loginPass">
                    </div>

                    <button type="button" class="btn btn-primary" data-bs-toggle="button">Forgot Password</button>

                    <p style = "color:red">Note That: *Strict action will be taken against you if you do anything wrong</p>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Login</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>