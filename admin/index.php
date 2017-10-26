<?php
    include "include/include.php";
    include "include/parts/header.php";

    if(isset($_SESSION["adminId"])) {
        include "include/parts/nav.php";
        include "include/parts/home.php";
    }else{

    }
    include "include/parts/footer.php";