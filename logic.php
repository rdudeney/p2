<?php
session_start();

$hasErrors = false;

if(isset($_SESSION['results']))
{
    $results = $_SESSION['results'];

    $type = $results['type'];
    $repetitions = $results['repetitions'];
    $guess = $results['guess'];
    $percentage = $results['percentage'];

    $errors = $results['errors'];
    $hasErrors = $results['hasErrors'];
}

session_unset();

