<?php session_start(); ?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/header-nav-style.css">
    <link rel="stylesheet" type="text/css" href="public/css/statistics-style.css">
    <script src="https://kit.fontawesome.com/3d9e005fd2.js" crossorigin="anonymous"></script>
    <title>Twarzobaza</title>
</head>
<body>
    <div class="main-container">
        <?php include("header_nav.php"); ?>
        <main>
            <section class="statistics-form-container">
                <form class="statistics-form" action="statistics" method="POST">
                    <label for="user">Użytkownik</label>
                    <select name="account[]" class="user-select">
                        <option value="all">*</option>
                    <?php 
                        if (isset($accounts))
                            foreach($accounts as $account):
                    ?>
                        <option value="<?= $account['name'] ?>"><?= $account['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                    <label for="groupby">Grupuj według</label>
                    <select name="groupby[]" class="groupby-select">
                        <option value="year">Rok</option>
                        <option value="month">Miesiąc</option>
                        <option value="day">Dzień</option>
                        <option value="weekday">Dzień tygodnia</option>
                        <option value="hour">Godzina</option>
                        <option value="year_month">Rok Miesiąc</option>
                    </select>
                    <button><i class="fas fa-arrow-right"></i></button>
                </form>
            </section>
            <section class="results-container">
                <?php if (isset($results)): ?>
                <h1>Wyniki</h1>
                <div class="results-table-container">
                    <table>
                        <tr>
                        <?php foreach($columns as $column): ?>
                            <th><?= $column ?></th>
                        <?php endforeach; ?>
                        </tr>
                        <?php foreach($results as $row): ?>
                            <tr>
                                <?php foreach($row as $i): ?>
                                    <td><?= $i ?></td>
                                <?php endforeach; ?>
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