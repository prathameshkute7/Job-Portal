<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "apna_job");
if (!$conn) die("Connection failed!");
?>