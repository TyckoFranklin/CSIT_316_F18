<?php
/**
 * Created by PhpStorm.
 * User: TyckoFranklin
 * Date: 11/1/2018
 * Time: 11:41 PM
 */
CONST TOKEN = "__||**##**||__";

function parseLines($entries){
    foreach($entries as $key => &$value){
        $value = explode(TOKEN,str_replace("\n","",$value));
    }
    return $entries;
}

function prepareEntriesToBeWritten($entries){
    $result = "";
    foreach($entries as $key => $value){
        $result .=  implode(TOKEN,$value) . "\n";
    }
    return $result;
}

function prepareSingleEntryToBeWritten($entry){
    return implode(TOKEN,$entry) . "\n";
}