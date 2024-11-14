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
    <title>riepilogo.php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        showData();

        function calcutaleTotalWords(){
            $somma = 0;
            $aw = $_SESSION["numParole"];
            foreach ($aw as $key => $value) {
                $somma += $value;
            }
            return $somma;
        }

        function calcutaleTotalCharacters(){
            $somma = 0;
            $ac = $_SESSION["numCaratteri"];
            foreach ($ac as $key => $value) {
                $somma += $value;
            }
            return $somma;
        }

        function showData(){
            echo "<div id='divRiepilogo'>";
                echo "<h1>TUTTI I DATI INSERITI</h1>";
                echo "<h4>Frasi con massima importanza:</h4>";
                $af = $_SESSION["frasiImportanti"];
                echo "<ul>";
                foreach ($af as $key => $value) {
                    echo "<li>$value</li>";
                }
                echo "</ul>";
                
                echo "<br>";
                echo "<br>";

                echo "<table>";
                    echo "<tr>";
                        echo "<th>Num.Tot.Parole</th>";
                        echo "<th>Num.Tot.Caratteri</th>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>" . calcutaleTotalWords() . "</td>";
                        echo "<td>" . calcutaleTotalCharacters() . "</td>";
                    echo "</tr>";
                echo "</table>";
                
                echo "<br>";
                echo "<br>";
                echo "<a class='sendButton' href='./frase.html'>HOME</a>";
            echo "</div>";
        }
    ?>
</body>
</html>