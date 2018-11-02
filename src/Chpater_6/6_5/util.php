<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 11/2/2018
 * Time: 2:03 AM
 */

function saveToFile($output)
{
    /*  get the current time in miliseconds and use that  */
    $filename = "OnlineOrders/" . str_replace(".", "", microtime(true)) . ".txt";
    if (file_put_contents($filename, $output)) {
        print("<p>The order was saved.</p>");
    } else {
        print("<p>There was an issue saving the order.</p>");
    }
}