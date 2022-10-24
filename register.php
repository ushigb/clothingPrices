<?php
include 'header.php';
include 'functions.php';
?>

<form method="post" action="register.php" >
    <div class="container ">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="reg">
                <span><h3>REGISTER</h3></span>  
            </div>
        </div>        
        <div class="col-md-2"></div>
        </div>
         
        <div class="row login">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                
                    <h5><?php echo display_error(); ?></h5>
                <div ><h4>Username:</h4>
                    <input type="text" name="username" value="<?php echo $username ?>"/>
                </div>
                <div><h4>Password:</h4>
                    <input type="password" name="password1"/>
                </div>
                <div><h4>Confirm password:</h4>
                    <input type="password" name="password2"/>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" name="register" value="Sing in"/>
                </div>
                <a class="btn btn-info" href="index.php">back</a>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</form>




<?php
include 'footer.php';


