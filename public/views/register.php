<!DOCTYPE html>
<meta charset="utf-8">
<head>
    <link rel="stylesheet" type="text/css" href="public/css/register_style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Outfit">
    <script src="https://kit.fontawesome.com/4417060088.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/script.js" defer"></script>

    <title>Rejestracja</title>
</head>

<body>
    <div class="container">
        <nav>
            <img src="public/img/logo.svg" alt="logo" class="logo">
            <div class="navbuttons">

                <?php
                if(!$_SESSION['isAdmin'] == 1 || !isset($_SESSION['UID'])){
                    echo '<a href="login">Logowanie</a>';
                }

                if(!isset($_SESSION['UID'])){
                    echo '<a href="register">Rejestracja</a>';
                }
                ?>
            </div>
        </nav>
        <div class="register-container">
            <form method="post" action="register">
                <div class="messages">
                    <h1>Rejestracja <?php if($_SESSION['isAdmin'] == 1) echo '(ADMIN)'?></h1><br>
                    <?php
                    if (isset($messages)){
                        foreach ($messages as $message){
                            echo $message;
                        }

                    }
                    ?>
                </div>
                <input name="email" type="text" placeholder="email@example.com">
                <input name="password" type="password" placeholder="Hasło">
                <input name="confirmedPassword" type="password" placeholder="Potwierdź hasło">
                <input name="name" type="text" placeholder="Imię">
                <input name="surname" type="text" placeholder="Nazwisko">
                <input name="phone" type="text" placeholder="Nr tel">

                <select name="isadmin">
                    <option value="false">Użytkownik</option>
                    <?php
                        if($_SESSION['isAdmin'] == 1){
                            echo '<option value="true">Admin</option>';
                        }
                    ?>

                </select>

                <button type="submit">Załóż konto</button>
            </form>
        </div>
        <footer>
            <p>Projekt na WDPAI</p>
        </footer>
    </div>
</body>