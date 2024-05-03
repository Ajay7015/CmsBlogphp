<?php
    $servername = 'localhost';
     $username = 'root';
     $password = '';
     $database = 'cmsblog';

     $con = mysqli_connect($servername, $username, $password, $database);
     if(!$con) {
        die("Database is not connected!");
     }
?>