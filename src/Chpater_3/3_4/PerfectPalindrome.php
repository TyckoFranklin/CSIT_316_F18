<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/1/2018
 * Time: 10:09 PM
 */


print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Validate Perfect Palindrome</title>");
print("</head>");
print("<body>");


print("<h1>Validate Perfect Palindrome</h1><hr />");

/*  Store the strings, but first make them all lowercase  */
$stringOne = strtolower("Deleveled");
$stringTwo = strtolower("deleveled");

/*  See if they equal each other */
if ($stringOne == $stringTwo) {
    print("$stringOne is a perfect palindrome of $stringTwo");
} else {
    print("$stringOne is not a perfect palindrome of $stringTwo");
}

/*  Added this br element so the site would look better  */
print("<br>");

/*  Store the strings, but first make them all lowercase  */
$stringOne = strtolower("Time");
$stringTwo = strtolower("Emit");

/*  Verify they are the same  */
if ($stringOne == $stringTwo) {
    print("$stringOne is a perfect palindrome of $stringTwo");
} else {
    print("$stringOne is not a perfect palindrome of $stringTwo");
}

/*  Added this br element so the site would look better  */
print("<br>");


print("</body>");
print("</html>");