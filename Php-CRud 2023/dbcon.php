<?php

$con = mysqli_connect("localhost", "root", "", "blog");

if(!$con){
    die('Connection Failed'.mysql_connect_error());
}

?>