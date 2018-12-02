<?php
    function debug_to_console($data) 
    {//really hard to debug quick trick to send output to apache error log
         file_put_contents('php://stderr', print_r($data, TRUE));
    }
    
    class Emp 
    {
        public $fname = "";
        public $lname  = "";
    } 
    
    $e = new Emp();
    $data_back = file_get_contents('php://input');//gets data from stdin
    $json=json_decode($data_back);
    $e->fname=$json->fname;//+" from server";
    $e->lname=$json->lname;//+" from server";
    
    $e->fname=$e->fname.' from server';
    $e->lname=$e->lname.' from server';
    debug_to_console($json);    
    // set header as json
    header("Content-type: application/json");
    header("Cache-Control: no-cache");
   
    echo json_encode($e);   
?>
