<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/8/2018
 * Time: 9:37 PM
 */

/* Really silly to not have the first page be a .php as well. */
print("<!DOCTYPE html  PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>");
print("<html lang='en'>");
print("<head>");
print("    <meta charset='UTF-8'>");
print("    <title>Pay</title>");
print("</head>");
print("<body>");

/**
 * @param string[] &$errors
 */
function checkForErrors(&$errors){
    /* Check if inputs have been entered, and that they are numbers  */
    if(!isset($_POST['Hours']) || is_numeric($_POST['Hours']) === false){
        array_push($errors,"Please Enter a Valid Amount of Hours<br>");
    }
    if(!isset($_POST['Wage']) || is_numeric($_POST['Wage']) === false){
        array_push($errors,"Please Enter a Valid Wage<br>");
    }
    /*  If there are not errors, print the wages. If there are errors, print the errors */
    if(sizeof($errors) === 0){
        displayPay();
    } else {
        foreach ($errors as $error){
            print($error);
        }
    }
}

/**
 * Displays the pay calculations.
 */
function displayPay(){
    /*  get the variables  */
    $hours = floatval($_POST["Hours"]);
    $wage = floatval($_POST["Wage"]);
    /*  Calculate the pay based on if there is over time or not  */
    $pay = null;
    if($hours > 40){
        $pay = 40 * $wage;
        $pay += ($hours - 40) * $wage * 1.5;
    } else {
        $pay = $hours * $wage;
    }

    /*  Display the results  */
    print("<h2>Wages:</h2><hr>");
    print("<div>\$$pay</div><hr>");
}
/*  pass in the errors array so we can deal with it later  */
/** @var string[] $errors */
$errors = [];
checkForErrors($errors);

/* if there are errors, display the forms again with the values that were entered */
if(sizeof($errors) != 0){
    /*  Let's here doc it up in here!!! */
    print(<<<HEREDOC
    <form action="Paycheck.php"  method="post">
    <span style="padding: 8px;">Hours Worked:</span><input type="text" name="Hours" value="{$_POST["Hours"]}"/><br />
    <span style="padding: 12px;">Hourly Wage:</span><input type="text" name="Wage" value="{$_POST["Wage"]}" /><br />
    &nbsp;<input type="submit" name="Submit" value="Calculate!" />
</form>
HEREDOC
    );
}


print("</body></html>");