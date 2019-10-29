<!DOCTYPE html>

<?php
//create_cat.php
session_start();
require_once 'DataBaseConnection.php';
include 'header.php';
echo '<div class="col-md-offset-1 col-md-6"><div class="form-group">';
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //the form hasn't been posted yet, display it
    echo "        <form method='post' action=''>"
    . "<label for='cat'>Catagory:</lable><select id='cat' name='cat' class='form-control'><option value='--'>--</option>";
    $sql = "SELECT idCatagorie, CatagorieName, CatagorieDesc FROM Catagorie";
//echo $sql;
$result = $con->query();
while ($row = $result->fetch_assoc()) {
    echo "<option value='". $row['idCatagorie']."'>" . $row['CatagorieName'] ."</option>";
}
    echo "</select><br>";
    print <<<HTML

        <label for="name">Topic name:</lable> <input type='text' name='top_name' id="name" class="form-control"/>
        <label for="description">Topic Text:</lable> <textarea name='top_text' id="text" class="form-control" style="width:500px; height:250px"/></textarea><br>
        <input type='submit' value='Add topic' />
     </form>'
HTML;

}
else
{
    //the form has been posted, so save it
    $sql = "INSERT INTO Topic (`TopicName`, `TopicDate`, `CatagoryFK`, `PlayerFK`, `TopicText`) VALUES('" 
            . mysql_fix_string($con,$_POST['top_name']) . "', Now(),"
            . mysql_fix_string($con,$_POST['cat']) .","
            . $_SESSION['user_id'] .", '"
            . mysql_fix_string($con,$_POST['top_text']) ."')";
    //echo $sql;
    $result = $con->query($sql);

    if(!$result)
    {
        //something went wrong, display the error
        die($conn->error);
    }
    else
    {
        echo 'New category successfully added.';
    }
}
echo '</div>';
//add the footer
include 'footer.php';
?>
