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
                <?php if($_SESSION['isAdmin'] == 1) echo '<a href="register">Rejestracja (ADMIN)</a>'?>
                <a href="logout">Wyloguj się</a>
            </div>
        </nav>

        <div class="main-container">
            <nav class="navleft">
                <ul>
                    <li>
                        <i class="fa-sharp fa-solid fa-notes-medical"></i>
                        <a href="entries" class="button">Wpisy</a>
                    </li>
                    <li>
                        <i class="fa-regular fa-map"></i>
                        <a href="map" class="button">Mapa</a>
                    </li>
                    <li>
                        <i class="fa-sharp fa-solid fa-medal"></i>
                        <a href="userstat" class="button">Status</a>
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
                        <?php


                        foreach ($entries as $entry):{

                        }
                        ?>
                            <tr>
                                <td><?= $entry->getDateOfEntry(); ?></td>
                                <td><?= $entry->getBloodAmount(); ?></td>
                                <td><?= $entry->getNotes();?></td>
                            </tr>
                        <?php
                            endforeach;
                        ?>
                        </tbody>
                    </table>
                    <a href="addEntry" class="addEntry">Dodawanie wpisu</a>
                </div>




            </div>

        </div>


        <footer>
            <p>Projekt na WDPAI</p>
        </footer>
</body>