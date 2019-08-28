<?php
    include "db.inc.php";
    try{
        
        $query = new MongoDB\Driver\Query([]);

        $rows = $manager->executeQuery($tabclientes, $query);

        echo "<table>
            <thead>
                <th> Nombre </th>
                <th> Apellido </th>
            </thead>";
        
        foreach($rows as $row){
            echo "
            <tr>.
                <td>".$row->Nombre."</td>".
                "<td>".$row->Apellidos."</td>".
            "</tr>";
        }

        echo "</table";
 
    }
    catch(MongoDB\Driver\Exception\Exception $e){
        die("Error inesperado: " .$e);
        
    }

?>