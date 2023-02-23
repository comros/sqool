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
