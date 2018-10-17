<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/15/2018
 * Time: 7:36 PM
 */


print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Hit Counter</title>");
print("</head>");
print("<body>");

print("<h1>Hit Counter</h1><hr />");
$CounterFile = "hitcount.txt";
if (file_exists($CounterFile)) {
    $Hits = file_get_contents($CounterFile);
    ++$Hits;
} else {
    $Hits = 1;
}
print("<h1>There have been $Hits hits to this page.");
print("</h1>\n;");

if (file_put_contents($CounterFile, $Hits)) {
    print("<p>The counter file has been updated.");
}

print("</p>\n");

print("</body>");
print("</html>");
