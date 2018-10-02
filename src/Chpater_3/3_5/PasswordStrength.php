<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/1/2018
 * Time: 9:04 PM
 */


print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Password Strength</title>");
print("</head>");
print("<body>");


print("<h1>Validate Password Stength</h1><hr />");

/*  Set some passwords to check  */
$passwords = array(
    "123456789",
    "johnyappleseed",
    "_1337Hax0rs!",
    "LOWERupper",
    "1978",
    "Mydogspud!1",
    "SpaceBallsRulez",
    'H0wsTh1Spa$$w0rd*?',
    "LOWERupper",
    "somerandompasswordthatnoonewilleverguess");

/*  loop through each password and verify it is strong enough  */
foreach ($passwords as $password) {
    /*  Check everything but length  */
    $passlength = preg_match("/^.{8,16}$/", $password);
    /*  Now do all the other checks in one statement. If it passes,
     and the length passes, output password is valid */
    if (preg_match("/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[^0-9A-Za-z])/", $password) == 1
        && $passlength == 1) {
        print("Password: $password is a valid password.<br>");
    } else {
        /*  If the above check fails, go through each condition and output
        a message if the password fails the condition  */
        print("Passoword: $password is an invalid password:<br>");

        /*  contains at least one uppercase letter  */
        if (preg_match("/[A-Z]/", $password) != 1) {
            print("&nbsp Password has no uppercase letters. <br>");
        }

        /*  contains at least one lowercase letter  */
        if (preg_match("/[a-z]/", $password) != 1) {
            print("&nbsp Password has no lowercase letters. <br>");
        }

        /*  contains at least one numeric character  */
        if (preg_match("/[0-9]/", $password) != 1) {
            print("&nbsp Password has no numbers. <br>");
        }

        /*  contains at least one non-numeric and non-letter character  */
        if (preg_match("/[^0-9A-Za-z]/", $password) != 1) {
            print("&nbsp Password has no non-letter or non-numeric characters. <br>");
        }

        /*  if shorter than 8 characters, display message  */
        if (preg_match("/^.{0,7}$/", $password) == 1) {
            print("&nbsp Password is not long enough. <br>");
        }

        /* if longer than 16 characters, display message  */
        if (preg_match("/^.{17}/", $password) == 1) {
            print("&nbsp Password is too long. <br>");
        }
    }
    /*  Added this br element so the site would look better  */
    print("<br>");
}
print("</body>");
print("</html>");