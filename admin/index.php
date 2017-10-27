<?php
    include "include/include.php";
    include "include/parts/header.php";

    if(isset($_SESSION["adminId"])) {
        include "include/parts/nav.php";
        include "include/parts/home.php";
        include "include/parts/products.php";
    }else{
        include "include/parts/login.php";
    }
    include "include/parts/footer.php";