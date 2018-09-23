<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 9/23/2018
 * Time: 10:17 AM
 */
print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Gas Prices</title>");
print("</head>");
print("<body>");

/** @var float $GasPrice */
$GasPrice = 2.57;
if ($GasPrice >= 2 && $GasPrice <=3){
    echo "<p>Gas prices are between $2.00 and $3.00.</p>";
} else {
    echo "<p>Gas prices are not between $2.00 and $3.00</p>";
}
print("</body>");
print("</html>");
