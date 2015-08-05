<?php
session_start();

echo "Ime i prezime" . $_SESSION["imeprezime"] . ".<br>";
echo "Kid " . $_SESSION["kid"] . ".";
?>