<?php


function requireval($input){
    if (empty($input)){
        return false;
    }
    return true;

}

function minval($input,$leanth){
    if (strlen($input)<$leanth){
        return false;
    }
    return true;

}

function maxval($input,$leanth){
    if (strlen($input)>$leanth){
        return false;
    }
    return true;

}

function emailval($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return false;
    }
    return true;
}