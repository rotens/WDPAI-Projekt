<?php session_start(); ?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/header-nav-style.css">
    <link rel="stylesheet" type="text/css" href="public/css/change-password-style.css">
    <script type="text/javascript" src="public/js/script.js" defer></script>
    <title>Twarzobaza - Zmień hasło</title>
</head>
<body>
    <div class="main-container">
        <header>
            <h1><a href="home">twarzobaza</a></h1>
        </header>
        <div class="change-password-form-container">
            <form class="change-password-form" action="changePassword" method="POST">
                <div class="form-header">
                    <h1>zmień hasło</h1>
                </div>

                <?php if (isset($message)):
                        if ($message == "Pomyślna zmiana hasła!"): 
                ?>
                        <p class="form-message-success"><?= $message ?></p>
                    <?php else: ?>
                        <p class="form-message-error"><?= $message ?></p>
                <?php endif; endif; ?>

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