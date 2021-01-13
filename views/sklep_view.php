<!DOCTYPE HTML>
<html lang="pl">
<head>
    <link rel="stylesheet" href="static/style.css" />
    <meta charset="UTF-8">
    <meta name="desciption" content="Strona fanów laptopów i akcesoriów IBM ThinkPad" />
    <link rel="icon" href="static/img/IBM_logo.jpg" type="image/x-icon" />
    <meta name="generator" content="MS Visual Studio" />
    <meta name="viewport" content="width=device-width" />
    <script src="static/skrypty.js"></script>
    <title>
        IBM ThinkPad
    </title>
</head>
<body>
    <header>
        <a href="/"><img id="obraz_gora" src="static/img/IBM_logo2.jpeg" alt="ThinkPad logo" title="ThinkPad logo" /> </a>
    </header>
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
        Sklep internetowy z akcesoriami
    </div>
    <noscript>
        <div class="naglowek">
            Włącz JS, żeby zobaczyć tą zawartość :)
        </div>
    </noscript>
    <div class="js_support">
        <div id="kontener_sklep" class="instead_of_center">
            <div class="galeria_rzad">
                <div class="galeria_kolumna">
                    <img class="obraz_sklep" src="static/img/keychain.webp" alt="Brelok" title="Brelok" />
                </div>
                <div class="galeria_kolumna">
                    <form name="Przedmiot">
                        <fieldset>
                            <label>Brelok do kluczy<input class="ukryty" value="Brelok" type="text" name="name"></label><br /><br />
                            <label>Ilość: <input type="text" name="ilosc"></label> <br /> <br />
                            <input type="button" value="Dodaj do koszyka" onclick="Dokosza()">
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="galeria_rzad">
                <div class="galeria_kolumna">
                    <img class="obraz_sklep" src="static/img/dyskietka.jpg" alt="Dyskietka 3.5" title="Dyskietka 3.5" />
                </div>
                <div class="galeria_kolumna">
                    <form name="Przedmiot">
                        <fieldset>
                            <label>Dyskietka 3.5 cala<input class="ukryty" value="Dyskietka" type="text" name="name"></label><br /><br />
                            <label>Ilość: <input type="text" name="ilosc"></label> <br /> <br />
                            <input type="button" value="Dodaj do koszyka" onclick="Dokosza()">
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="galeria_rzad">
                <div class="galeria_kolumna">
                    <img class="obraz_sklep" src="static/img/ibm_dyskietkiusb.webp" alt="Stacja dyskietek" title="Stacja dyskietek" />
                </div>
                <div class="galeria_kolumna">
                    <form name="Przedmiot">
                        <fieldset>
                            <label>Stacja dyskietek 3.5 cala<input class="ukryty" value="Stacja dyskietek" type="text" name="name"></label><br /><br />
                            <label>Ilość: <input type="text" name="ilosc"></label> <br /> <br />
                            <input type="button" value="Dodaj do koszyka" onclick="Dokosza()">
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="galeria_rzad">
                <div class="galeria_kolumna">
                    <img class="obraz_sklep" src="static/img/torba.webp" alt="Torba" title="Torba" />
                </div>
                <div class="galeria_kolumna">
                    <form name="Przedmiot">
                        <fieldset>
                            <label>Torba na laptopa<input class="ukryty" value="Torba" type="text" name="name"></label><br /><br />
                            <label>Ilość: <input type="text" name="ilosc"></label> <br /> <br />
                            <input type="button" value="Dodaj do koszyka" onclick="Dokosza()">
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="galeria_rzad">
                <div class="galeria_kolumna">
                    <img class="obraz_sklep" src="static/img/wiha.jpg" alt="Śrubokręty" title="Śrubokręty" />
                </div>
                <div class="galeria_kolumna">
                    <form name="Przedmiot">
                        <fieldset>
                            <label>Śrubokręty do laptopów<input class="ukryty" value="Śrubokręty" type="text" name="name"></label><br /><br />
                            <label>Ilość: <input type="text" name="ilosc"></label> <br /> <br />
                            <input type="button" value="Dodaj do koszyka" onclick="Dokosza()">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementsByClassName("js_support")[0].style.display = "block";
    </script>
    <footer>
        Copyright Wojciech Panfil © Wszelkie Prawa Zastrzeżone
    </footer>
</body>
</html> 