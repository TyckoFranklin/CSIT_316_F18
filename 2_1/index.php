<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 9/23/2018
 * Time: 9:38 AM
 */
print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Conditional Script</title>");
print("</head>");
print("<body>");
/** @var $IntVariable int */
$IntVariable = 75;
($IntVariable > 100) ? $Result = '$IntVariable is
greater than 100'
    : $Result = '$IntVariable is less than or equal
 to 100';
echo "<p>$Result</p>";
print("</body>");
print("</html>");
