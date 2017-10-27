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

function price_format($x)
{
    return number_format((float)$x, 2, '.', '');
}