<?php

include 'db.php';
include 'helpers.php';

if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["letter"])){
    try {
        //fetch problem from the form
        $letter = $_GET["letter"];
        
        //sanitize the letter 
        if (preg_match("/[^a-zA-Z]/", $letter) || strlen($letter) > 1) {
            echo "Co Ty kombinujesz rzezimieszku! Proszę wprowadzić literę od A - Z.";
            exit();
        }
        
        $query = 'SELECT * FROM afirmacje WHERE problemFormat LIKE :letter';
        $problemQuery = $conn->prepare($query);
        $problemQuery->execute(['letter' => $letter . '%']);

        $problemy = $problemQuery->fetchAll(PDO::FETCH_ASSOC);

        if (count($problemy) > 0) {
            echo "<h2> Wyniki dla: $letter </h2>";
            echo "<table border =1> 
                    <tr>
                        <th>Problem</th>
                        <th>Potencjalna przyczyna</th>
                        <th>Wzorzec myślowy do wyminay</th>
                    </tr>";
            foreach($problemy as $row) {
                echo "<tr> 
                        <td>" . htmlspecialchars($row['problem']) . "</td>
                        <td>" . htmlspecialchars($row['pPrzyczyna']) . "</td>
                        <td>" . htmlspecialchars($row['nowyWzorzec']) . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nie mam dopasowań dla " . htmlspecialchars($letter) . ". Spróbój inaczej nazwać problem.</p>";
        }
        
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();  
    }
}

?>