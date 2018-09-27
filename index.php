require 'logic.php';

<!DOCTYPE html>
<html lang='en'>
<head>

    <title>Monty Hall Game</title>
    <meta charset='utf-8'>

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
          rel='stylesheet'
          integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
          crossorigin='anonymous'>

</head>
<body>

<h1>Monty Hall Game</h1>

<p> Imagine you're at a game show.<br> You are given the choice of three doors, one of which has a prize behind it.<br> You have already chosen Door 1, but there's a twist.<br> The game show host tells you Door 3 does not have a prize behind it and gives you the option to change your choice.<br>
</p>

<form method='GET' action='logic.php'>
    <fieldset class='radios'>
        <legend>Do you Switch or do you Stay?</legend>
        <ul class='radios'>
            <li><label><input type='radio'
                              name='choice'
                              value='switch' <?php if (isset($choice) and $choice == 'switch') echo 'checked' ?>>                                        Switch</label>
            <li><label><input type='radio'
                              name='choice'
                              value='stay' <?php if (isset($choice) and $choice == 'stay') echo 'checked' ?>>Stay</label>
        </ul>
    </fieldset>

    <input type='submit' value='Submit'>
</body>
</html>