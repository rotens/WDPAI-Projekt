<?php session_start(); ?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/header-nav-style.css">
    <link rel="stylesheet" type="text/css" href="public/css/user-style.css">
    <script src="https://kit.fontawesome.com/3d9e005fd2.js" crossorigin="anonymous"></script>
    <title>Twarzobaza</title>
</head>
<body>
    <div class="main-container">
        <?php include("header_nav.php"); ?>
        <main>
           <section class="user-info-container">
               <div class="user-info">
                    <h1>Piotr Sobczak</h1>
                    <p>Dołączył: 2017-09-21</p>
                    <p>Pełne uprawnienia</p>
                    <p>Konta: Piotr Sobczak (ID 10), Piotr Sobczak (ID 12)</p>
                    <a href="change_password">Zmień hasło</a>
               </div>
               <div class="user-image">
                   <img src="public/img/sobczak.JPG">
               </div>
           </section>
        </main>
    </div>
</body>