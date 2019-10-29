<?php

//create_cat.php
session_start();
require_once 'DataBaseConnection.php';
include 'header.php';


echo '<div class="col-md-offset-1 col-md-6"><div class="form-group">';
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //the form hasn't been posted yet, display it
    print <<<HTML
        '<form method='post' action=''>
        <label for="name">Category name:</lable> <input type='text' name='cat_name' id="name" class="form-control"/>
        <label for="description">Category description:</lable> <textarea name='cat_description' id="description" class="form-control" style="width:500px;"/></textarea><br>
        <input type='submit' value='Add category' />
     </form>'
HTML;

}
else
{
    //the form has been posted, so save it
    $sql = "INSERT INTO Catagorie (`CatagorieName`, `CatagorieDesc`) VALUES ('PHP', 'A really awesome language')";
    //echo $sql;
    $result = $con->query();

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