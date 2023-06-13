<!DOCTYPE html>
<meta charset="utf-8">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Outfit">
    <link rel="stylesheet" type="text/css" href="public/css/userstat_style.css">
    <script src="https://kit.fontawesome.com/4417060088.js" crossorigin="anonymous"></script>
    <title>Status</title>
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

            <div class="stat-container">


                <div class="stat-bg">

                    <p><?php

                        if (isset($stat)){
                            switch ($stat){
                                case $stat >= 6000:
                                    echo '
                                          <h2 id="user_stat">Stopień zasłużonego Dawcy:</h2>
                                          <h3>3 STOPIEŃ</h3>
                                          <i class="fa-sharp fa-solid fa-medal" style="font-size: 10em; color: #b08d57;"></i>';
                                    break;
                                case $stat >= 12000:
                                    echo '
                                          <h2 id="user_stat">Stopień zasłużonego Dawcy:</h2>
                                          <h3>2 STOPIEŃ</h3>
                                          <i class="fa-sharp fa-solid fa-medal" style="font-size: 10em; color: silver;"></i>';
                                    break;
                                case $stat >= 18000:
                                    echo '
                                          <h2 id="user_stat">Stopień zasłużonego Dawcy:</h2>
                                          <h3>1 STOPIEŃ</h3>
                                          <i class="fa-sharp fa-solid fa-medal" style="font-size: 10em; color: gold;"></i>';
                                    break;

                            }
                            echo "<h3>Oddałeś $stat ml krwi.</h3>";
                            if($stat < 6000){
                                echo "<h4> Oddaj więcej litrów, aby zostać zasłużonym Dawcą!</h4>";
                            }
                        }
                        ?></p>


                </div>





            </div>

        </div>


        <footer>
            <p>Projekt na WDPAI</p>
        </footer>
</body>

