<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 11/2/2018
 * Time: 1:34 AM
 */
include "util.php";

print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Online Order</title>");
print("</head>");
print("<body>");

print("<h1>Online Order</h1><hr />");

/*  array of items for sale  */
$products = [
    "Motherboard" => [
        "description" => "The infrastructure of the computer",
        "price" => 199.99,
    ],
    "CPU" => [
        "description" => "The heart of the computer",
        "price" => 499.99,
    ],
    "SSD 4 petabyte storage" => [
        "description" => "The long term memory of the computer",
        "price" => 199999.99,
    ],
    "RAM 32 terabytes" => [
        "description" => "The short term memory of the computer",
        "price" => 38299.99,
    ],
    "65 foot monitor" => [
        "description" => "The eyes to the soul of the computer",
        "price" => 9777258.99,
    ],
];

/*  If the form has been posted, process it */
if (isset($_POST['submit'])) {
    $orderTotal = 0;
    $order = "";
    /* Use the key to access the quantity from the post array
        and get the absolute value of that.
        Then build the output string.
    */
    foreach ($products as $key => $value) {
        $quantity = abs($_POST[str_replace(" ", "_", $key)]);
        if ($quantity > 0) {
            $itemTotal = $quantity * $value["price"];
            $orderTotal += $itemTotal;
            $order .= "$key: $quantity @ \${$value["price"]} = \$$itemTotal;\n";
        }
    }
    $order .= "Order Total: \$$orderTotal";
    saveToFile($order);
}

/*  Define these once for use throughout the next section */
$tableHeader = "<table border='1' width='60%' style='background-color:lightgray'><tr><th>Product</th><th>Description</th><th>Price</th></tr>";
$tableFooter = "</table>";

$formItems = "";
/*  Loop through each item for sale, put its info into a table, and add a quantity input with the
key as the name so we can dynamically keep track of it in the post array */
foreach ($products as $key => $value) {
    $formItems .= $tableHeader;
    $formItems .= "<tr><td>$key</td><td>{$value["description"]}</td><td>\${$value["price"]}</td></tr>";
    $formItems .= $tableFooter;
    $formItems .= "<p>Quantity: <input type='number' name='$key' style='width:50px;' value='0'/></p>";
}

print(<<<HTMLOUTPUT
<form action="OnlineOrders.php" method="post">
<p>Place an order</p>
$formItems
<p><input type="submit" name="submit" value="Place Order!" />
</form>


HTMLOUTPUT
);

print("</body>");
print("</html>");