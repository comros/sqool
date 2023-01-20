<html>
<head>
<title>Przesłany formularz</title>
<style>
    body 
    { 
        background-color: rgb(41, 40, 40);
        color: white;    
    }
</style>
</head>
<body>
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

echo "<br>";

if(is_uploaded_file($_FILES['plik1']['tmp_name']))
{
    echo "Nazwa przesłanego pliku: ".$_FILES['plik1']['name']."<br>";
    echo "Rozmiar przesłanego pliku: ".$_FILES['plik1']['size']."B<br>";
    echo "Typ przesłanego pliku: ".$_FILES['plik1']['type']."<br>";
    echo "Błąd pliku: ".$_FILES['plik1']['error']."<br>";

    echo "Tymczasowa lokalizacja pliku: ".$_FILES['plik1']['tmp_name']."<br>";
    // Przeniesienie pliku z lokalizacji tymczasowej do lokalizacji docelowej
    $katalog = "./"; // Bieżący katalog - htdocs
    move_uploaded_file($_FILES['plik1']['tmp_name'], $katalog.$_FILES['plik1']['name']);
    echo "Przeniesiono plik do ".$katalog.$_FILES['plik1']['name']."<br>";
}
else
{
    echo "Nie przesłano pliku.<br>";
}

?>
</body>
</html>
