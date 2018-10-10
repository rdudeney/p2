<?php

/*
 * This the script the form on index.php submits to
 * It's job is to
 * 1. Get the data from the form request
 * 2. Load a Calculate object, and utilize class functions to confirm results
 * 3. Store the results in the SESSION
 * 4. Redirect user back to index.php
 *
 */
require 'Calculate.php';
require 'helpers.php';
require 'Form.php';

use P2\Calculate;
use DWA\Form;

# Initiate the session in order to get the data
session_start();

# Instantiate new Form object
$form = new Form($_GET);

#Get the data
$type = $form->get('type');
$repetitions = $form->get('repetitions');
$guess = $form->get('guess');

# Validate the form data
$errors = $form->validate([
    'type' => 'required',
    'repetitions' => 'required|digit',
    'guess' => 'required|digit|minLength:1|maxLength:4'
]);

if (!$form->hasErrors) {
    # Instantiate new Calculate object
    $calc = new Calculate($type);

    $num_correct = $calc->calculate($repetitions); // Based on data, calculate number of prize doors
    $percentage = ($num_correct / $repetitions) * 100; // Calculate prize doors as a percentage
    $response = $calc->respond($guess, $num_correct); // Confirm response based on user guess
}

# Store results data in the SESSION
$_SESSION['results'] =
    [
        'errors' => $errors,
        'hasErrors' => $form->hasErrors,
        'type' => $type,
        'repetitions' => $repetitions,
        'guess' => $guess,
        'num_correct' => $num_correct,
        'percentage' => $percentage,
        'response' => $response,
    ];

# Redirect back to the form on index.php
header('Location: index.php');



