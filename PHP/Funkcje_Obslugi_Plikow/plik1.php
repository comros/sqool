<?php
// T: Funkcje obsługi plików
echo "Wywołano skrypt 1 <br>";

// Załączanie zewnętrznego pliku ze skryptem
include('plik2.php');
echo "<br>";
require('plik2.php');

// Sprawdzanie czy istnieje plik
if(file_exists('plik2.pdf')) {
    echo "<br> Plik istnieje <br>";
} else {
    echo "<br> Brak pliku o podanej nazwie <br>";
}

// Czy podany argument jest plikiem
if(is_file('joomla.txt')){
    echo "Argument jest plikiem <br>";
} else {
    echo "Argument nie jest plikiem <br>";
}

// Rozmiar pliku w bajtach
echo "Rozmiar załączonego pliku wynosi ".filesize('plik2.php')."<br>";

// Tworzenie pliku
touch('anna');
touch('./img/obraz1.jpg');

// Usuwanie pliku
/*
unlink('anna');
unlink('./img/obraz1.jpg');
*/

// Otwieranie pliku
$id_pliku = fopen('testowanie.txt', 'r');
echo $id_pliku."<br>";

// Zamykanie pliku
fclose($id_pliku);

/* ODCZYTANIE ZAWARTOŚCI PLIKU:

Wybrane funkcje odczytujące zawartość pliku
* funkcje wyamagjące wcześniejszego otwarcia pliku
    - fread()
    - fgets()
    - fgetc()
* nie wymagające wcześniejszego otwarcia liku
    - readfile()
    - file_get_contents()
    - file()
*/

// Zwraca odczytany fragment w postaci ciągu znaków
fread($id_pliku, 40);

// Odczytuje zawartość wiersz po wierszu
echo fgets($id_pliku);

while(!feof($id_pliku)) {
    $t = fgets($id_pliku); // zwraca ciąg znaków
    echo $t."<br>";
}
fclose($id_pliku);

// Odczytuje zawartosc i wysyla do przegladrki
readfile('twstowanie.txt');

// Odczytuje zawartosc pliku i zwraca ciag znakow
echo file_get_contents('testowanie.txt');

// Odczytuje zawartosc i zwraca tablice
$tab = file('testowanie.txt');
echo $tab[0]."<br>";

foreach($tab as $w) {
    echo $w."<br>";
}

// Zapis zawartości do pliku - fwrite()
$id1_pliku = fopen('test1.txt', 'w');
fwrite($id1_pliku, 'technik informatyk');
