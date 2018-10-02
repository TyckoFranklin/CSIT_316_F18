<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/1/2018
 * Time: 6:38 PM
 */

print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Validate Credit Card</title>");
print("</head>");
print("<body>");

print("<h1>Validate Credit Card</h1><hr />");

$CreditCard = array(
    "",
    "8910-1234-5678-6543",
    "OOOO-9123-4567-0123");
foreach ($CreditCard as $CardNumber) {
    if (empty($CardNumber))
        echo "<p>This Credit Card Number is invalid because it contains an empty string.</p>";
    else {
        $CreditCardNumber = $CardNumber;
        $CreditCardNumber = str_replace("-", "", $CreditCardNumber);
        $CreditCardNumber = str_replace(" ", "", $CreditCardNumber);
        if (!is_numeric($CreditCardNumber))
            echo "<p>Credit Card Number " . $CreditCardNumber . " is not a valid Credit Card number because it contains a non-numeric character. </p>";
        else
            echo "<p>Credit Card Number " . $CreditCardNumber . " is a valid Credit Card number.</p>";
    }
}

print("</body>");
print("</html>");
