<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
<header>
    <nav>
        <ul id="menu">
            <li><a href="/"><u>Strona Główna</u></a></li>
            <li><a href="kontakt">Kontakt</a></li>
            <li><a href="galeria">Galeria</a></li>
            <li><a href="miejsca">Miejscowości</a></li>
        </ul>
    </nav>
</header>
<div id="spacer"></div>

<div class="container">
    <div class="content">
        <form method="POST">
            <label>Login</label><br>
            <input type="text" name="login" required><br>
            <label>Hasło</label><br>
            <input type="password" name="pass" required><br><br>
            <input type="submit" value="Zaloguj się">
        </form>
        <br><a href="galeria">Wróć do galerii zdjęć</a>
    </div>
</div>

<footer>Patryk Sowiński-Toczek Informatyka gr. 6 nr indeksu: 191711</footer>
</body>
</html>
