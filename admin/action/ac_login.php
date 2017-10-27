<?php

    /*
     * This file is used to login the admin
     */

    include "../include/include.php";

    //get post values
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = selectQuery("SELECT password, salt, id FROM admin WHERE username=?", array($username));

    $hash = $user[0][0];
    $salt = $user[0][1];
    $adminId = $user[0][2];

    $inHash = md5($password.$salt);

    if($inHash == $hash){
        $_SESSION["adminId"] = $adminId;
    }

    header("location: ../index.php");