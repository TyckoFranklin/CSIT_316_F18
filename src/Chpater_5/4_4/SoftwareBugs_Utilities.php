<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/15/2018
 * Time: 8:03 PM
 */

CONST DELIMITER = "|..--..|";
Const STORAGE = "./storage/";
/**
 * Reads a file and parses its content
 * @param $fileName
 * @return string[]
 */
function readAndParseFile($fileName)
{
    if (file_exists(STORAGE . $fileName)) {
        $content = file_get_contents(STORAGE . $fileName);
    } else {
        $content = [
            "filename" => $fileName,
            "name" => '',
            "version" => '',
            "hardware" => '',
            "system" => '',
            "frequency" => '',
            "solutions" => '',
        ];
    }
    $content = explode (DELIMITER, $content);
    return [
        "filename" => $fileName,
        "name" => $content[0],
        "version" => $content[1],
        "hardware" => $content[2],
        "system" => $content[3],
        "frequency" => $content[4],
        "solutions" => $content[5],
    ];
}

/**
 * Finds all the .txt files in the directory and returns them in an array
 * @return string[]
 */
function listFiles()
{
    $filesFolders = scandir(STORAGE);
    $result = [];
    foreach ($filesFolders as $file) {
        if (preg_match("/txt$/", $file)) {
            array_push($result, $file);
        }
    }
    return $result;
}

/**
 * Gets the list of .txt files then reads and parses each one and returns the resulting array.
 * @return string[][]
 */
function getBugReports(){
    $list = listFiles();
    $result = [];
    foreach ($list as $file){
        array_push($result,readAndParseFile($file));
    }
    return $result;
}

/**
 * Outputs a bug report to a file
 * @param string[] $output
 * @param string $fileName
 */
function output($output, $fileName)
{
    $outputString = $output["name"] . DELIMITER .
        $output["version"] . DELIMITER .
        $output["hardware"] . DELIMITER .
        $output["system"] . DELIMITER .
        $output["frequency"] . DELIMITER .
        $output["solutions"];

    if (file_put_contents(STORAGE . $fileName, $outputString)) {
        print("<p>The bug report has been updated.</p>");
    } else {
        print("<p>There was an issue updating the bug report.</p>");
    }
}
