<?php
// Zadanie egzaminacyjne
$conn = mysqli_connect('localhost', 'root', '', 'biblioteka');
if(!empty($_POST['imie']))
{
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $rok_urodzenia = $_POST['rok_urodzenia'];
    $kod = substr($imie,0,2) . substr(strval($rok_urodzenia),-2) . substr($nazwisko,0,2);
    $kod = strtolower($kod);

    mysqli_query($conn, "INSERT INTO Czytelnicy VALUES (null, '$imie', '$nazwisko', '$kod')");    
}
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jakub Nowak">
    <meta http-equiv="creation-date" content="Tue, 31 oct 2023 08:05">
    <link rel="stylesheet" href="style_biblioteka.css">
    <title>Biblioteka publiczna</title>
</head>
<body>
    <header><h2>Miejska Biblioteka Publiczna w Książkowicach</h2></header>
    <main id="m_lewy"><h2>Dodaj czytelnika</h2>
    <form method="POST">
        imię: <input type="text"  name="imie" id="imie"><br>
        nazwisko: <input type="text" name="nazwisko" id="nazwisko"><br>
        rok urodzenia: <input type="number" name="rok_urodzenia" id="rok_urodzenia"><br>
        <input type="submit" value="DODAJ">
    </form>
    </main>
    <main id="m_srodkowy">
        <img src="biblioteka.png" alt="biblioteka">
        <h4>ul. Czytelnicza 25 <br> 12-120 Książkowice <br> tel.: 123123123 <br> e-mail: <a href="mailto:biuro@bib.pl">biuro@bib.pl</a></h4>
    </main>
    <main id="m_prawy">
        <h3>Nasi czytelnicy:</h3>
        <ul>
            <?php
                $zapytanie = mysqli_query($conn, "SELECT imie, nazwsiko FROM czytelnicy");
                while($row = mysqli_fetch_row($zapytanie))
                {
                    echo "<li>$row[0] $row[1]</li>";
                }
            ?>
        </ul>
    </main>
    <footer>
        <p>Projekt witryny: Jakub Nowak</p>
    </footer>
</body>
</html>

<?php
mysqli_close($conn);
?>
