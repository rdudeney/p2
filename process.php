<?php
    require 'Calculate.php';
    require 'helpers.php';
    require 'Form.php';

    use P2\Calculate;
    use DWA\Form;

    session_start();

    # Instantiate new Form object
    $form = new Form($_GET);

    #Get the data
    $type = $form->get('type');
    $repetitions = $form->get('repetitions');
    $guess = $form->get('guess');

    $errors = $form->validate([
        'type' => 'required',
        'repetitions' => 'required',
        'guess' => 'required|digit|minLength:1|maxLength:3'
    ]);

    if (!$form->hasErrors)
    {
        # Instantiate new Calculate object
        $calc = new Calculate($type);

        $num_correct = $calc->calculate($repetitions);
        $percentage = ($num_correct / $repetitions) * 100;
    }

    $_SESSION['results'] =
    [
        'errors' => $errors,
        'hasErrors' => $form->hasErrors,
        'type' => $type,
        'repetitions' => $repetitions,
        'guess' => $guess,
        'num_correct' => $num_correct,
        'percentage' => $percentage,
    ];

    header('Location: index.php');



