<!DOCTYPE html>
<meta charset="utf-8">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Outfit">
    <link rel="stylesheet" type="text/css" href="public/css/login_style.css">
    <script src="https://kit.fontawesome.com/4417060088.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/script.js" defer"></script>
    <title>Zaloguj sie</title>
</head>

<body>
    <div class="container">
        <nav>
            <img src="public/img/logo.svg" alt="logo" class="logo">
            <div class="navbuttons">
                <a href="login">Logowanie</a>
                <a href="register">Rejestracja</a>
            </div>
        </nav>
        <div class="login-container">
            <form action="login" method="post">
                <div class="messages">
                    <h1>Witaj w Dzienniczku Dawcy!</h1><br>

                    <?php

                    if (isset($messages)){
                        foreach ($messages as $message){
                            echo $message;

                        }

                    }
                    ?>
                </div>
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <button type="submit">Zaloguj się</button>
            </form>
        </div>
        <footer>
            <p>Projekt na WDPAI</p>
        </footer>
    </div>
</body>