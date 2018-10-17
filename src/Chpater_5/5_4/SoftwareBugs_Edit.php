<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/15/2018
 * Time: 8:03 PM
 */
include "SoftwareBugs_Utilities.php";

print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Software Bugs</title>");
print("</head>");
print("<body>");

print("<h1>Software Bugs</h1><hr />");

print("<div>");
print("<a href='./SoftwareBugs_Main.php'>Main Menu</a>");
print("</div>");

/** @var bool $goodToGo */
$goodToGo = true;

/** @var string[] $values */
$values = [
    "name" => '',
    "version" => '',
    "hardware" => '',
    "system" => '',
    "frequency" => '',
    "solutions" => '',
];



if(isset($_GET['filename']) && sizeof($_POST) === 0){
    $values = readAndParseFile(addslashes($_GET['filename']));
    /** @var string $filename */
    $filename = addslashes($_GET['filename']);
}

if (isset($_POST['name'])) {
    $values['name'] = addslashes($_POST['name']);
    $goodToGo &= true;
} else {
    $goodToGo &= false;
}

if (!empty($_POST['version'])) {
    $values['version'] = addslashes($_POST['version']);
    $goodToGo &= true;
} else {
    $goodToGo &= false;
}

if (isset($_POST['hardware'])) {
    $values['hardware'] = addslashes($_POST['hardware']);
    $goodToGo &= true;
} else {
    $goodToGo &= false;
}

if (isset($_POST['system'])) {
    $values['system'] = addslashes($_POST['system']);
    $goodToGo &= true;
} else {
    $goodToGo &= false;
}

if (isset($_POST['frequency'])) {
    $values['frequency'] = addslashes($_POST['frequency']);
    $goodToGo &= true;
} else {
    $goodToGo &= false;
}

if (isset($_POST['solutions'])) {
    $values['solutions'] = addslashes($_POST['solutions']);
    $goodToGo &= true;
} else {
    $goodToGo &= false;
}

if (isset($_POST['filename'])) {
    $filename = addslashes($_POST['filename']);
}

if ($goodToGo) {
    if (!isset($filename)) {
        $filename = str_replace(".", "", microtime(true)) . ".txt";
    }
    output($values, $filename);
}


$placeHolder = "Input Valid Value";

print(<<<HTML
<h2>Enter the information for the bug report</h2>
<div><p>Please provide all required fields</p></div>
<form method="POST">
<p>Name <input required="true" type="text" name="name" value="{$values['name']}" placeholder="$placeHolder"/></p>
<p>Version <input required="true" type="text" name="version" value="{$values['version']}" placeholder="$placeHolder"/></p>
<p>Hardware <input required="true" type="text" name="hardware" value="{$values['hardware']}" placeholder="$placeHolder"/></p>
<p>System <input required="true" type="text" name="system" value="{$values['system']}" placeholder="$placeHolder"/></p>
<p>Frequency <input required="true" type="text" name="frequency" value="{$values['frequency']}" placeholder="$placeHolder"/></p>
<p>Solutions <textarea required="true" name="solutions" placeholder="$placeHolder">{$values['solutions']}</textarea></p>
<p><input type="submit" value="Submit" /></p>
HTML
);

if (isset($filename)) {
    print("<input hidden='true' name='filename' value='$filename' />");
}
print("</form>");

print("</body>");
print("</html>");
