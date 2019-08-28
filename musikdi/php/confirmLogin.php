<?php 
    session_start();
    include "db.inc.php";
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $filter = ['Usuario' => $username];
    $query = new MongoDB\Driver\Query($filter);
    $cursor = $manager->executeQuery($tabclientes, $query)->toArray();
    $dbpass = $cursor[0]->Password;
    $valPass = password_verify($password,$dbpass);
    if($valPass){
        $namedb = $cursor[0]->Nombre;
        $_SESSION['Nombre'] = $namedb;
        $_SESSION['_ID'] = $cursor[0]->_id;
        $_SESSION['Apellidos'] = $cursor[0]->Apellidos;
        $_SESSION['email'] = $cursor[0]->Correo;
        $_SESSION['user'] = $cursor[0]->Usuario;
        echo "Hola, ".$namedb;
        header("Location: ../index.php");
    }   
    else {
        $_SESSION = array();
        session_destroy();
        if (ini_get("session.use_cookies")) 
            {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]);
            }
        header("Location: ../login.php?error=1");
    }

?>
