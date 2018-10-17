<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/15/2018
 * Time: 7:55 PM
 */


print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Show Guest Book</title>");
print("</head>");
print("<body>");

print("<h1>Show Guest Book</h1><hr />");

$file = "./guestbook.txt";

if (file_exists($file)) {
    $content = file_get_contents($file);
} else {
    $content = "";
}

print("<div>Current Guest Book Entries<br>");
print("<pre>" . $content . "</pre>");
print("</div>");

print("</body>");
print("</html>");
