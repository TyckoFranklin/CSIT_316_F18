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
print("    <title>Software Bugs</title>");
print("</head>");
print("<body>");

print("<h1>Software Bugs</h1><hr />");

print("<div>");
print("<a href='HighSchoolPhotos_Edit.php?new=true'>New Bug Report</a>");
print("</div>");

print("<hr>");
print("<div>Current Bug Reports<br>");
$bugReports = getBugReports();
foreach ($bugReports as $bugReport){
    print("<p><a href='SoftwareBugs_Edit.php?filename={$bugReport['filename']}'>" . $bugReport['name'] . "</a></p>");
}

print("</div>");

print("</body>");
print("</html>");
