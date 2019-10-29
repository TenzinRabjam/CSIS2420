<!DOCTYPE html>

<?php
session_start();
require_once 'DataBaseConnection.php';
include 'header.php';

$topicID = $_GET['top'];
echo '<div class="col-md-offset-1 col-md-10">';
if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    //someone is calling the file directly, which we don't want
    echo 'This file cannot be called directly.';
} else {
    $sql = "";
    //echo $sql;
    $result = $con->query($sql);
    if (!$result)
        die($conn->error);
    $row = $result->fetch_assoc();
    $TopicTitle = $row['TopicName'];
    $TopicText = $row['TopicText'];
    $TopicDate = $row['TopicDate'];
    $TopicPoster = $row['TopicPoster'];
    
    print <<< HTMLT
<table class="table forum table-striped" style="margin-top:20px;">
    <thead>
      <tr>        
        <th>
          <h3>$TopicTitle</h3>
        </th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Date</th>
        <th class="cell-stat-2x hidden-xs hidden-sm">Poster</th>
      </tr>
    </thead>
        <tbody>

HTMLT;
    //original post
    echo "<tr><td>$TopicText</td><td>".date("m/d/Y", strtotime($TopicDate))."</td><td>$TopicPoster</td></tr><tr><td colspan= 3>Replies</td></tr>";
    //getting replies
    $replysql = "Select RepliesText, (Select PlayerFName from Player where PlayerFK = idPlayer)"
            . " as Poster, RepliesDate from Replies where TopicFK = 3 order by RepliesDate";
    $replyRes = $con->query();
    while($row = $replyRes->fetch_assoc()){
        echo "<tr><td>".$row['RepliesText']."</td><td>".date("m/d/Y", strtotime($row['RepliesDate'])) ."</td><td>". $row['Poster'] ."</td></tr>";
    }
    //Post a reply
    if($_SESSION["signed_in"]== true){
           print <<<FORM
    <tr>
        <td colspan=3 class="form-group">
            <form method="post" action="reply.php">
                <textarea name="reply-content" class="form-control">Some text here</textarea>
                <input type="submit" value="Submit reply" class="form-control"/>
                <input type="hidden" value=$topicID name = 'topicID' />
            </form>
        </td>
    </tr>
FORM;
    }else{
        echo "<tr><td colspan=3>You must be logged in to reply</td></tr>";
    }
    //closing the table
    print <<<CHTML
    </tbody>
    </table>
CHTML;
}
echo "</div>";
//add the footer
include 'footer.php';
?>
