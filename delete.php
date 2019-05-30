<?php
    require_once 'include/Db_Function.php';
    $database = new Db_Function();

    if(isset($_GET["book_id"])){

        $book_id = trim($_GET["book_id"]);
    }

    $book_id = intval($_GET["book_id"]);

    $database->delete_single_record($book_id);
    header('location: index.php');
    exit();
?>