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
print("    <title>Validate Standard Palindrome</title>");
print("</head>");
print("<body>");


print("<h1>Validate Standard Palindrome</h1><hr />");

/* Get the base string to check */
$baseString = "'Dennis and Edna dine,' said I, as Enid and Edna sinned.";
/*  Reverse it for the second string to check against  */
$baseStringReversed = strrev($baseString);

/*  Make all letters lowercase and replace all characters that are not lowercase letters  */
$stringOne = preg_replace("/[^a-z]/", "", strtolower($baseString));
/*  Reverse it again  */
$stringTwo = strrev($stringOne);

/*  Verify standard palindrome or not  */
if ($stringOne == $stringTwo) {
    print("$baseString is a standard palindrome of $baseStringReversed<br><br>");
    print("Without spaces or punctuation: $stringOne is a standard palindrome of $stringTwo");
} else {
    print("$baseString is not a standard palindrome of $baseStringReversed");
}

/*  Added this br element so the site would look better  */
print("<br><hr /><br>");

/*  Same process as above  */
$baseString = "How now brown cow?";
$baseStringReversed = strrev($baseString);
$stringOne = preg_replace("/[^a-z]/", "", strtolower($baseString));
$stringTwo = strrev($stringOne);

if ($stringOne == $stringTwo) {
    print("$baseString is a standard palindrome of $baseStringReversed<br><br>");
    print("Without spaces or punctuation: $stringOne is a standard palindrome of $stringTwo");
} else {
    print("$baseString is not a standard palindrome of $baseStringReversed");
}

/*  Added this br element so the site would look better  */
print("<br><br>");

print("</body>");
print("</html>");