<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 9/23/2018
 * Time: 10:25 AM
 */
print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>While Logic</title>");
print("</head>");
print("<body>");

/** @var $Numbers array */
$Numbers = array();
/** @var $Count int */
$Count = 0;
while ($Count < 100) {
    /* Call me old fashion, but I very much dislike using arrays without an index  */
    $Numbers[$Count] = $Count + 1;
    $Count++;
}
foreach ($Numbers as $CurNum)
    echo "<p>$CurNum</p>";
print("</body>");
print("</html>");
