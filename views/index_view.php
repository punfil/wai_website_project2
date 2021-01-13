<!DOCTYPE HTML>
<html lang="pl">
<head>
    <link rel="stylesheet" type="text/css" href="static/style.css" />
    <meta charset="UTF-8">
    <meta name="desciption" content="Strona fanów laptopów i akcesoriów IBM ThinkPad" />
    <link rel="icon" href="static/img/IBM_logo.jpg" type="image/x-icon" />
    <meta name="generator" content="MS Visual Studio" />
    <meta name="viewport" content="width=device-width"/> 
    <title>
        IBM ThinkPad
    </title>
</head>
<body>
    <header>
        <a href="/"><img id="obraz_gora" src="./static/img/IBM_logo2.jpeg" alt="ThinkPad logo" title="ThinkPad logo" /> </a>
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
    <p id="wstep">
        Witam na stronie poświęconej laptopom i akcesoriom do nich firmy IBM.<br /> Zapraszam do zapoznania się z kolekcją!
        <?php
        echo $login_message;
        ?>
    </p>
    <div class="instead_of_center">
                <div class=galeria_glowna_rzad>
                <?php
                foreach ($photos as $current_photo){
                    ?>
                    <div class="galeria_kolumna">
                    <a href="<?php echo $current_photo['full_photo']; ?>"><img src="<?php echo $current_photo['miniature']; ?>" alt="Mini_photo" title="Photo"/></a>
                    <p>Autor: 
                    <?php
                    echo $current_photo['autor']
                    ?>
                    <br/>Tytuł:
                    <?php
                    echo $current_photo['title'];
                    ?>
                    <br /> <?php echo $current_photo['is_private'];
                    ?>
                    </p>
                    </div>
                    <?php
                 }
                ?>
                </div>
        <?php
        for($i=1; $i <= ceil($page_count/$photos_per_page); $i++){
            ?>
            <a href="<?php echo "/?gal_page=".($i-1) ?>">Strona <?php echo $i ?></a><?php
        }
        ?>
        <form method="post" enctype="multipart/form-data">
        Prześlij do galerii swój obrazek (Akceptowane JPG/PNG i <= 1MB):
        <input type="file" name="picture"><br />
        Tutaj natomiast dodaj swój znak wodny:
        <input type="text" name="znak_wodny" required> <br />
        Podaj tytuł zdjęcia...
        <input type="text" name="tytul_zdjecia"> <br />
        ...i jego autora.
        <input type="text" name="autor" value="<?php echo $photo_author ?>"> <br />
        <?php
        if ($logged_in){
        ?>
        <label><input type="radio" name="privacy" value='private'/>Prywatne</label>
        <label><input type="radio" name ="privacy" value='public'/>Publiczne</label>
        <?php
        }
        else{?>
        <input type="radio" name ="privacy" value='public' hidden checked/>
        <?php
        }
        ?>
        <input type="submit" value="Wyślij" name="upload_button">
        <?php
        if (isset($upload_error)){
            echo $upload_error;
        }
        ?>
    </form>
    <?php
    if (!$logged_in){?>
    <h1>Załóż konto i dołącz do społeczności!</h1>
    <form method="post" enctype="application/x-www-form-urlencoded">
    Na początek podaj swój e-mail:
    <input type="text" name="e-mail" required> <br />
    Tutaj wpisz swoją nazwę użytkownika
    <input type="text" name="login" required> <br />
    Podaj hasło:
    <input type="password" name="password_1" required> <br />
    Potwierdź hasło:
    <input type="password" name="password_2" required> <br />
    <input type="submit" value="Zarejestruj się!" name="register_button">
    </form>
    <?php
        echo $register_fail;
    ?>
    <h1>Zaloguj się do swojego konta</h1>
    <form method="post" enctype="application/x-www-form-urlencoded">
    Podaj login:
    <input type="text" name="login_username"><br />
    Podaj hasło:
    <input type="password" name="login_password"><br />
    <input type="submit" value="Zaloguj się" name="login_button">
    </form>
    <?php
    } 
    ?>
    <?php
        echo $login_failure;
    if ($logged_in){?>
    <form method="post" enctype="application/x-www-form-urlencoded">
    Wyloguj się:
    <input type="submit" value="Wyloguj się" name="logout_button">
    </form><?php
    } 
    ?>
    <a href="/ajax_search">Wyszukiwarka zdjęć!</a>
    </div>
    <footer>
        Copyright Wojciech Panfil Wszelkie Prawa Zastrzeżone
    </footer>
</body>
</html> 