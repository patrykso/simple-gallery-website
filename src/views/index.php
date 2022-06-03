<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script>
        function css_index_black() {
            document.getElementById("h1").style.color = 'black';
            document.getElementById("p1").style.color = 'black';
            document.getElementById("p2").style.color = 'black';
            sessionStorage.setItem("kolor", "czarny")
        }

        function css_index_white() {
            document.getElementById("h1").style.color = 'white';
            document.getElementById("p1").style.color = 'white';
            document.getElementById("p2").style.color = 'white';
            sessionStorage.setItem("kolor", "bialy")
        }

        function check_colors() {
            if(sessionStorage.getItem('kolor') === 'bialy') {
                css_index_white();
            }
            else {
                css_index_black();
            }
        }

        window.addEventListener('load', check_colors);
    </script>

    <title>Strona Główna</title>
</head>

<body>
    <header>
        <nav>
            <ul id="menu">
                <li><a href="#"><u>Strona Główna</u></a></li>
                <li><a href="kontakt">Kontakt</a></li>
                <li><a href="galeria">Galeria</a></li>
                <li><a href="miejsca">Miejscowości</a></li>
            </ul>
        </nav>
    </header>
    <div id="spacer"></div>

    <div class="container">
        <article class="content">
            <h1 id="h1">Moje hobby - Podróże</h1>
            <p style="font-size: 17px;" id="p1">Na tej stronie znajdziecie Państwo opisy kilku miejsc, które miałem okazję zwiedzić, oraz przejrzeć galerię wykonanych przeze mnie zdjęć. Strona została wykonana na potrzeby realizacji projektu pierwszego z przedmiotu Hipertekst i Hipermedia</p>
            <button onclick="css_index_black()">Wciśnij przycisk, aby zmienić kolor tekstu na czarny</button>
            <button onclick="css_index_white()">Wciśnij przycisk, aby zmienić kolor tekstu na biały</button>
            <p id="p2">To ustawienie jest zapisywane w sessionStorage.</p>
        </article>
    </div>

<footer>Patryk Sowiński-Toczek Informatyka gr. 6 nr indeksu: 191711</footer>
</body>
</html>
