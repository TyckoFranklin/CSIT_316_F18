<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 11/1/2018
 * Time: 11:37 PM
 */
include "utils.php";


print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Guest Book</title>");
print("</head>");
print("<body>");

print("<h1>Guest Book</h1><hr />");

$filename = "Guestbook/Guestbook.txt";
if (isset($_GET['action'])) {
    if ((file_exists($filename))
        && (filesize($filename) != 0)) {
        /*  Get the guest list  */
        $guests = parseLines(file($filename));
        switch ($_GET['action']) {
            case 'Sort Ascending':
                $names = array_column($guests, '0');
                $emails = array_column($guests, '1');
                array_multisort($names, SORT_ASC, $emails, SORT_ASC, $guests);
                break;
            case 'Shuffle':
                shuffle($guests);
                break;
        } // End of the switch statement
        if (count($guests) > 0) {
            /*  Write the guest list to file, even if there aren't any changes  */
            $newGuests = prepareEntriesToBeWritten($guests);
            $GuestsStore = fopen($filename, "wb");
            if ($GuestsStore === false)
                echo "There was an error updating the guest list file\n";
            else {
                fwrite($GuestsStore, $newGuests);
                fclose($GuestsStore);
            }
        } else
            unlink($filename);
    }
}

if (isset($_POST['submit'])) {
    $GuestName = stripslashes($_POST['GuestName']);
    $GuestEmail = stripslashes($_POST['GuestEmail']);
    $ExistingGuests = array();
    /*  Get the existing guests */
    if (file_exists($filename) && filesize($filename) > 0) {
        $ExistingGuests = parseLines(file($filename));
    }

    /*  Check if the name already exists  */
    $unique = false;
    foreach($ExistingGuests as $guests){
        if($guests[0] === $GuestName){
            $unique = true;
            break;
        }
    }

    if($unique){
        echo "<p>The guest you entered already exists!<br />\n";
        echo "Your signature was not added to the list.</p>";
    } else {
        $GuestFile = fopen($filename, "ab");
        if ($GuestFile === false)
            echo "There was an error saving your message!\n";
        else {
            /*  Prepare the signature and write to file  */
            fwrite($GuestFile, prepareSingleEntryToBeWritten([ $GuestName, $GuestEmail ]));
            fclose($GuestFile);
            echo "Your signature has been added to the list.\n";
        }
    }
}

if ((!file_exists($filename))
    || (filesize($filename) == 0))
    echo "<p>There are no guests in the list.</p>\n";
else {
    /*  Parse the guest list  */
    $guests = parseLines(file($filename));
    echo "<table border=\"1\" width=\"100%\" style=\"background-color:lightgray\">\n";
    foreach ($guests as $guest) {
        echo "<tr>\n";
        /*  0 is name, 1 is the email  */
        echo "<td>" . htmlentities($guest[0]) . "</td>";
        echo "<td>" . htmlentities($guest[1]) . "</td>";
        echo "</tr>\n";
    }
    echo "</table>\n";
}

print(<<<HTMLOUTPUT
<p>
<a href="guestbook.php?action=Sort%20Ascending"> Sort Guest List</a><br />
<a href="guestbook.php?action=Shuffle"> Randomize Guest List</a><br />
</p>
<form action="guestbook.php" method="post">
<p>Sign Guest Book</p>
<p>Name: <input type="text" name="GuestName" /></p>
<p>Email: <input type="text" name="GuestEmail" /></p>
<p><input type="submit" name="submit" value="Sign!" />
<input type="reset" name="reset" value="Reset Form" /></p>
</form>


HTMLOUTPUT
);

print("</body>");
print("</html>");