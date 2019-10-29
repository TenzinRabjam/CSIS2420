<?php
require_once '../db.php';

$newuser = $_POST['newUsername'];
$newpass = $_POST['newPass'];
$newuser = stripslashes($newuser);
$newpass = stripslashes($newpass);
$newuser = mysqli_real_escape_string($link, $newuser);
$newpass = mysqli_real_escape_string($link, $newpass);
$hash = hash("ripemd128", $newpass);
?>
<html>
    <head>
        <script type="text/javascript">
            function validate() {
                if (document.form.newUsername.value == "") {
                    alert("provide a new username");
                    document.form.newUsername.focus();
                    return false;
                }
                if (document.form.newPass.value == "") {
                    alert("provide a password");
                    document.form.newPass.focus();
                    return false;
                }
                if (document.form.newPass.value !== document.form.confirm.value) {
                    alert("Passwords do not match!");
                    document.form.newPass.focus();
                    return false;
                }
                return (true);
            }

        </script>
    </head>
    <body>
        <h4>Create Account</h4>
        <form method="post" action="newUser.php" name="form" onsubmit="return(validate());">
            <label>Username:</label>
            <input type="text" name="newUsername">
            <label>Password:</label>
            <input type="password" name="newPass" id="newPass">
            <label>Password Confirm:</label>
            <input type="password" name="confirm" id="confirm">
            <input type="submit">

            <?PHP
            if (isset($_POST['newUsername']) && isset($_POST['newPass'])) {
                $sql = "INSERT INTO users(username, password) Values('" . $newuser . "','" . $hash . "')";
                $result = $link->query($sql);

                if (!$result) {
                    echo "Bad query" . $sql;
                    die("invalid query" . mysqli_error());
                } else {
                    header("Location: login.php");
                }
            }
            ?>
        </form>
    </body>
</html>
<?PHP
mysqli_close($link);
