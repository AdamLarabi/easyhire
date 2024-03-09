<?php
$conn = mysqli_connect("localhost", "root", "", "inscription");

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}
?>