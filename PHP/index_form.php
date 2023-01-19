<?php
// POST - dane nie są jawne
// GET - dane są jawne / są doklejane do url strony
// $_POST i $_GET to tablice asocjacyjne, z watosciami ustawionymi przez name="" w pliku HTML
echo "Przesłałeś następujące dane: <br>";
echo "Imię i nazwisko: ".$_POST['imie']." ".$_POST['nazwisko'] // $_POST, ponieważ takiej metody używamy
."<br>Masz ".$_POST['wiek']." lat."
."<br>Masz wykształcenie: ".$_POST['wyksztalcenie']."<br>";


echo "Znajomość języków: <ul>";
foreach($_POST['języki'] as $j) {
    echo "<li>$j</li>";
}


echo "</ul><br>";

if(isSet($_POST['zgoda'])) // Funkcje empty() i isSet() można użyć, aby nie wyswietlało Warninga.
{
    echo "Wyraziłeś zgodę na przetwarzanie danych.<br>";
}
else
{
    echo "Nie wyraziłeś zgody na przetwarzanie danych.<br>";
}
?>