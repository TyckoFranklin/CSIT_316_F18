<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/8/2018
 * Time: 9:11 PM
 */


/**
 * outputs the key/value pairs in the $_Request global
 */
function printRequestToTable()
{
    /* if there are no items in the request, don't display anything */
    if(sizeof($_REQUEST) === 0){
        return;
    }
    print("<table>");
    print("<tr><th>Request Key</th><th>Request Value</th></tr>");
    foreach ($_REQUEST as $requestKey => $requestValue){
        $requestKeyClean = cleanupOutput($requestKey);
        $requestValueClean = cleanupOutput($requestValue);
        print("<tr><td>$requestKeyClean</td><td>$requestValueClean</td></tr>");
    }
    print("</table>");
}

/**
 * Cleans up the string so it will be HTML compliant
 * @param string $stringToClean
 * @return string
 */
function cleanupOutput($stringToClean)
{
    return htmlentities(stripcslashes($stringToClean));
}