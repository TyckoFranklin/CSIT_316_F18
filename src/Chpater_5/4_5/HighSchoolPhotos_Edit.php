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
print("</head>");
print("<body>");

print("<h1>High School Photos</h1><hr />");

print("<div>");
print("<a href='HighSchoolPhotos_Main.php'>Main Menu</a>");
print("</div>");

/** @var bool $goodToGo */
$goodToGo = true;


if (isset($_POST['name'])) {
   $name = addslashes($_POST['name']);
    $goodToGo &= true;
} else {
    $goodToGo &= false;
}

if (!empty($_POST['description'])) {
    $description = addslashes($_POST['description']);
    $goodToGo &= true;
} else {
    $goodToGo &= false;
}

if (isset($_POST['image'])) {
    $goodToGo &= true;
} else {
    $goodToGo &= false;
}

if ($goodToGo) {
    if (!isset($filename)) {
        $filename = str_replace(".", "", microtime(true));
    }
    output($values, $filename);
}


$placeHolder = "Input Valid Value";

print(<<<HTML
<h2>Enter the information for the bug report</h2>
<div><p>Please provide all required fields</p></div>
<form method="POST">
<p>Name <input required="true" type="text" name="name" value="{$values['name']}" placeholder="$placeHolder"/></p>
<p>Description <input required="true" type="text" name="version" value="{$values['version']}" placeholder="$placeHolder"/></p>
<p>Photo <input required="true" type="file" name="image" accept=".png"/></p>
<p><input type="submit" value="Submit" /></p>
HTML
);

if (isset($filename)) {
    print("<input hidden='true' name='filename' value='$filename' />");
}
print("</form>");

print("</body>");
print("</html>");
