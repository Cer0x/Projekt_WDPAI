<!DOCTYPE html>
<meta charset="utf-8">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Outfit">
    <link rel="stylesheet" type="text/css" href="public/css/entries_style.css">
    <script src="https://kit.fontawesome.com/4417060088.js" crossorigin="anonymous"></script>
    <title>Wpisy</title>
</head>

<body>
    <div class="container">
        <nav class="navtop">
            <img src="public/img/logo.svg" alt="logo" class="logo">
            <div class="navbuttons">
                <a href="#">Wyloguj się</a>
            </div>
        </nav>

        <div class="main-container">
            <nav class="navleft">
                <ul>
                    <li>
                        <i class="fa-sharp fa-solid fa-notes-medical"></i>
                        <a href="entries.html" class="button">Wpisy</a>
                    </li>
                    <li>
                        <i class="fa-regular fa-map"></i>
                        <a href="map.php" class="button">Mapa</a>
                    </li>
                    <li>
                        <i class="fa-sharp fa-solid fa-medal"></i>
                        <a href="userstat.php" class="button">Status</a>
                    </li>
                </ul>
            </nav>

            <div class="entries-container">

                <div class="messages">
                    <h2>Następny raz możesz oddać krew w dniu</h2>
                    <h1>dd.mm.yyyy</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Data oddania</th>
                                <th>Ilość krwi</th>
                                <th>Notatki</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01.01.2022</td>
                                <td>450ml</td>
                                <td>+2 kropelki</td>
                            </tr>
                            <tr>
                                <td>01.01.2022</td>
                                <td>450ml</td>
                                <td>+2 kropelki</td>
                            </tr>
                            <tr>
                                <td>01.01.2022</td>
                                <td>450ml</td>
                                <td>+2 kropelki</td>
                            </tr>
                            <tr>
                                <td>01.01.2022</td>
                                <td>450ml</td>
                                <td>+2 kropelki</td>
                            </tr>
                            <tr>
                                <td>01.01.2022</td>
                                <td>450ml</td>
                                <td>+2 kropelki</td>
                            </tr>
                            <tr>
                                <td>01.03.2022</td>
                                <td>450ml</td>
                                <td>+2 kropelki</td>
                            </tr>
                            <tr>
                                <td>01.05.2022</td>
                                <td>450ml</td>
                                <td>+2 kropelki</td>
                            </tr>
                            <tr>
                                <td>01.07.2022</td>
                                <td>450ml</td>
                                <td>+2 kropelki, wymiana na kocyk</td>
                            </tr>
                            <tr>
                                <td>01.09.2022</td>
                                <td>450ml</td>
                                <td>+2 kropelki</td>
                            </tr>
                            <tr>
                                <td>01.11.2022</td>
                                <td>450ml</td>
                                <td>+2 kropelki</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="addEntry.html" class="addEntry">Dodawanie wpisu</a>
                </div>




            </div>

        </div>


        <footer>
            <p>Projekt na WDPAI</p>
        </footer>
</body>