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
                            echo "<h4> Oddaj więcej, aby zostać zasłużonym Dawcą!</h4>";
                        }
                        ?></p>


                </div>





            </div>

        </div>


        <footer>
            <p>Projekt na WDPAI</p>
        </footer>
</body>

<!-- <!DOCTYPE html>
<meta charset="utf-8">

<head>
    <link rel="stylesheet" type="text/css" href="public/css/map_style.css">
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
                        <i class="fa fa-solid fa-notes"></i>
                        <a href="entries.php" class="button">Wpisy</a>
                    </li>
                    <li>
                        <i class="fa-regular fa-map"></i>
                        <a href="map.php" class="button">Mapa</a>
                    </li>
                    <li>
                        <i class="fa-sharp fa-solid fa-medal"></i>
                        <a href="#" class="button">Status</a>
                    </li>
                </ul>
            </nav>

            <div class="map-container">
                <div>

                    <iframe src="https://www.google.com/maps/d/embed?mid=142nqMIgmK3tCarABCmdvq8MHGlNZZPMB" class="map"></iframe>

                </div>



            </div>

        </div>


        <footer>
            <p>Projekt na WDPAI</p>
        </footer>
</body> -->