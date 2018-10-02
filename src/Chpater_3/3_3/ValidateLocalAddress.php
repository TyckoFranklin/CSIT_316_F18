<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/1/2018
 * Time: 9:00 PM
 */


print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Validate Local Address</title>");
print("</head>");
print("<body>");


print("<h1>Validate Local Address</h1><hr />");

$email = array(
    "jsmith123@example.org",
    "john.smith.mail@example.org",
    "john.smith@example.org",
    "john.smith@example",
    "jsmith123@mail.example.org");

foreach ($email as $emailAddress) {
    echo "The email address &ldquo;" . $emailAddress . "&rdquo; ";
    if (preg_match("/^(([A-Za-z]+\d+)|" . "([A-Za-z]+\.[A-Za-z]+))" . "@((mail\.)?)example\.org$/i", $emailAddress) == 1)
        echo " is a valid e-mail address.";
    else
        echo " is not a valid e-mail address.";
    /*  Added this br element so the site would look better  */
    print("<br>");
}
print("</body>");
print("</html>");