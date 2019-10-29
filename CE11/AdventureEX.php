<?php

@ $conndb = mysql_connect('localhost', 'root', 'dbpass');
if (!$conndb) {
    die('Unable to connect to database [' . mysql_error() . ']');
}
$db_selected = mysql_select_db('Library', $conndb);
if (!$db_selected) {
    die('Can\'t use database : ' . mysql_error());
}


    $AdvID = $_GET['AdvID'];
    if ($AdvID > 0) {
        $search = "select * from AdventureTable where idAdventureTable = $AdvID";
        $message = "Whole query " . $search;
        //echo $message;
        $return = mysql_query($search);
        if (!$return) {
            $message = "Whole query " . $search;
            echo $message;
            die('Invalid query: ' . mysql_error());
        }
        while ($row = mysql_fetch_array($return)) {
            echo "<table>";
            echo "<tr><th>The Room</th></tr>";
            echo "<tr><td><div id=\"advText\">" . $row['AdventureText'] . "</div></td><tr>";
            echo "<td><div id=\"button1\"><button type=\"button\" value='" . $row['Button1Value'] . "' onclick=\"letsAdventure(this.value)\">" . $row['Button1Text'] . "</button></div></td></tr>";
            echo "<tr><td><div id=\"button2\"></div><button type=\"button\" value='" . $row['Button2Value'] . "' onclick=\"letsAdventure(this.value)\">" . $row['Button2Text'] . "</button></td></tr>";
            echo "</table>";
        }
    }

mysql_close($conndb);

