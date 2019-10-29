<?php
session_start();
require_once 'DataBaseConnection.php';
include 'header.php';

echo "<div class='col-md-12'>";

//first, check if the user is already signed in. If that is the case, there is no need to display this page
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
    echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        /*the form hasn't been posted yet, display it
          note that the action="" will cause the form to post to the same page it is on */
        print <<<TACO
                    <form name="form1" method="post" action=""><div class="form-group">
                <header><h4>Member Login </h4>
                </header>
                    <label for="myusername">Email : </lable><input name="myusername" type="text" id="myusername" class="form-control"/><br>
                    <label for="mypassword">Password : </lable><input name="mypassword" type="password" id="mypassword" class="form-control"/><br>
                    <input type="submit" name="Submit" value="Login" class="form-control"><br>
                    <footer><a href="CreateAccount.php">Create an Account</a></footer>
                </div>
            </form>
TACO;
        }
    else
    {
        /* so, the form has been posted, we'll process the data in three steps:
            1.  Check the data
            2.  Let the user refill the wrong fields (if necessary)
            3.  Varify if the data is correct and return the correct response
        */
        $errors = array(); /* declare the array for later use */
         
        if(!isset($_POST['myusername']))
        {
            $errors[] = 'The username field must not be empty.';
        }
         
        if(!isset($_POST['mypassword']))
        {
            $errors[] = 'The password field must not be empty.';
        }
         
        if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
        {
            echo 'Uh-oh.. a couple of fields are not filled in correctly..';
            echo '<ul>';
            foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
            {
                echo '<li>' . $value . '</li>'; /* this generates a nice error list */
            }
            echo '</ul>';
        }
        else
        {
            //the form has been posted without errors, so save it
            //notice the use of mysql_real_escape_string, keep everything safe!
            //also notice the sha1 function which hashes the password
            $hashedPassword = hash("ripemd128",$_POST['mypassword']);
            $sql = "SELECT idPlayer,PlayerFName,PlayerLName,PlayerLevel FROM Player "
                    . " WHERE PlayerEmail ='".mysql_fix_string($con, $_POST['myusername']). "'AND
                    PlayerPassword ='".hash("ripemd128", $_POST['mypassword'])."'";
             //echo $sql;            
            $result = $con->query($sql);


            if(!$result)
            {
                //something went wrong, display the error
                echo 'Something went wrong while signing in. Please try again later.';
                //die($conn->error); //debugging purposes, uncomment when needed
            }
            else
            {
                //the query was successfully executed, there are 2 possibilities
                //1. the query returned data, the user can be signed in
                //2. the query returned an empty result set, the credentials were wrong
                if(mysqli_num_rows($result) == 0)
                {
                    echo 'You have supplied a wrong user/password combination. Please try again.';
                }
                else
                {
                    //set the $_SESSION['signed_in'] variable to TRUE
                    $_SESSION['signed_in'] = true;
                     
                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                    while($row = $result->fetch_assoc())
                    {
                        $_SESSION['user_id']    = $row['idPlayer'];
                        $_SESSION['user_name']  = $row['PlayerFName']." ".$row['PlayerLName'];
                        $_SESSION['user_level'] = $row['PlayerLevel'];
                    }
                     
                    echo 'Welcome, ' . $_SESSION['user_name'] . '. <a href="catagory.php">Proceed to the forum overview</a>.';
                }
            }
        }
    }
}
echo "</div>";
include 'footer.php';
?>
