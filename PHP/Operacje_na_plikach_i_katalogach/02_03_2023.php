<?php

# Zadanie 1
if(!file_exists('klasa1') && !file_exists('klasa2'))
{
    mkdir('klasa1');
    mkdir('klasa2');
}

# Zadanie 2
if(!file_exists('klasa1/Uczniowie') && !file_exists('klasa1/Plan'))
{
    mkdir('klasa1/Uczniowie');
    mkdir('klasa1/Plan');
}

# Zadanie 3
touch('klasa2/uczniowie.php');

# Zadanie 4
$plik1 = fopen('klasa2/uczniowie.php', 'w');
fwrite($plik1, '<?php echo "<h1>Gang Giga Spawaczy</h1><ul><li>Kacper Marciniec</li><li>Grzegorz Łątka</li><li>Michał Taraszka</li>"; ?>');
fclose($plik1);

# Zadanie 6
touch('klasa1/dane.php');

# Zadanie 7
$plik2 = fopen('klasa1/dane.php', 'w');
fwrite($plik2, '<?php include("C:/xampp/htdocs/klasa2/uczniowie.php"); ?>');
fclose($plik2);

# Zadanie 8
$katalog = 'klasa1';
$pliki = scandir($katalog);
echo '<b>Zadanie 8:</b><br>';
foreach($pliki as $plik) echo '<p>'.$plik.'</p>';
echo '<br>';

# Zadanie 9
touch('klasa1/Plan/lekcje.txt');

# Zadanie 10
$plik3 = fopen('klasa1/Plan/lekcje.txt', 'w');
fwrite($plik3, 'Matematyka, Systemy Baz Danych');
fclose($plik3);

# Zadanie 11
$plik4 = fopen('klasa1/Plan/lekcje.txt', 'r');
echo '<b>Zadanie 11:</b><br>'.fread($plik4, filesize('klasa1/Plan/lekcje.txt')).'<br>';
fclose($plik4);

/*
# Zadanie 12
if(file_exists('klasa1/Uczniowie') && file_exists('klasa1/Plan'))
{
    rmdir('klasa1/Plan');
    unlink('klasa1/Plan/lekcje.txt'); // Nie można usunąć niepustego katalogu!
    rmdir('klasa1/Uczniowie');
}

# Zadanie 13
if(file_exists('klasa1/dane.php'))
{
    unlink('klasa1/dane.php');
}
*/

?>
