<?php

$con = mysqli_connect("localhost", "root", "", "security");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>