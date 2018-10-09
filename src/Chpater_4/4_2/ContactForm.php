<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/8/2018
 * Time: 8:50 PM
 */


print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Contact Me</title>");
print("</head>");
print("<body>");

print("<h1>Contact Me</h1><hr />");

/**
 * Validates the input. Code from the book
 * @param string $data
 * @param string $fieldName
 *
 * @return string
 */
function validateInput($data, $fieldName)
{
    global $errorCount;
    if (empty($data)) {
        echo "\"$fieldName\" is a required field.<br />\n";
        ++$errorCount;
        $retval = "";
    } else { // Only clean up the input if it isn't
        // empty
        $retval = trim($data);
        $retval = stripslashes($retval);
    }
    return ($retval);
}

/**
 * Validates an email. Code mostly from the book. I didn't like their regex (couldn't get it to work on valid emails)
 * so I used my own method.
 * @param string $data
 * @param string $fieldName
 *
 * @return string
 */
function validateEmail($data, $fieldName)
{
    global $errorCount;
    if (empty($data)) {
        echo "\"$fieldName\" is a required field.<br />\n";
        ++$errorCount;
        $retval = "";
    } else { // Only clean up the input if it isn't
        // empty
        $retval = trim($data);
        $retval = stripslashes($retval);

        /*  Garbage regex that doesn't work
        $pattern = "/^[\w-]+(\.[\w-]+)*@" . "[\w-]+(\.[\w-]+)*" . "(\.[[a-z]]{2,})$/i";
        if (preg_match($pattern, $retval) == 0) {
        */

        /*  Thank you internet for this method*/
        if (!filter_var($retval, FILTER_VALIDATE_EMAIL)) {
            echo "\"$data\" is not a valid e-mail address.<br />\n";
            ++$errorCount;
        }
    }
    return ($retval);
}

/**
 * @param string $Sender
 * @param string $Email
 * @param string $Subject
 * @param string $Message
 */
function displayForm($Sender, $Email, $Subject, $Message)
{
    /*  Let's heredoc it up in here!!!  */
    print(<<<HEREDOC
    <h2 style = "text-align:center">Contact Me</h2>
    <form name="contact" action="ContactForm.php" method="post">
        <p>Your Name: <input type="text" name="Sender" value="$Sender" /></p>
        <p>Your E-mail: <input type="text" name="Email" value="$Email" /></p>
        <p>Subject: <input type="text" name="Subject" value="$Subject" /></p>
        <p>Message:<br />
        <textarea name="Message">$Message</textarea></p>
        <p><input type="reset" value="Clear Form" />&nbsp;
        &nbsp;<input type="submit" name="Submit" value="Send Form" /></p>
    </form>
HEREDOC
    );

}

/** @var boolean $ShowForm */
$ShowForm = true;
/** @var int $errorCount */
$errorCount = 0;
/** @var string $Sender */
$Sender = "";
/** @var string $Email */
$Email = "";
/** @var string $Subject */
$Subject = "";
/** @var string $Message */
$Message = "";

/*  Code from the book  */
/* if errors, display form, if no errors, don't  */
if (isset($_POST['Submit'])) {
    $Sender = validateInput($_POST['Sender'], "Your Name");
    $Email = validateEmail($_POST['Email'], "Your E-mail");
    $Subject = validateInput($_POST['Subject'], "Subject");
    $Message = validateInput($_POST['Message'], "Message");
    if ($errorCount == 0)
        $ShowForm = false;
    else
        $ShowForm = true;
}

/* if displaying the form, call the displayForm function */
if ($ShowForm == true) {
    if ($errorCount > 0) // if there were errors
        echo "<p>Please re-enter the form information below.</p>\n";
    displayForm($Sender, $Email, $Subject, $Message);
} else {
    /* we bee good, display success message!  */
    $SenderAddress = "$Sender <$Email>";
    $Headers = "From: $SenderAddress\nCC: $SenderAddress\n";
    // Substitute your own email address for
    // recipient@example.com
    $result = mail("recipient@example.com", $Subject, $Message, $Headers);
    if ($result)
        echo "<p>Your message has been sent. Thank you, " . $Sender . ".</p>\n";
    else
        echo "<p>There was an error sending your message, " . $Sender . ".</p>\n";
}


print("</body>");
print("</html>");
