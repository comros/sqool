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
if(isSet($_POST['zgoda'])) // Funkcje empty() i isSet() można użyć, aby nie wyswietlało Warninga.
{
    if(empty($_POST['imie']) or empty($_POST['nazwisko']))
    {
        echo "<p style='font-weight: bold; color: red;'>Nie wypełniłeś podstawowych danych!</p><br>";
    }
    else
    {
        echo "Przesłałeś następujące dane: <br>";
        echo "Imię i nazwisko: ".$_POST['imie']." ".$_POST['nazwisko']."<br>"; // $_POST, ponieważ takiej metody używamy
    }

    if(empty($_POST['wiek']))
    {
        echo "<p style='font-weight: bold; color: red;'>Nie podałeś swojego wieku!</p><br>";
    }
    else if($_POST['wiek'] < 18)
    {
        echo "<p style='font-weight: bold; color: red; font-size: 18pt; font-style: italic;'>
        W projekcie mogą brać udział tylko uczestnicy +18!</p><br>";
    }
    else
    {
        echo "Masz ".$_POST['wiek']." lat."
        ."<br>Masz wykształcenie: ".$_POST['wyksztalcenie']."<br>";
    }

    echo "Znajomość języków: <ul>";
    foreach($_POST['języki'] as $j) {
        echo "<li>$j</li>";
    }

    echo "</ul><br><br>";

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
}
else
{
    echo "Nie wyraziłeś zgody na przetwarzanie danych.<br>";
}
?>
</body>
</html>
