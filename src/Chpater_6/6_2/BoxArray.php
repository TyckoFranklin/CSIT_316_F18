<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 11/1/2018
 * Time: 11:06 PM
 */


print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Box Array</title>");
print("</head>");
print("<body>");

print("<h1>Box Array</h1><hr />");


$boxArray = [
    "Small box" => [
        "length" => 12,
        "width" => 10,
        "depth" => 2.5,
    ],
    "Medium box" => [
        "length" => 30,
        "width" => 20,
        "depth" => 4,
    ],
    "Large box" => [
        "length" => 60,
        "width" => 40,
        "depth" => 11.5,
    ],
];

print("<table>");
print("<tr><th>Type</th><th>Volume</th></tr>");


/* loop through array and each element's array, do the calculation and put the result in a table */
foreach($boxArray as $type => $box){
    $volume = 1;
    foreach($box as $dim) {
        $volume *= $dim;
    }
    print("<tr><td>$type</td><td>$volume</td></tr>");
}

print("</table>");
print("</body>");
print("</html>");
