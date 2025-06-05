<?php

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $name = $_POST["fname"] ?? "?";
    echo "Welcome! $name";
}