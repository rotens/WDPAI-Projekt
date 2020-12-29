<?php session_start(); ?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/search-style.css">
    <script src="https://kit.fontawesome.com/3d9e005fd2.js" crossorigin="anonymous"></script>
    <title>Twarzobaza</title>
</head>
<body>
    <div class="main-container">
        <header>
            <h1>twarzobaza</h1>
        </header>
        <nav>
            <ul>
                <li>
                    <i class="fas fa-home"></i>
                    <a href="home">strona główna</a>
                </li>
                <li>
                    <i class="fas fa-user"></i>
                    <a href="user">konto użytkownika</a>
                </li>
                <li>
                    <i class="fas fa-search"></i>
                    <a href="search">wyszukaj w bazie</a>
                </li>
                <li>
                    <i class="fas fa-chart-bar"></i>
                    <a href="statistics">statystyki</a>
                </li>
                <li>
                    <i class="fas fa-sign-out-alt"></i>
                    <a href="login">wyloguj</a>
                </li>
            </ul>
        </nav>
        <main>
            <section class="search-form-container">
                <form class="search-form">
                    <label for="user">Użytkownik</label>
                    <select name="user" class="user-select">
                        <option value="jr">Joachim Rotenschwanz</option>
                        <option value="rk">Radosław Kuczniewicz</option>
                        <option value="rm">Robert Modlirzycki</option>
                        <option value="kk">Karol Karolewski</option>
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
                <h1>Wyniki wyszukiwania</h1>
                <div class="results-table-container">
                    <table>
                        <tr>
                            <th>Użytkownik</th>
                            <th>Data</th>
                            <th>Treść wiadomości</th>
                        </tr>
                        <tr>
                            <td>Przykładowy użytkownik</td>
                            <td>2020-11-10 19:01:21</td>
                            <td>Lorem ipsum dolor sit amet, consectetur...</td>
                        </tr>
                        <tr>
                            <td>Przykładowy użytkownik</td>
                            <td>2020-11-10 19:01:21</td>
                            <td>Lorem ipsum dolor sit amet, consectetur...</td>
                        </tr>
                        <tr>
                            <td>Przykładowy użytkownik</td>
                            <td>2020-11-10 19:01:21</td>
                            <td>Lorem ipsum dolor sit amet, consectetur...</td>
                        </tr>
                        <tr>
                            <td>Przykładowy użytkownik</td>
                            <td>2020-11-10 19:01:21</td>
                            <td>Lorem ipsum dolor sit amet, consectetur...</td>
                        </tr>
                        <tr>
                            <td>Przykładowy użytkownik</td>
                            <td>2020-11-10 19:01:21</td>
                            <td>Lorem ipsum dolor sit amet, consectetur...</td>
                        </tr>
                        <tr>
                            <td>Przykładowy użytkownik</td>
                            <td>2020-11-10 19:01:21</td>
                            <td>Lorem ipsum dolor sit amet, consectetur...</td>
                        </tr>
                        <tr>
                            <td>Przykładowy użytkownik</td>
                            <td>2020-11-10 19:01:21</td>
                            <td>Lorem ipsum dolor sit amet, consectetur...</td>
                        </tr>
                        <tr>
                            <td>Przykładowy użytkownik</td>
                            <td>2020-11-10 19:01:21</td>
                            <td>Lorem ipsum dolor sit amet, consectetur...</td>
                        </tr>
                        <tr>
                            <td>Przykładowy użytkownik</td>
                            <td>2020-11-10 19:01:21</td>
                            <td>Lorem ipsum dolor sit amet, consectetur...</td>
                        </tr>
                        <tr>
                            <td>Przykładowy użytkownik</td>
                            <td>2020-11-10 19:01:21</td>
                            <td>Lorem ipsum dolor sit amet, consectetur...</td>
                        </tr>
                    </table>
                </div>
            </section>
            <br><br>
        </main>
    </div>
</body>