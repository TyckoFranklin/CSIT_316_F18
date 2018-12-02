<?php

class Emp
{
    public $fname = "";
    public $lname = "";
    public $organization = "CBC";
}

$employeeArray = [];
$data_back = file_get_contents('php://input');//gets data from stdin
$json = json_decode($data_back);
foreach ($json as $key => $value) {
    $e = new Emp();
    $e->fname = $value->fname . ' from server';
    $e->lname = $value->lname . ' from server';
    array_push($employeeArray, $e);
}

header("Content-type: application/json");
header("Cache-Control: no-cache");

$jsonToSend = json_encode($employeeArray);
echo $jsonToSend;