<!DOCTYPE html>
<head>
    
    <link rel="stylesheet" type="text/css" href="public/css/login-style.css">

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
        <div class="login-form-container">
            <form class="login-form" action="login" method="POST">
                <div class="form-header">
                    <h1>logowanie</h1>
                </div>
                <div class="login-container">
                    <p>Login</p>
                    <input name="login" type="text" placeholder="Login">
                </div>
                <div class="password-container">
                    <p>Hasło</p>
                    <input name="password" type="password" placeholder="Hasło">
                </div>
                <div class="button-container">
                    <button class="login-button" type="submit">zaloguj</button>
                </div>
            </form>
        </div>
    </div>
</body>