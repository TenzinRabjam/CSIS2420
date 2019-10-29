<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1">
        <title>A Basic Forum</title>        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/normalize.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <style>

        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="jumbotron">
                        <h1>A Basic Forum Page</h1>
                        <p>This forum uses MySQL and PHP</p>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-default">
                <ul class="nav navbar-nav">
                    <li><a href="catagory.php" style="color: rgb(255,255,255)">View the Forum</a></li>
                    <li><a href="create_top.php" style="color: rgb(255,255,255)">Add a Topic</a></li>
                    <li><a href="create_cat.php" style="color: rgb(255,255,255)">Add a Category</a></li>
                    <li><a href="PlayerLogin.php" style="color: rgb(255,255,255)">Log in</a></li>
                </ul>
                <div style="float: right;">
                <?php
                //print_r($_SESSION);
                if ($_SESSION['signed_in']) {
                    echo 'Hello ' . $_SESSION['user_name'] . '. Not you? <a href="signout.php">Sign out</a>';
                } else {
                    echo '<a href="PlayerLogin.php">Sign in</a> or <a href="CreateAccount.php">create an account</a>.';
                }
                ?>
            </div>
            </nav>
            <div class="row" style="background-color: ivory ">
