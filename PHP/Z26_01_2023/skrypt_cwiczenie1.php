<?php
echo "Dziękujemy! Rejestracja przebiegła pomyślnie.</br></br>";
echo "Wprowadzone dane:</br>";
echo "Nazwisko: ".$_POST['nazw']."<br />";
echo "Imię: ".$_POST['imie']."<br />";
echo "Zawód: ".$_POST['zaw']."<br />";
echo "Adres e-mail: ".$_POST['adr']."<br />";

if(!isSet($_POST['wykszt']))
echo "Proszę zaznaczyć pole Wykształcenie.";
else
echo "Wykształcenie: ".$_POST['wykszt']."</br></br>";
echo "Dodatkowe uprawnienia: ";
if(!empty($_POST['uprawnienia'])) {
	echo "<ul>";
	foreach ($_POST['uprawnienia'] as $wartosc) {
		echo "<li>$wartosc</li>";
	}
	echo "</ul>";
}
else {
	echo "<p>".$_POST['nazw']." nie posiada dodatkowych uprawnień.<p>";
}
echo "<br />";

if(empty($_POST['opcje'])) 
echo "Nie zgadza się na przetwarzanie danych osobowych.";	
else 
echo "Zgadza się na przetwarzanie danych osobowych.";
echo "<br /><br />";

if(is_uploaded_file($_FILES['plik1']['tmp_name']))
{
	echo "Informacje na temat załącznika.<br>";
	echo "Został odebrany plik o nazwie: <b>".$_FILES['plik1']['name']."</b><br>";
	echo "Typ pliku: <b>".$_FILES['plik1']['type']."</b><br>";
}

?>
