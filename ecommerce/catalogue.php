<?php
require_once '../db.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$product = $_POST['select'];
$action = $_POST['action'];

switch ($action) {
    case "Add":
        $_SESSION['cart'][$product] ++;
        break;
    case "Remove":
        $_SESSION['cart'][$product] --;
        if ($_SESSION['cart'][$product] <= 0) {
            unset($_SESSION['cart'][$product]);
        }
        break;
    case "Empty":
        unset($_SESSION['cart']);
        break;
    case "Info":
        $_SESSION['product_id'] = $product;
        break;
}
?>
<html>
    <head>
        <title>catalogue</title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body class="container text-center" style="width: 75%;">
        <br>
        <h2>Catalogue</h2>
        <br>
        <form method="post" action="catalogue.php">
            <div class="form-inline">
                <label>Select an item:</label>
                <select class="form-control" name="select" style="width: 50%;">
                    <option>Select an item</option>
                    <?php
                    $search = "SELECT * FROM Library.products order by name";
                    $return = $link->query($search);

                    if (!$return) {
                        $message = "Whole query" . $search;
                        echo $message;
                        die("invalid query" . mysqli_error());
                    }

                    while ($row = mysqli_fetch_array($return)) {
                        if ($row['idproducts'] == $product) {
                            echo "<option value='" . $row['idproducts'] . "' selected='selected'>"
                            . $row['name'] . "</option>";
                        } else {
                            echo "<option value='" . $row['idproducts'] . "'>"
                            . $row['name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Price</td>
                        <td>Image</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM Library.products WHERE idproducts ='" . $_SESSION['product_id'] . "'";
                    $result = $link->query($sql);
                    if (!$result) {
                        $message = "query" . $sql;
                        echo $message;
                        die("invalid" . mysqli_error($link));
                    }

                    while ($row = mysqli_fetch_array($result)) {
                        echo"<tr><td>" . $row['name'] . "</td><td>" . $row['desc'] . "</td>"
                        . "<td>" . $row['price'] . "</td><td>"
                        . "<img src='productImages/" . $_SESSION['product_id'] . ".jpg' width='120' height='120'>"
                        . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <h4>Your Cart</h4>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <td>Items</td>
                        <td>Quantity</td>
                        <td>Cost</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>

                    <?PHP
                    if ($_SESSION['cart']) {
                        foreach ($_SESSION['cart'] as $product => $quantity) {
                            $sql = "SELECT `name`, `desc`, `price` FROM Library.products WHERE"
                                    . " idproducts ='" . $product . "'";
                            $result1 = $link->query($sql);

                            if (!$result1) {
                                $message = "query" . $sql;
                                echo $message;
                                die("invalid" . mysqli_error($link));
                            }

                            list($name, $desc, $price) = mysqli_fetch_row($result1);
                            $line_cost = $price * $quantity;
                            $total = $total + $line_cost;
                            echo"<tr>";
                            echo "<td>" . $name . "</td>";
                            echo "<td>" . $quantity . "</td>";
                            echo "<td>$" . $line_cost . ".00</td>";
                        }
                        echo "<td>$" . $total . ".00</td>";
                        echo"</tr>";
                    } else {
                        echo"You have no items in your cart";
                    }
                    ?>

                </tbody>
            </table>
            <table>
                <tr>
                    <td>
                        <input class="btn btn-success" type="submit" value="Add" name="action">
                    </td>
                    <td>
                        <input class="btn btn-danger" type="submit" value="Remove" name="action">
                    </td>
                    <td>
                        <input class="btn btn-primary" type="submit" value="Empty" name="action">
                    </td>
                    <td>
                        <input class="btn btn-default" type="submit" value="Info" name="action">
                    </td>
                </tr>
            </table>
        </form>
        <div>
            <a class="btn btn-warning" href="logout.php">Logout?</a>
        </div>
    </body>
</html>
<?PHP
mysqli_close($link);

