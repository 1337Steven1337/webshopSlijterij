<?php

function Query($query, $data = null)
{
    global $db;
    $db->query($query, $data);
    return true;
}

function selectQuery($query, $data = null)
{
    global $db;
    return $db->selectQuery($query, $data);
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function price_format($x)
{
    return number_format((float)$x, 2, '.', '');
}

function getLastId(){
    global $db;
    return $db->getLastId();
}