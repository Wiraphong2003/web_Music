<?php
    $severname = "202.28.34.197";
    $username = "web65_64011212049";
    $password = "64011212049@csmsu";
    $dbname = "web65_64011212049";

    $conn = new mysqli($severname, $username, $password, $dbname);
    if($conn -> connect_error){
        die("Connetion Error : " . $conn -> connect_error);
    }
?>