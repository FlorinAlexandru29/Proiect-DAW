<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
    <link href="resurse/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="resurse/bootstrap/bootstrap.bundle.js"></script>
    <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); </style>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>

<?php 

if (!empty($_POST['g-recaptcha-response'])) echo "a fost verificat";
else echo "nu a fost verificat" ; ?>

<form method="POST" action="test_capcha.php">
<div class="g-recaptcha" data-sitekey="6LfOjQokAAAAAJIjhHG_T8qMmsB_RxCB0jFVzu6W"></div>
<input type="submit">
</form>