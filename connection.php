<?php

    $dbhost = "localhost";
    $dbuser = "cmicu";
    $dbpass = "S9Qb7uqG";
    $db = "cmicu";
    if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$db))
    {
        die("failed to connect!");
    }
?>