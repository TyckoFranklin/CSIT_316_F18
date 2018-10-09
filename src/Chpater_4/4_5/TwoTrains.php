<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/8/2018
 * Time: 10:36 PM
 */


/* Really silly to not have the first page be a .php as well. */
print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Two Trains</title>");
print("</head>");
print("<body>");

/**
 * Check for errors in the post request
 * @throws Exception
 */
function checkForErrors()
{
    $errors = [];
    /* Check if inputs have been entered, and that they are numbers  */
    if (!isset($_POST['TrainA']) || is_numeric($_POST['TrainA']) === false) {
        array_push($errors, "Please Enter a Valid Speed Value For Train A<br>");
    }
    if (!isset($_POST['TrainB']) || is_numeric($_POST['TrainB']) === false) {
        array_push($errors, "Please Enter a Valid Speed Value For Train B<br>");
    }
    if (!isset($_POST['Distance']) || is_numeric($_POST['Distance']) === false) {
        array_push($errors, "Please Enter a Valid distance<br>");
    }
    /*  If there are not errors, print the wages. If there are errors, print the errors */
    if (sizeof($errors) === 0) {
        displayCalculation();
    } else {
        foreach ($errors as $error) {
            print($error);
        }
    }
}

/**
 * Calculate the information from the data and display it.
 * @throws Exception
 */
function displayCalculation()
{
    /*  Perform the calculations from the book */
    $SpeedA = floatval($_POST["TrainA"]);
    $SpeedB = floatval($_POST["TrainB"]);
    $Distance = floatval($_POST["Distance"]);

    $DistanceA = (($SpeedA / $SpeedB) * $Distance) / (1 + ($SpeedA / $SpeedB));
    $DistanceB = $Distance - $DistanceA;
    $TimeA = $DistanceA / $SpeedA;
    $TimeB = $DistanceB / $SpeedB;

    /*  Round to 2 decimal places */
    $Time = round($TimeA, 2);
    $DistanceA = round($DistanceA,2);
    $DistanceB = round($DistanceB,2);

    /*  If these two don't equal each other, there's an issue  */
    if (strcmp($TimeA, $TimeB) != 0) {
        throw new \Exception("There was an error in the calculations");
    }

    /*  Output our information!  */
    print("<h2>Trains Time and Distance Traveled to Reach Each Other:</h2><hr>");
    print("<div>Train A Was Traveling $SpeedA MPH for $Time Hours and Traveled $DistanceA Miles Before Reaching Train B</div>");
    print("<div>Train B Was Traveling $SpeedB MPH for $Time Hours and Traveled $DistanceB Miles Before Reaching Train A</div>");
    print("<div>Train A and Train B Traveled a Total of $Distance Miles</div>");
    print("<hr>");
}

/** @var string $trainA */
$trainA = "";
/** @var string $trainB */
$trainB = "";
/** @var string $trainB */
$distance = "";

/*  Only check for errors if the page has been posted.  */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    checkForErrors();
    $trainA = $_POST["TrainA"];
    $trainB = $_POST["TrainB"];
    $distance = $_POST["Distance"];
}

/*  Let's here doc it up in here!!! */
print(<<<HEREDOC
    <form method="post">
    <span style="padding: 52px;">Train A Speed MPH:</span><input type="text" name="TrainA" value="{$trainA}"/><br />
    <span style="padding: 53px;">Train B Speed MPH:</span><input type="text" name="TrainB" value="{$trainB}" /><br />
    <span style="padding: 15px;">Distance (Miles) Between Trains</span><input type="text" name="Distance" value="{$distance}" /><br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Submit" value="Calculate!" />
</form>
HEREDOC
);


print("</body></html>");