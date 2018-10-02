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
print("    <title>Odd Numbers</title>");
print("</head>");
print("<body>");
/** @var $IntVariable int */
$IntVariable = 1;
while($IntVariable <= 100){
    /*  Only print for the odd numbers  */
    if($IntVariable%2 === 1){
        print("<div>".$IntVariable."</div>");
    }
    $IntVariable++;
}
print("</body>");
print("</html>");
