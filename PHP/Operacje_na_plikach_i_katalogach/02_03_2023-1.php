<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <title>Praktyczne zastosowanie operacji na plikach</title>
    <meta charset="UTF-8">
    <style>
        p { margin: 0; }
    </style>
</head>
<body>
    <form action="zform.php" method="post">
            <p><b>Dodaj swój komentarz na temat globalnego ocieplenia.</b></p>
            <p>(Maksymalnie 255 znaków).</p><br>

            <textarea name='komentarz' rows='6' cols='50'></textarea><br>

            <button type="submit">Wyślij</button>
            <button type="reset">Wyczyść</button><br><br>

            <p>Dodane opinie:</p>
            <div>
            <?php

                if(isSet($_POST['komentarz']))
                {
                    $komentarz = $_POST['komentarz'];
                    if(!file_exists('./opinie.txt'))
                    {
                        touch('./opinie.txt');
                    }
                    else if($_POST['komentarz'] != NULL)
                    {
                        $opinie = fopen('./opinie.txt', 'a+');
                        fwrite($opinie, $komentarz.'<br>');
                        fclose($opinie);
                    }

                    $opinie = fopen('./opinie.txt', 'r');
                    echo fread($opinie, filesize("./opinie.txt"));
                }

            ?>
            </div>
    </form>
</body>
</html>
