<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 11/1/2018
 * Time: 11:22 PM
 */


print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>European Travel</title>");
print("</head>");
print("<body>");

print("<h1>European Travel</h1><hr />");

$Distances = [
    "Berlin" => [
        "Berlin" => 0,
        "Moscow" => 1607.99,
        "Paris" => 876.96,
        "Prague" => 280.34,
        "Rome" => 1181.67,
    ],
    "Moscow" => [
        "Berlin" => 1607.99,
        "Moscow" => 0,
        "Paris" => 2484.92,
        "Prague" => 1664.04,
        "Rome" => 2374.26,
    ],
    "Paris" => [
        "Berlin" => 876.96,
        "Moscow" => 641.31,
        "Paris" => 0,
        "Prague" => 885.38,
        "Rome" => 1105.76,
    ],
    "Prague" => [
        "Berlin" => 280.34,
        "Moscow" => 1664.04,
        "Paris" => 885.38,
        "Prague" => 0,
        "Rome" => 922,
    ],
    "Rome" => [
        "Berlin" => 1181.67,
        "Moscow" => 2374.26,
        "Paris" => 1105.76,
        "Prague" => 922,
        "Rome" => 0,
    ],
];
$KMtoMiles = 0.62;

/*  set default selected since the book failed me on this.  */
$StartIndex = "Berlin";
$EndIndex = "Rome";

if (isset($_POST['submit'])) {
    $StartIndex = stripslashes($_POST['Start']);
    $EndIndex = stripslashes($_POST['End']);
    if (isset(
        $Distances[$StartIndex][$EndIndex]))
        echo "<p>The distance from $StartIndex to $EndIndex is "
            . $Distances[$StartIndex][$EndIndex]
            . " kilometers, or "
            . round(($KMtoMiles * $Distances[$StartIndex][$EndIndex]), 2)
            . " miles.</p>\n";
    else
        echo "<p>The distance from $StartIndex to $EndIndex is not in the array.</p>\n";
}

/*  Get the options html output strings ready  */
$startString = "";
$endString = "";

/*  Book had these as two loops mixed in with the html. This is non-sense.
    keeping them both in one loop, then using an heredoc to output them */
foreach ($Distances as $City => $OtherCities) {
    $startString .= "<option value='$City'";
    if (strcmp($StartIndex, $City) == 0)
        $startString .= " selected";
    $startString .= ">$City</option>\n";

    $endString .= "<option value='$City'";
    if (strcmp($EndIndex, $City) == 0)
        $endString .= " selected";
    $endString .= ">$City</option>\n";
}

/*  use the option output strings in heredoc  */
print(<<<HTMLOUTPUT
<form action="EuropeanTravel.php" method="post">
<p>Starting City: <select name="Start">$startString</select></p>
<p>Ending City:<select name="End">$endString</select></p>
<p><input type="submit" name="submit" value="Calculate Distance" /></p>
</form>


HTMLOUTPUT
);


print("</body>");
print("</html>");
