<?php
session_start();
require_once 'DataBaseConnection.php';
include 'header.php';
?>

<div class='col-md-4'></div>
<div class='col-md-4'>
    <?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        /* the form hasn't been posted yet, display it
          note that the action="" will cause the form to post to the same page it is on */
        echo '<form method="post" action="">
            <div class="form-group">
            <label for="InputFname">First Name:</label> <input type="text" name="first_name" id="InputFname" class="form-control"/>
            <label for="InputLname">Last Name:</label> <input type="text" name="last_name" id="InputLname" class="form-control"/>
        <label for="InputPassword">Password:</label> <input type="password" name="user_pass" class="form-control" id="InputPassword">
        <label for="InputConfirm">Password again:</label> <input type="password" name="user_pass_check" class="form-control" id = "InputConfirm">
        <label for="InputEmail">E-mail:</label> <input type="email" name="user_email" class="form-control" id="InputEmail">
        <input type="submit" value="Create User" />
        </div>
     </form>';
    } else {
        /* so, the form has been posted, we'll process the data in three steps:
          1.  Check the data
          2.  Let the user refill the wrong fields (if necessary)
          3.  Save the data
         */
        $errors = array(); /* declare the array for later use */

        if (isset($_POST['first_name']) && isset($_POST['last_name'])) {
            //the user name exists
            if (!ctype_alnum($_POST['first_name']) || !ctype_alnum($_POST['last_name'])) {
                $errors[] = 'The name can only contain letters and digits.';
            }
            if (strlen($_POST['first_name']) > 100 || strlen($_POST['last_name']) > 100) {
                $errors[] = 'The name cannot be longer than 100 characters.';
            }
        } else {
            $errors[] = 'The name field must not be empty.';
        }


        if (isset($_POST['user_pass'])) {
            if ($_POST['user_pass'] != $_POST['user_pass_check']) {
                $errors[] = 'The two passwords did not match.';
            }
        } else {
            $errors[] = 'The password field cannot be empty.';
        }

        if (!empty($errors)) /* check for an empty array, if there are errors, they're in this array (note the ! operator) */ {
            echo 'Uh-oh.. a couple of fields are not filled in correctly..';
            echo '<ul>';
            foreach ($errors as $key => $value) /* walk through the array so all the errors get displayed */ {
                echo '<li>' . $value . '</li>'; /* this generates a nice error list */
            }
            echo '</ul>';
        } else {
            $hashedPassword = hash("ripemd128", $_POST['user_pass']);
            //the form has been posted without, so save it
            //notice the use of mysql_real_escape_string, keep everything safe!
            //also notice the sha1 function which hashes the password
            $sql = "INSERT INTO Player(PlayerFname, PlayerLname, PlayerEmail, PlayerPassword ,PlayerDate, PlayerLevel) "
                    . "VALUES('".mysql_fix_string($con, $_POST['first_name'])."',
                     '".mysql_fix_string($con, $_POST['last_name'])."',
                    '".mysql_fix_string($con, $_POST['user_email'])."',
                        '".hash("ripemd128", $_POST['user_pass'])."',
                     NOW(), 0)";
            //echo $sql;
            $result = $con->query($sql);
            

            if (!$result) {
                //something went wrong, display the error
                echo 'Something went wrong while registering. Please try again later.';
                //die($conn->error); //debugging purposes, uncomment when needed
            } else {
                echo 'Successfully registered. You can now <a href="PlayerLogin.php">sign in</a> and start posting! :-)';
            }
        }
    }
    ?>
</div>
<div class='col-md-4'></div>
<?php
//add the footer
include 'footer.php';
?>