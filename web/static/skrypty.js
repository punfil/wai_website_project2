function pokaz_zawartosc_js() {
    document.getElementsByClassName("js_support").style.display = "block";
}

function pokazkoszyk() {
    var zakupy = "<tr><th>Przedmiot</th><th>Ilość</th><th>Modyfikacja</th></tr>\n", key = "", i =0;
    for (i = 0; i < sessionStorage.length; i++) {
        key = sessionStorage.key(i);
        zakupy += "<tr><td>" + key + "</td>\n<td>"
            + sessionStorage.getItem(key) + "</td>\n<td>" + '<input type="button" value="Usuń przedmiot" onclick="Usun('+i+')" style="margin: 0 auto;display:block;" />' + "</td></tr>\n";
    }
    document.getElementById('zakupy').innerHTML = zakupy;
}
function Dokosza() {
    var x = document.getElementById('kontener_sklep');
    var y = x.getElementsByTagName('form'),i;
    for (i = 0; i < y.length; i++) {
        if (y[i].ilosc.value > 0) {
            sessionStorage.setItem(y[i].name.value, y[i].ilosc.value);
        }
    }
}
function Usun(numer) {
    var co = sessionStorage.key(numer);
    sessionStorage.removeItem(co);
    pokazkoszyk();
}
function Wyczysc() {
    sessionStorage.clear();
    pokazkoszyk();
}
function Wyczyscliste_zakupow() {
    localStorage.clear();
    var element = document.getElementById("zapamietany_koszyk");
    element.remove();
    var divek = document.createElement("table");
    divek.setAttribute("id", "zapamietany_koszyk");
    document.getElementsByClassName("tabela_zapamietany_koszyk")[0].appendChild(divek);
    var element = document.getElementById("zapamietany_koszyk");
    element.classList.add("none");
}
function koszyk_napozniej() {
    var czas = new Date();
    czas = JSON.stringify(czas).substr(3, 17);
    var nowy_czas = "", i;
    for (i = 0; i < czas.length; i++) {
        if (czas[i] !== 'T') {
            nowy_czas += czas[i];
        }
        else {
            nowy_czas += " ";
        }
    }
    var zakupy = [],key;
    for (i = 0; i <= sessionStorage.length - 1; i++) {
        key = sessionStorage.key(i);
        zakupy.push(key);
        zakupy.push(sessionStorage.getItem(key));
    }
    JSON.stringify(zakupy);
    if (zakupy.length)
        localStorage.setItem(nowy_czas, zakupy);
}
function pokazzapamietany() {
    var zakupy = "",k;
    for (k = 0; k < localStorage.length; k++) {
        var czas = localStorage.key(k);
        var przedmiot = [];
        przedmiot = localStorage.getItem(czas);
        zakupy += "<tr><td colspan=\"2\">" + czas + "</td></tr>\n";
        zakupy += "<tr><th>Przedmiot</th><th>Ilość</th></tr>\n";
        var key, current_przedmiot;
        var current_string = "",i,j;
        for (i = 0, j = 0; i < przedmiot.length; i++) {
            if (przedmiot[i] == ',') {
                if (j % 2) {
                    key = current_string;
                    zakupy += "<tr><td>" + current_przedmiot + "</td>\n<td>"
                        + key + "</td></tr>\n";
                }
                else {
                    current_przedmiot = current_string;
                }
                j++;
                current_string = "";
            }
            else {
                current_string += przedmiot[i];
            }
        }
        zakupy += "<tr><td>" + current_przedmiot + "</td>\n<td>"
            + current_string + "</td></tr>\n";
        zakupy += '<tr><td colspan="2"><input type="button" value="Przywróć koszyk" onclick="Przywroc('+k+')" style="margin: 0 auto;display:block;" />' + "</td></tr>\n";
    }
    document.getElementById('zapamietany_koszyk').innerHTML = zakupy;
    if (zakupy.length) {
        var element = document.getElementById("zapamietany_koszyk");
        element.classList.remove("none");
    }
}

function Przywroc(x) {
    sessionStorage.clear();
    var co_przywracam = localStorage.getItem(localStorage.key(x));
    var current_przedmiot = "";
    var key ,current_string = "",i;
    for (i = 0, j = 0; i < co_przywracam.length; i++) {
        if (co_przywracam[i] == ',') {
            if (j % 2) {
                key = current_string;
                sessionStorage.setItem(current_przedmiot, key); 
            }
            else {
                current_przedmiot = current_string;
            }
            j++;
            current_string = "";
        }
        else {
            current_string += co_przywracam[i];
        }
    }
    sessionStorage.setItem(current_przedmiot, current_string); 
    pokazkoszyk();
    localStorage.removeItem(localStorage.key(x));
    pokazzapamietany();
    var element = document.getElementById("zapamietany_koszyk");
    element.classList.add("none");
}