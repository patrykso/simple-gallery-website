<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../style.css" type="text/css">
    <link rel="stylesheet" href="../jqueryui/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="../script.js"></script>

    <title>Kontakt</title>
</head>

<body>
    <header>
        <nav>
            <ul id="menu">
                <li><a href="/">Strona Główna</a></li>
                <li><a href="#"><u>Kontakt</u></a></li>
                <li><a href="galeria">Galeria</a></li>
                <li><a href="miejsca">Miejscowości</a></li>
            </ul>
        </nav>
    </header>
    <div id="spacer"></div>

    <div class="container">
        <div id="form"><section class="content" style="border: 2px solid #0f6aba;">
            <h1>Skontaktuj się ze mną!</h1>
            <form action="#" id="kontakt">
                <label for="fname">Imię:</label><br>
                <input type="text" name="fname" id="fname"><br>
                <label for="lname">Nazwisko:</label><br>
                <input type="text" id="lname"><br>
                <label for="email">Adres e-mail:</label><br>
                <input type="email" id="email"><br>
                <label for="tel">Telefon kontaktowy:</label><br>
                <input type="tel" id="tel"><br>
                <label for="wiadomosc">Treść wiadomości:</label><br>
                <textarea id="wiadomosc" style="height: 400px; width: 500px;"></textarea><br><br>
                <label for="zapytanie">Czego dotyczy Twoje zapytanie?</label><br><br>
                <select name="zapytanie" id="zapytanie">
                    <option disabled selected>Wybierz z rozwijanej listy</option>
                    <option>Funkcjonalności strony</option>
                    <option>Zdjęć umieszczonych na stronie</option>
                    <option>Czegoś innego</option>
                </select><br><br>
                <button id="zapisz" onclick="save();" type="button">Zapisz swoje dane</button>
                <button id="wczytaj" onclick="dataPrint()" type="button">Wczytaj swoje dane</button>
                <input type="submit" value="Wyślij" id="opener">
                <input type="reset" value="Wyczyść"><br><br>
                <p>Twoje dane zostaną zapamiętane nawet po zamknięciu strony i w każdej chwili możesz je nadpisać.</p>

            </form>
        </section></div>
    </div>

    <footer>Patryk Sowiński-Toczek Informatyka gr. 6 nr indeksu: 191711</footer>
</body>
</html>
