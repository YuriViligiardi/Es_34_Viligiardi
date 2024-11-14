<?php
    session_start();
    if (!(isset($_SESSION["numParole"]))) {
        $_SESSION["frasiImportanti"] = array();
        $_SESSION["numParole"] = array();
        $_SESSION["numCaratteri"] = array();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>script.php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $frase = $_POST["frase"];
        $imp = intval($_POST["importanza"]);

        showData($frase, $imp);
        saveData($frase, $imp);

        function showData($f, $i){
            echo "<div id='divScript'>";
                echo "<h1>DATI INSERITI</h1>";
                echo "<h4>Frase inserita:</h4>";
                echo "<p>$f</p>";
                echo "<h4>Livello di importanza data:</h4>";
                echo "<p>$i</p>";
                echo "<br>";
                echo "<br>";
                echo "<a class='sendButton' href='./frase.html'>HOME</a>";
            echo "</div>";
        }

        function saveData($f, $i){
            if ($i == 4) {
                $arrayFrasi = $_SESSION["frasiImportanti"];
                $arrayFrasi[] = $f;
                $_SESSION["frasiImportanti"] = $arrayFrasi;
            }

            $arrayParole = $_SESSION["numParole"];
            $arrayParole[] = str_word_count($f);
            $_SESSION["numParole"] = $arrayParole;

            $arrayCaratteri = $_SESSION["numCaratteri"];
            $arrayCaratteri[] = strlen($f);
            $_SESSION["numCaratteri"] = $arrayCaratteri;
        }
    ?>
</body>
</html>