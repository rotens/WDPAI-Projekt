<?php session_start(); ?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/header-nav-style.css">
    <link rel="stylesheet" type="text/css" href="public/css/search-style.css">
    <script src="https://kit.fontawesome.com/3d9e005fd2.js" crossorigin="anonymous"></script>
    <title>Twarzobaza</title>
</head>
<body>
    <div class="main-container">
        <?php include("header_nav.php"); ?>
        <main>
            <section class="search-form-container">
                <form class="search-form" action="search" method="POST">
                    <label for="user">Użytkownik</label>
                    <select name="Account[]" class="user-select">
                    <option value="all">*</option>
                    <?php 
                        if (isset($accounts))
                            foreach($accounts as $account):
                    ?>
                        <option value="<?= $account['name'] ?>"><?= $account['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                    <p class="date-input-text">Data (format RRRR-MM-DD GG:MM:SS)</p>
                    <input name="from" type="text" placeholder="Od">
                    <input name="to" type="text" placeholder="Do">
                    <p class="search-input-text">Szukana fraza</p>
                    <div class="search-input-container">
                        <input name="search_input" type="text" placeholder="Szukaj">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </section>
            <section class="results-container">
                <?php if (isset($messages)): ?>
                <h1>Wyniki wyszukiwania</h1>
                <div class="results-table-container">
                    <table>
                        <tr>
                            <th>Użytkownik</th>
                            <th>Data</th>
                            <th>Treść wiadomości</th>
                        </tr>
                    <?php foreach($messages as $message): ?>
                        <tr>
                            <td><?= $message->getAccountName() ?></td>
                            <td><?= $message->getDate() ?></td>
                            <td><?= $message->getContent() ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </section>
            <br><br>
        </main>
    </div>
</body>
