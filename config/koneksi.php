<?php
$serverName = "localhost";
$userName   = "root";
$password   = "";
$database   = "praktikom";

$koneksi = new mysqli($serverName, $userName, $password, $database);

if ($koneksi->connect_error) {
    die("❌ Koneksi gagal: " . $koneksi->connect_error);
}

return $koneksi; // Return the connection
?>