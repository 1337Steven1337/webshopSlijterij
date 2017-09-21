<?php
    include "include/include.php";

    var_dump(selectQuery("SELECT * FROM ?;", array("user")));