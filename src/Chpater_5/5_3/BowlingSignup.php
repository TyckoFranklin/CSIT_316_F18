<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/15/2018
 * Time: 8:03 PM
 */


print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Bowling Signup</title>");
print("</head>");
print("<body>");

print("<h1>Bowling Signup</h1><hr />");

$goodToGo = true;

$first = '';
$last = '';
$age = '';
$average = '';

if (isset($_POST['first_name'])) {
    $first = addslashes($_POST['first_name']);
    $goodToGo &= true;
} else {
    $goodToGo &= false;
}

if (isset($_POST['last_name'])) {
    $last = addslashes($_POST['last_name']);
    $goodToGo &= true;
} else {
    $goodToGo &= false;
}

if (isset($_POST['age'])) {
    $age = addslashes($_POST['age']);
    if (is_numeric($age)) {
        $goodToGo &= true;
    } else {
        $goodToGo &= false;
    }
} else {
    $goodToGo &= false;
}

if (isset($_POST['average'])) {
    $average = addslashes($_POST['average']);
    if (is_numeric($average)) {
        $goodToGo &= true;
    } else {
        $goodToGo &= false;
    }

} else {
    $goodToGo &= false;
}

if (!$goodToGo) {
    $placeHolder = "Input Valid Value";
    print(<<<HTML
<h2>Enter your name to sign our guest book</h2>
<form method="POST">
<p>First Name <input type="text" name="first_name" value="$first" placeholder="$placeHolder"
/></p>
<p>Last Name <input type="text" name="last_name" value="$last" placeholder="$placeHolder"
/></p>
<p>Age <input type="text" name="age" value="$age" placeholder="$placeHolder"
/></p>
<p>Average <input type="text" name="average" value="$average" placeholder="$placeHolder"
/></p>
<p><input type="submit" value="Submit" /></p>
</form>
HTML
    );
}

print("<hr>");

$outputString = $first . ", " . $last . ", " . $age . ", " . $average . "\n";
$filepath = "signup.txt";
$signUp = fopen($filepath, "ab");
if (!is_readable("signup.txt")) {
    echo "<p>Cannot read from the file.</p>\n";
}
if ($goodToGo) {
    if (is_writeable($filepath)) {
        if (fwrite($signUp, $outputString)) {
            echo "<p>Thank you for signing up for the bowling tournament!</p>\n";
        } else {
            echo "<p>Cannot add your name to the guest book.</p>\n";
        }
    } else {
        echo "<p>Cannot write to the file.</p>\n";
    }
}
fclose($signUp);

if (file_exists($filepath)) {
    $content = file_get_contents($filepath);
} else {
    $content = "";
}

print("<div>Current Bowling Tournament Contestants<br>");
print("<pre>" . $content . "</pre>");
print("</div>");

print("</body>");
print("</html>");
