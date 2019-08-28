<?php   
    include "db.inc.php";
    $bulk =    new MongoDB\Driver\BulkWrite;
    
    $firstname = $_POST["name"];
    $lastname = $_POST["lastname"];
    $mail = $_POST["mail"];
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $encryptPass = password_hash($password,PASSWORD_DEFAULT);
    

    $user = [
        '_id' => new MongoDB\BSON\ObjectId,
        'Nombre' => $firstname,
        'Apellidos' => $lastname,
        'Correo' => $mail,
        'Usuario' => $username,
        'Password' => $encryptPass
    ];

    try{
        $filter = ['Usuario' => $username];
        $query = new MongoDB\Driver\Query($filter);
        $cursor = $manager->executeQuery($tabclientes, $query);
        $found = false;
        foreach($cursor as $document){
            $found = true;
        }
        if ($found){
            echo "No se puede agregar, usuario ya existente"; 
            $valregister = "N";
            header("Location: ./../register.php?varRegister=$valregister");
            exit();

        }
        else{
            $bulk->insert($user);
            
            $result = $manager->executeBulkWrite($tabclientes, $bulk);
            echo "User Added";
            $valregister = "S";
            header("Location: ./../register.php?varRegister=$valregister");
            exit();
        }
        
    }
    catch(MongoDB\Driver\Exception\Exception $e){
        die("Error encontrado: " .$e);

    }
?>