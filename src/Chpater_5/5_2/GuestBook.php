<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/15/2018
 * Time: 7:46 PM
 */


print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Guest Book</title>");
print("</head>");
print("<body>");

print("<h1>Guest Book</h1><hr />");

print(<<<HTML
<h2>Enter your name to sign our guest book</h2>
<form method="POST" action="SignGuestBook.php">
<p>First Name <input type="text" name="first_name"
/></p>
<p>Last Name <input type="text" name="last_name"
/></p>
<p><input type="submit" value="Submit" /></p>
</form>
<p><a href="ShowGuestBook.php">Show Guest Book
</a></p>
HTML
);

print("</body>");
print("</html>");
