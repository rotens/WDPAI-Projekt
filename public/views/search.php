<?php session_start(); ?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/header-nav-style.css">
    <link rel="stylesheet" type="text/css" href="public/css/search-style.css">
    <script src="https://kit.fontawesome.com/3d9e005fd2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/search.js" defer></script>
    <script type="text/javascript" src="public/js/search-validation.js" defer></script>
    <title>Twarzobaza</title>
</head>
<body>
    <div class="main-container">
        <?php include("header_nav.php"); ?>
        <main>
            <section class="search-form-container">
                <form class="search-form">
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
                        <button type="button"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </section>
            <section class="results-container">
                <h1></h1>
                <div class="results-table-container">
                    <table>
                    </table>
                </div>
            </section>
            <br><br>
        </main>
    </div>
</body>

<template id="table-header-template">
    <tr>
        <th>Użytkownik</th>
        <th>Data</th>
        <th>Treść wiadomości</th>
    </tr>
</template>

<template id="message-template">
    <tr>
        <td>Użytkownik</td>
        <td>Data</td>
        <td>Treść wiadomości</td>
    </tr>
</template>


