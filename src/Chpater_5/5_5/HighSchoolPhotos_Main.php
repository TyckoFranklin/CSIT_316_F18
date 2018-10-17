<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/15/2018
 * Time: 8:03 PM
 */

include "HighSchoolPhotos_Utilities.php";

print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>High School Photos</title>");
print("<style>table, th, td {    border: 1px solid black;} img{max-width: 100%}</style>");
print("</head>");
print("<body>");


print("<h1>High School Photos</h1><hr />");

print("<div>");
print("<a href='HighSchoolPhotos_Edit.php'>New Photo Upload</a>");
print("</div>");

print("<hr>");
print("<div>Current Content<br>");
print("<table style='max-width: 80%'>");
$bugReports = getBugReports();
foreach ($bugReports as $bugReport) {
    print("<tr><td colspan='2'><img src='./storage/{$bugReport['image']}' ></td></tr><tr><td>{$bugReport['name']}</td><td>{$bugReport['description']}</td></tr>");
}
print("</table>");
print("</div>");

print("</body>");
print("</html>");
