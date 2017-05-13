<?php
    $dsn = 'mysql:host=sql1.njit.edu;dbname=vjk5';
    $username = 'vjk5';
    $password = 'zurich68';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }

    function display_db_error($error_message) {
        global $app_path;
        include('../errors/database_error.php');
        exit();
}

?>