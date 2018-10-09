<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/8/2018
 * Time: 9:11 PM
 */

include "inc_ requestDump.php";


print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Request Dump</title>");
print("</head>");
print("<body>");

print("<h1>Request Dump</h1><hr />");

printRequestToTable();
/* if a request has not been made (more specific, it's empty), display the form */
if(sizeof($_REQUEST) === 0) {
    print(<<<HEREDOC
<form  method="post">
    Word 1: <input type="text" name="Word1" /><br />
    Word 2: <input type="text" name="Word2" /><br />
    Word 3: <input type="text" name="Word3" /><br />
    Word 4: <input type="text" name="Word4" /><br />
    <input type="reset" value="Clear Form" />&nbsp;
    &nbsp;<input type="submit" name="Submit" value="Send Form" />
</form>
HEREDOC
    );
}
print("</body>");
print("</html>");
