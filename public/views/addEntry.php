<!DOCTYPE html>
<meta charset="utf-8">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Outfit">
    <link rel="stylesheet" type="text/css" href="public/css/addEntry_style.css">
    <script src="https://kit.fontawesome.com/4417060088.js" crossorigin="anonymous"></script>
    <title>Zaloguj sie</title>
</head>

<body>
    <div class="container">
        <nav>
            <img src="public/img/logo.svg" alt="logo" class="logo">
            <div class="navbuttons">
                <?php if($_SESSION['isAdmin'] == 1) echo '<a href="register">Rejestracja (ADMIN)</a>'?>
                <a href="logout">Wyloguj się</a>
            </div>
        </nav>
        <div class="addEntry-container">
            <form action="addEntry" method="post">
                <div class="messages">
                    <h1>Dodawanie wpisu</h1><br>

                    <?php
                    if (isset($messages)){
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>

                <input name="bloodAmount" type="text" placeholder="Ilość krwi w ml (domyślnie 450)" value="450">
                <input name="notes" type="text" placeholder="Notatki">

                <button type="submit">Dodaj wpis</button>
            </form>
        </div>
        <footer>
            <p>Projekt na WDPAI</p>
        </footer>
    </div>
</body>