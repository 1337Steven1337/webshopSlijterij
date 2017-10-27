<?php

    include "../include/include.php";

    session_destroy();

    header("location: ../index.php");