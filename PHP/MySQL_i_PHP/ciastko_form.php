<?php

// Ustawia licznik odwiedzin
if(isset($_COOKIE['odwiedziny']))
{
    $ilosc_odw = $_COOKIE['odwiedziny']+1;
}
else
{
    $ilosc_odw = 1;
}
setcookie('odwiedziny', $ilosc_odw, time() + 604800);

// Wypisuje tekst powitalny, imie, nazwisko lub usuwa/tworzy ciastko
if(isset($_COOKIE['dane'])) 
{
    echo "Witamy po raz kolejny <b>{$_COOKIE['dane']}</b><br>";
    
    if(isset($_POST['delete_cookie']))
    {
        setcookie('dane', "{$_POST['imie']} {$_POST['nazw']}", time() - 604800);
        setcookie('odwiedziny', $ilosc_odw, time() - 604800);
        echo "Usunięto ciastko.<br>";
    }
}
else 
{
    // Plik cookie jest ważny tydzień
    setcookie('dane', "{$_POST['imie']} {$_POST['nazw']}", time() + 604800);
    echo "Stworzono ciastko.<br>";
}

echo "Ilość odwiedzin: <b>$ilosc_odw</b><br>";

?>
