<?php
require_once ('db.php');
?>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="../style.css" rel="stylesheet">
    </head>
    <body>  
        <?PHP
        $fName = htmlentities($_POST['fName']);
        $lName = htmlentities($_POST['lName']);
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $year = $_POST['year'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sex = $_POST['sex'];
        $relation = $_POST['relation'];
        $request = $_POST['requestType'];


        print <<< HTML
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Birthday</th>
                    <th>Relation</th>
                 </tr>
            </thead>
            <tbody>
HTML;

        switch ($request) {

            case "Search":
                $sql1 = "SELECT * FROM Family WHERE fName = '$fName' and lName = '$lName'";
                $result = $link->query($sql1);
                if (!$result) {
                    die($conn->error);
                }
                if (!$result) {
                    echo 'The information you requested could not be displayed. Please try again later.';
                } else
                if (mysqli_num_rows($result) == 0) {
                    echo '<tr><td>No Contact found.</td></tr></tbody></table>';
                } else {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>'
                        . '<td>' . $row['fName'] . '</td>'
                        . '<td>' . $row['lName'] . '</td>'
                        . '<td>' . $row['phone'] . '</td>'
                        . '<td>' . $row['address'] . '</td>'
                        . '<td>' . $row['city'] . '</td>'
                        . '<td>' . $row['state'] . '</td>'
                        . '<td>' . $row['zip'] . '</td>'
                        . '<td>' . $row['month'] . '/' . $row['day'] . '/' . $row['year'] . '</td>'
                        . '<td>' . $row['relation'] . '</td>'
                        . '</tr></tbody></table>';
                    }
                }
                break;
            case "Create":

                $sql2 = "INSERT INTO Family (fName, lName, phone, address, city, state, zip, month, day, year, username, "
                        . "password, sex, relation) VALUES('$fName', '$lName', '$phone', '$address', '$city', '$state', '$zip', '$month', 
                            '$day', '$year', '$username', '".  hash("ripemd128", $_POST['password'])."', '$sex', '$relation')";
                
                $result2 = $link->query($sql2);
                if (!$result2) {
                    die($link->error);
                }
                if (!$result2) {
                    echo "User could not be created.";
                } else {
                    echo "User successfully created!";
                }
                break;
            case "Update":
                
                if (($_POST['username'])==null) {
                    echo"<p>you forgot your username and password</p>";
                } else {
                    
                $sql3 = "UPDATE Family SET lname = '$lName', phone = '$phone', address = '$address', 
                            city = '$city', state = '$state', zip = '$zip'
                            WHERE username = '$username' AND password = '".  hash("ripemd128", $_POST['password'])."'";

                    $result3 = $link->query($sql3);
                    if (!$result3) {
                        die($link->error);
                    }
                    if (!$result3) {
                        echo "User could not be updated.";
                    } else {
                        echo "Successfully Updated!";
                    }
                }
                break;
            default:
                echo "Invalid input. Please try again.";
                break;
        }
        ?>
    </body>
</html>


