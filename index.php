<?php
require 'helpers.php';
require 'logic.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>

    <title>Monty Hall Game</title>
    <meta charset='utf-8'>

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
          rel='stylesheet'
          integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
          crossorigin='anonymous'>

    <link href='/style/app.css' rel='stylesheet'>

</head>
<body>

<div class='container'>

    <h1>Monty Hall Game Show</h1>
    <table>
        <thead>
        <tr>
            <td><img src='images/door.png' alt='Door 1'></td>
            <td><img src='images/door.png' alt='Door 2'></td>
            <td><img src='images/door.png' alt='Door 3'></td>
        </tr>

        </thead>
        <tbody>
        <tr>
            <th>Door 1</th>
            <th>Door 2</th>
            <th>Door 3</th>
        </tr>
        </tbody>
    </table>

    <p>
        Imagine you're at a game show.
        You are given the choice of three doors, one of which has a prize behind it.
        You have already chosen Door 1, but there's a twist.
        The game show host tells you Door 3 does not have a prize behind it and gives you the option to change your choice.
        Do you have a better chance choosing the prize door by changing your choice, or staying?
        What if you are given the same choice many times?
        How many times do you think you'd choose the prize door making the same choice?
    </p>

    <form method='GET' action='process.php'>
        <fieldset class='radios'>
            <div class='row'>
                <div class='col-15'>
                    <label>Do you Change or do you Stay?</label>
                </div>
                <div class='col-15'>
                    <label>
                        <input type='radio'
                               name='type'
                               value='change' <?php if (isset($type) and $type == 'change') echo 'checked' ?>> Change
                    </label>
                </div>
            </div>
            <div class='row'>
                <div class='col-15'></div>
                <div class='col-15'>
                    <label>
                        <input type='radio'
                               name='type'
                               value='stay' <?php if (isset($type) and $type == 'stay') echo 'checked' ?>> Stay
                    </label>
                </div>
            </div>
        </fieldset>

        <div class='row'>
            <div class='col-15'>
                <label>Choose how many times to repeat this same choice:</label>
            </div>
            <div class='col-15'>
                <select name='repetitions' id='repetitions'>
                    <option value='choose'>Choose one...</option>
                    <option value='50'<?php if (isset($repetitions) and $repetitions == '50') echo 'selected' ?>>50</option>
                    <option value='100' <?php if (isset($repetitions) and $repetitions == '100') echo 'selected'; ?>>100</option>
                    <option value='500' <?php if (isset($repetitions) and $repetitions == '500') echo 'selected' ?>>500</option>
                    <option value='1000' <?php if (isset($repetitions) and $repetitions == '1000') echo 'selected' ?>>1000</option>
                </select>
            </div>
        </div>

        <div class='row'>
            <div class='col-15'>
                <label>Guess how many times the same choice would be right, any number 1 - 999:</label>
            </div>
            <div class='col-15'>
                <input type='text' name='guess' size='4' value='<?= $guess ?? ' ' ?>'>
            </div>
        </div>

        <input type='submit' class='submit' value='Get Answer'>

        <?php if ($hasErrors): ?>
            <div class='alert alert-danger'>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>

                    <?php endforeach; ?>
                </ul>
            </div>

        <?php else: ?>
            <?php if (isset($results)): ?>
                <div class='alert alert-success' role='alert'>
                    By making the choice to <strong><?= $type ?></strong> you would have chosen the prize door
                    <strong><?= $num_correct ?></strong> times out of <strong><?= $repetitions ?></strong> chances, or
                    <strong><?= $percentage ?>%</strong>.
                </div>
                <div class='alert alert-primary' role='alert'>
                    You guessed <strong><?= $guess ?></strong>. <?= $response ?>
                </div>
                <div class='alert alert-warning' role='alert'>
                    Try changing your choices and see what results you get! To learn more about the Monty Hall
                    problem click <a target='_blank' href='https://en.wikipedia.org/wiki/Monty_Hall_problem'>here</a>.
                </div>
            <?php endif ?>
        <?php endif ?>
    </form>
</div>
</body>
</html>