<!DOCTYPE HTML>
<html lang="pl">
<head>
    <link rel="stylesheet" href="static/style.css" />
    <meta charset="UTF-8">
    <meta name="desciption" content="Strona fanów laptopów i akcesoriów IBM ThinkPad" />
    <link rel="icon" href="static/img/IBM_logo.jpg" type="image/x-icon" />
    <meta name="generator" content="MS Visual Studio" />
    <meta name="viewport" content="width=device-width"/>
    <script src="static/skrypty.js"></script>
    <title>
        IBM ThinkPad
    </title>
</head>
<body onload="pokazkoszyk()">
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
        Koszyk
    </div>
    <noscript>
        <div class="naglowek">
            Włącz JS, żeby zobaczyć tą zawartość :)
        </div>
    </noscript>
    <div class="js_support">
        <div class="tabela_koszyk">
            Twój koszyk zachowuje się do czasu zamknięcia karty. Jeżeli chcesz go zapisać na później koniecznie kliknij poniższy przycisk!<br />
            Klikając przywróć zawartość obecnego koszyka zostaje bezwględnie nadpisana wybranym koszykiem z historii.
            <form name="listazakupow" class="tabela_koszyk">
                <div class="items_table">
                    <table id="zakupy"></table>
                </div>
            </form>
        </div>
        <input class="center_button" type="button" value="Wyczyść koszyk" onclick="Wyczysc()" />
        <input class="center_button" type="button" value="Zachowaj koszyk" onclick="koszyk_napozniej()" />
        <div class="tabela_zapamietany_koszyk">
            <input class="center_button" type="button" value="Pokaż zachowany koszyk" onclick="pokazzapamietany()" />
            <form name="listazakupow">
                <div class="items_table">
                    <table id="zapamietany_koszyk" class="none"></table>
                </div>
            </form>
        </div>
        <input class="center_button" type="button" value="Usuń zapamiętane koszyki" onclick="Wyczyscliste_zakupow()" />
    </div>
    <script>
        document.getElementsByClassName("js_support")[0].style.display = "block";
    </script>
    <footer>
        Copyright Wojciech Panfil © Wszelkie Prawa Zastrzeżone
    </footer>
</body>
</html> 