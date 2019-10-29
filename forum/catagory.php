<?php

//create_cat.php
session_start();
require_once 'DataBaseConnection.php';
include 'header.php';

$sql = "SELECT idCategory, CategoryName, CategoryDesc FROM Category";
//echo $sql;
$result = $con->query($sql);
if(!$result)die($conn->error);

echo '<div class="col-md-offset-1 col-md-10">';
print <<< HTMLT
<table class="table forum table-striped" style="margin-top:20px;">
    <thead>
      <tr>
        <th class="cell-stat"></th>
        <th>
          <h3>Categories</h3>
        </th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
      </tr>
    </thead>
        <tbody>

HTMLT;
if (!$result) {
    echo 'The categories could not be displayed, please try again later.';
} else {
    if (mysqli_num_rows($result) == 0) {
        echo 'No categories defined yet.';
    } else {
        while ($row = $result->fetch_assoc()) {

            echo '<tr><td class="text-center"><i class="fa fa-question fa-2x text-primary"></i></td>
        <td><h4><a href="catagory.php?cat=' . $row['idCatagorie'] . '">' . $row['CatagorieName'] . '</a><br><small>' . $row['CatagorieDesc'] . '</small><h4></td>';
            echo '<td>';
            $topSql = "SELECT idTopic, TopicName FROM Library.Topic where CatagoryFK = " 
                    . $row['idCatagorie'] . " order by idTopic DESC limit 5";
            //echo $topSql;
            $topresult = $con->query($topSql);
            if (mysqli_num_rows($topresult) == 0) {
                echo 'No topics defined yet.';
            } else {
                while ($toprow = $topresult->fetch_assoc()) {
                    echo '<a href="topic.php?top=' . $toprow['idTopic'] . '">' . $toprow['TopicName'] . '</a><br> ';
                }
            }

            echo"</td></tr>";
        }
    }
}
echo '</tbody>
</table>';
if ($_GET['cat'] > 0) {
    //echo "Show catagories here";
    $category = mysql_fix_string($con, $_GET['cat']);
    $sql = "";
//echo $sql;
    $result = $con->query();
    if (!$result) die($conn->error);
    while ($row = $result->fetch_assoc()) {
        $catName = $row['CatagorieName'];
        $catDes = $row['CatagorieDesc'];
    }
    echo "<section class='container-fluid'><header><h3 style='color:black'>$catName</h3><p>$catDes</p></header>";
    print <<< HTML
<table class="table forum table-striped" style="margin-top:20px;">
    <thead>
      <tr>
        <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
        <th class="cell-stat-2x hidden-xs hidden-sm">Created</th>
        <th class="cell-stat-2x hidden-xs hidden-sm">Original Poster</th>
        <th class="cell-stat-2x hidden-xs hidden-sm">Replies</th>
      </tr>
    </thead>
        <tbody>
HTML;
    $topSql = "";
    //echo $topSql;
    $topresult = $con->query();
    if (!$topresult) die($conn->error);

    while ($row = $topresult->fetch_assoc()) {
        if($row['NumReply']>0){
            $lastPost= $row['LastReply'];
        }else{
            $lastPost = $row['TopicDate'];
        }
        echo '<tr><td><a href="topic.php?top=' . $row['idTopic'] . '">' . $row['TopicName'] 
                . '</a></td><td>' . date("m/d/Y", strtotime($row['TopicDate'])) . '</td><td>'.$row['TopicPoster'] .'</td><td>'
                . date("m/d/Y", strtotime($lastPost)).'</td>';
        
        echo "</tr>";
    }

    print <<< HTML
    </tbody>
    </table>
    </section >
HTML;
}
echo '</div>';
//add the footer
include 'footer.php';
?>