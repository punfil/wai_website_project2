<!DOCTYPE HTML>
<html lang="pl">
<head>
    <link rel="stylesheet" href="static/style.css" />
    <meta charset="utf-8">
    <meta name="desciption" content="Strona fanów laptopów i akcesoriów IBM ThinkPad" />
    <link rel="icon" href="static/img/IBM_logo.jpg" type="image/x-icon" />
    <meta name="generator" content="MS Visual Studio" />
    <meta name="viewport" content="width=device-width"/>
    <script src="static/tooltip/jquery-1.12.4.js"></script>
    <script src="static/tooltip/jquery-ui.js"></script>
    <script src="static/effect.js"></script>
    <script src="static/tooltip/skrypcik.js"></script>
    <link rel="stylesheet" href="static/tooltip/jquery-ui.css">
    <title>
        IBM ThinkPad
    </title>
</head>
<body>
    <a href="/"><img id="obraz_gora" src="static/img/IBM_logo2.jpeg" alt="ThinkPad logo" title="ThinkPad logo" /> </a>
    <div class="navbar">
        <div class="lewo">
            <div id="drop1" class="dropdown">
                <button class="dropbtn">
                    Laptopy
                </button>
                <div class="dropdown-content">
                    <a href="laptopy#seria_200">Seria 200</a>
                    <a href="laptopy#seria_300">Seria 300</a>
                    <a href="laptopy#seria_500">Seria 500</a>
                    <a href="laptopy#seria_600">Seria 600</a>
                    <a href="laptopy#seria_700">Seria 700</a>
                    <a href="laptopy#seria_800">Seria 800</a>
                    <a href="laptopy#seria_T">Seria T</a>
                    <a href="laptopy#seria_R">Seria R</a>
                    <a href="laptopy#seria_A">Seria A</a>
                    <a href="laptopy#seria_Z">Seria Z</a>
                    <a href="laptopy#seria_i">Seria i</a>
                    <a href="laptopy#seria_X">Seria X</a>
                </div>
            </div>
            <div id="drop2" class="dropdown">
                <button class="dropbtn">
                    Akcesoria
                </button>
                <div class="dropdown-content">
                    <a href="akcesoria#stacje_dyskietek">Stacje dyskietek</a>
                    <a href="akcesoria#stacje_dokujące">Stacje dokujące</a>
                    <a href="akcesoria#pozostale">Pozostałe</a>
                </div>
            </div>
            <a id="o_mnie_float" href="o_mojej_kolekcji">O mnie</a>
        </div>
        <div id="right_nav">
            <a href="kontakt">Kontakt</a>
            <a href="sklep">Sklep</a>
            <a href="koszyk">Koszyk</a>
        </div>
    </div>
    <div class="naglowek">
        Formularz kontaktowy
    </div>
    <div class="seria_laptop">
        <div class="formularz">
            <form action="formularz.php" method="get">
                <label>Imię</label><br /> <input type="text" name="imie" /> <br />
                <label>Nazwisko</label> <br /> <input title="Nie musisz tego podawać, ale warto :)" type="text" name="nazwisko" /> <br />
                <label>Płeć:</label> <br /> <input type="radio" name="plec" value="Kobieta" />Kobieta <br /> <input type="radio" name="plec" value="mezczyzna" />Mężczyzna <br />
                <label>Powód kontaktu:</label> <br /> <input type="checkbox" name="powod" value="Blad" /> Znalazłem błąd <br /> <input type="checkbox" name="checkbox" value="wartość" /> Prośba o pomoc <br /> <input type="checkbox" name="checkbox" value="wartość" /> Pozostałe <br />
                <label>W jakiej sprawie piszesz?:</label> <br /><textarea class="pole_tekstowe" name="textarea"></textarea><br />
                <label>Dodatkowe informacje o Tobie (opcjonalne):</label> <br /><textarea class="pole_tekstowe" name="textarea"></textarea><br />
                <label>Priorytet Twojej wiadomości, 4 - najwyższy, 0 - najniższy</label> <br />
                <select name="select">
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select> <br />
                <input type="submit" value="Wyślij" />
                <input type="reset" value="Wyczyść formularz" />
            </form>
        </div>
        <noscript>
            <div class="svg">
                <svg class="usmiech" width="256" height="256" viewBox="0 0 256 256">
                    <circle class="kolo" cx="128" cy="128" r="120"></circle>
                    <circle class="lewe" cx="100" cy="104" r="12"></circle>
                    <circle class="prawe" cx="156" cy="104" r="12"></circle>
                    <path class="buzia" d="M60, 160 Q128, 215, 200, 160"></path>
                </svg>
            </div>
        </noscript>
        <div id="kontakt_js">
        <div class="toggler">
            <div id="effect" class="ui-widget-content ui-corner-all">
                <div class="svg">
                    <svg class="usmiech" width="256" height="256" viewBox="0 0 256 256">
                        <circle class="kolo" cx="128" cy="128" r="120"></circle>
                        <circle class="lewe" cx="100" cy="104" r="12"></circle>
                        <circle class="prawe" cx="156" cy="104" r="12"></circle>
                        <path class="buzia" d="M60, 160 Q128, 215, 200, 160"></path>
                    </svg>
                </div>
            </div>
        </div>
        <select name="effects" id="effectTypes">
            <option value="blind">Blind</option>
            <option value="bounce">Bounce</option>
            <option value="clip">Clip</option>
            <option value="drop">Drop</option>
            <option value="explode">Explode</option>
            <option value="fade">Fade</option>
            <option value="fold">Fold</option>
            <option value="highlight">Highlight</option>
            <option value="puff">Puff</option>
            <option value="pulsate">Pulsate</option>
            <option value="scale">Scale</option>
            <option value="shake">Shake</option>
            <option value="size">Size</option>
            <option value="slide">Slide</option>
        </select>
        <button id="button" class="ui-state-default ui-corner-all">Pokaż niespodziankę z wybranym obok efektem!</button>
    </div>
    </div>
    <script>
		if(screen.width>600){
			document.getElementById("kontakt_js").style.display = "block";
		}
    </script>
    <footer>
        Copyright Wojciech Panfil © Wszelkie Prawa Zastrzeżone
    </footer>
</body>
</html> 