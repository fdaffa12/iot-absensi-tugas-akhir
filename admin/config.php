<?php
// Turn off error reporting
error_reporting(0);
session_start();
// Report runtime errors
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
//error_reporting(E_ALL);

// Report all errors except E_NOTICE
//error_reporting(E_ALL & ~E_NOTICE);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "absenrfid";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("<h1>Koneksi Database Gagal .!!! </h1>");
}
?>