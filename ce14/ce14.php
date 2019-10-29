<?PHP
require_once '../db.php';
session_start();

$product_id = $_POST['Select_Product'];
$action = $_POST['action'];

switch ($action) {
    case "Add":
        $_SESSION['cart'][$product_id]++;
        break;
    case "Remove":
        $_SESSION['cart'][$product_id]--;
        if($_SESSION['cart']<=0){
            unset($_SESSION['cart']);
        }
        break;
    case "Empty":
        unset($_SESSION['cart']);
        break;
    case "Info":
        
        break;
        
}
?>
<html>
    <body>
        <form method="post" action="ce14.php">
            <p><span>Please select a product</span>
                <select name ='Select_Product' onchange="productInfo(this.value)">
                    <option></option>
                    <?php
                    //select 
                    $search = "SELECT * FROM Library.AdventureGear order by Item";
                    $return = $link->query($search);

                    if (!$return) {
                        $message = "Whole query" . $search;
                        echo $message;
                        die("invalid query" . mysqli_error());
                    }

                    while ($row = mysqli_fetch_array($return)) {
                        if ($row['idAdventureGear'] == $product_id) {
                            echo "<option value='" . $row['idAdventureGear'] . "' selected='selected'>"
                            . $row['Item'] . "</option";
                        } else {
                            echo "<option value='" . $row['idAdventureGear'] . "'>"
                            . $row['Item'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </p>
        </form>

        <table>
            <tr>
                <td>
                    <input type="submit" value="Add" name="action">
                </td>
                <td>
                    <input type="submit" value="Remove" name="action">
                </td>
                <td>
                    <input type="submit" value="Empty" name="action">
                </td>
                <td>
                    <input type="submit" value="Info" name="action">
                </td>
            </tr>
        </table>
    </body>
</html>