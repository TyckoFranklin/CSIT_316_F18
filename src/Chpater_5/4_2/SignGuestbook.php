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
print("    <title>Sign Guest Book</title>");
print("</head>");
print("<body>");

print("<h1>Sign Guest Book</h1><hr />");

if (empty($_POST['first_name']) || empty($_POST['last_name'])) {
    print(<<<HTML
 <p>You must enter your first and last
 name. Click your browser's Back button to
 return to the Guest Book.</p> \n
HTML
    );
} else {
    $FirstName = addslashes($_POST['first_name']);
    $LastName = addslashes($_POST['last_name']);
    $GuestBook = fopen("guestbook.txt", "ab");
    if (is_writeable("guestbook.txt")) {
        if (fwrite($GuestBook, $LastName . ", " . $FirstName . "\n")) {
            echo "<p>Thank you for signing our guest book!</p>\n";
        } else {
            echo "<p>Cannot add your name to the guest book.</p>\n";
        }
    } else {
        echo "<p>Cannot write to the file.</p>\n";
    }
    fclose($GuestBook);
}


print("</body>");
print("</html>");
