<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 10/16/2018
 * Time: 10:03 PM
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
            "description" => '',
            "image" => '',
        ];
    }
    $content = explode(DELIMITER, $content);
    return [
        "filename" => $fileName,
        "name" => $content[0],
        "description" => $content[1],
        "image" => str_replace("txt", "png", $fileName),

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
function getBugReports()
{
    $list = listFiles();
    $result = [];
    foreach ($list as $file) {
        array_push($result, readAndParseFile($file));
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
        $output["description"];

    $result = file_put_contents(STORAGE . $fileName . ".txt", $outputString) > 0 ? true : false;
    $result &= move_uploaded_file($_FILES["image"]["tmp_name"], STORAGE . $fileName . ".png") > 0 ? true : false;
    if ($result) {
        print("<p>The image has been uploaded!</p>");
    } else {
        print("<p>There was an issue with uploading the image.</p>");
    }
}
