<?php 

include 'helpers.php';

try {   
    require 'db.php';

    $filePath = 'afirmacje_byLH.csv';
    if (($handle = fopen($filePath, 'r')) !== false){
        fgetcsv($handle);    
        /* while (($data = fgetcsv($handle, 1000, ';')) !== false){
            print_r($data);
            }*/

        //add data
        $query = 'INSERT INTO afirmacje (problem, problemFormat, pPrzyczyna, nowyWzorzec) VALUES (:problem, :problem_format, :p_przyczyna, :nowy_wzorzec)';
        $stmt = $conn->prepare($query);

        $row_count = 0;
        while (($data = fgetcsv($handle, 1000, ';')) != false) {
            $problem = $data[0];
            $p_przyczyna = $data[1];
            $nowy_wzorzec = $data[2];

            $problem_format = removePolishSmallChars($problem);

            //bind &insert
            $stmt->bindParam(':problem', $problem);
            $stmt->bindParam(':problem_format', $problem_format);
            $stmt->bindParam(':p_przyczyna', $p_przyczyna);
            $stmt->bindParam(':nowy_wzorzec', $nowy_wzorzec); 
            //$stmt->execute(['problem' => $problem, 'p_przyczyna' => $p_przyczyna, 'nowy_wzorzec' => $nowy_wzorzec]);
            
            if ($stmt->execute()) {
                $row_count++;
            }
        }

        fclose($handle);

        echo "Successfully inserted $row_count rows into the database!";
    } 

} catch (Exception $e) {
    echo "Error: ".$e->getMessage();
}

?>