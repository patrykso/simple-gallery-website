<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="../script.js"></script>
    <title>Galeria</title>
</head>

<body>
    <header>
        <nav>
            <ul id="menu">
                <li><a href="/">Strona Główna</a></li>
                <li><a href="kontakt">Kontakt</a></li>
                <li><a href="#"><u>Galeria</u></a></li>
                <li><a href="miejsca">Miejscowosci</a></li>
            </ul>
        </nav>
    </header>
    <div id="spacer"></div>

    <div class="content">
        <a href="/upload">Prześlij swoje zdjęcie do galerii</a><br><br>
        <?php if (!empty($_SESSION['user_id'])) : ?>
                <a href="/logout">Wyloguj się</a><br><br>
            <?php else: ?>
                <a href="/register">Zarejestruj się</a><br><br>
                <a href="/login">Zaloguj się</a><br><br>
            <?php endif ?>
        <div class="gallery">
            <?php foreach($photos as $photo):?>
                <div><a href=<?= json_encode($photo['watermarkfilepath']) ?> target="_blank"><img src=<?= json_encode($photo['minifilepath']) ?> class="tile"></a>"
                <p>Autor: <?= $photo['author'] ?></p><br>
                <p>Tytuł: <?= $photo['title'] ?></p><br>
                </div>
            <?php endforeach; ?>

            <p>Zmień stronę: </p>
            <?php for($i = 1; $i < $pagescount + 1; $i++): ?>
                <a href=/galeria?pageid=<?= pagechange($i) ?>><?= $i ?></a>
            <?php endfor; ?>
        </div>
    </div>

    <footer>Patryk Sowiński-Toczek Informatyka gr. 6 nr indeksu: 191711</footer>
</body>
</html>
