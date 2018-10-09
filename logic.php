<?php
session_start();

$hasErrors = false;

if (isset($_SESSION['results'])) {
    $quantity = $_SESSION['results']['quantity'];
    $unit = $_SESSION['results']['unit'];
    $foodName = $_SESSION['results']['foodName'];
    $nutrList = $_SESSION['nutrition'];

    $errors = $_SESSION['results']['errors'];
    $hasErrors = $_SESSION['results']['hasErrors'];
}

session_unset();