<?php
session_start();
require_once 'DataBaseConnection.php';
include 'header.php';
echo '<div class="col-md-offset-1 col-md-10">';
//checking to see if there was a reply
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //someone is calling the file directly, which we don't want
    echo 'This file cannot be called directly.';
}
else
{
    //check for sign in status
    if(!$_SESSION['signed_in'])
    {
        echo 'You must be signed in to post a reply.';
    }
    else
    {
        //a real user posted a real reply
        $sql = "INSERT INTO Replies(RepliesText, RepliesDate, TopicFK, PlayerFK) "
                . "VALUES ('I love using it with PHP, makes good forums', NOW(), 1, 2)";
                         
        $result = $con->query();
                         
        if(!$result)
        {
            echo 'Your reply has not been saved, please try again later.';
        }
        else
        {
            echo 'Your reply has been saved, check out <a href="topic.php?top=' . $_POST['topicID'] . '">the topic</a>.';
        }
    }
}
 
echo "</div>";
//add the footer
include 'footer.php';
?>
