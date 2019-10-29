<?php
session_start();
?>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div>
            <h3>Welcome! Please Login to Shop</h3>
        </div>
        <div>
            <form method="post" action="loginVerify.php">
                <input type="text" name="myusername" placeholder="Username">
                <input type="password" name="mypassword" placeholder="Password">
                <input type="submit" value="login">
            </form>
            <a href="newUser.php">New User?</a>
        </div>
    </body>
</html>

<?PHP
if(isset($_SESSION['badPass'])||$_SESSION['badPass']==1){
    echo"Username or Password incorrect";
}
?>