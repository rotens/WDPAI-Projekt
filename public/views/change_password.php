<?php session_start(); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<head>
    
    <link rel="stylesheet" type="text/css" href="public/css/change-password-style.css">

    <title>Twarzobaza</title>
</head>
<body>
    <div class="main-container">
        <header>
            <h1>twarzobaza</h1>
        </header>
        <?php
            if (isset($messages))
                foreach($messages as $message)
                    echo $message;
        ?>
        <div class="change-password-form-container">
            <form class="change-password-form" action="change_password_func" method="POST">
                <div class="form-header">
                    <h1>zmień hasło</h1>
                </div>
                <div class="old-password-container">
                    <p>Stare hasło</p>
                    <input name="old_password" type="password" placeholder="Stare hasło">
                </div>
                <div class="new-password-container">
                    <p>Nowe hasło</p>
                    <input name="new_password" type="password" placeholder="Nowe hasło">
                </div>
                <div class="repeat-password-container">
                    <p>Powtórz hasło</p>
                    <input name="repeated_password" type="password" placeholder="Powtórz hasło">
                </div>
                <div class="button-container">
                    <button class="change-password-button" type="submit">zmień hasło</button>
                </div>
            </form>
        </div>
    </div>
</body>