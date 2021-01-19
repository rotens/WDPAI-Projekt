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

                   <?php if(isset($userInfo)): ?>
                        <h1><?= $userInfo['user_name'] ?></h1>
                        <p>Dołączył: <?= substr($userInfo['join_date'], 0, 10) ?></p>
                        <p><?= $userInfo['role_name'] ?></p>
                    <?php endif; ?>

                    <?php if(isset($accounts)):
                            $str = "Konta:";
                            foreach($accounts as $account)
                                $str = $str . ' ' . $account['name'] . ' (ID ' . $account['id'] . '),';
                            $str = rtrim($str, ',');
                    ?>
                        <p><?= $str ?></p>
                    <?php endif; ?>

                        <a href="change_password">Zmień hasło</a>
               </div>
               <div class="user-image">
                   <img src="public/img/<?=$_SESSION['user']?>.JPG">
               </div>
           </section>
        </main>
    </div>
</body>