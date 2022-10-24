<?php
include 'header.php';
include 'functions.php';
?>
<form method="post">
    <div class="container ">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="reg">
                    <span><h3>LOGIN</h3></span>  
                </div>
            </div>        
            <div class="col-md-2"></div>
        </div>
        <div class="row login">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php echo display_error(); ?>
                <div><input type="hidden" name="id"></div>
                <div><h4>Username:</h4>
                    <input type="text" name="username">
                </div>
                <div><h4>Password:</h4>
                    <input type="password" name="password">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" name="login-btn" value="Login">
                </div>
                <a class="btn btn-info" href="register.php">New User</a>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</form>




<?php
include 'footer.php';
