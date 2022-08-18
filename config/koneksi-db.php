<?php

    $hostname   = "localhost";
    $user       = "root";
    $password   = "";
    $db_name    = "db_perpus_vsga";

    $db_conn = mysqli_connect($hostname, $user, $password, $db_name);

    if(!$db_conn){
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }

?>
