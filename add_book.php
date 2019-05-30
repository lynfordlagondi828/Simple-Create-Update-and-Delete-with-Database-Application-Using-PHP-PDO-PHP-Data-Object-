<?php
    require_once 'include/Db_Function.php';
    $database = new Db_Function();
    $message = "";

    if(isset($_POST["book_name"]) && isset($_POST["book_author"]) && isset($_POST["book_isbn"])){

        $book_name = trim($_POST["book_name"]);
        $book_author = trim($_POST["book_author"]);
        $book_isbn = trim($_POST["book_isbn"]);

        $result = $database->insert_into_book_record($book_name,$book_author,$book_isbn);

        if($result != TRUE){

            header('location:index.php');
            exit();

        }else{
            $message = "Book Successfully added.";
        }

    }
?>

<html>
    <head>
        <title>
            Add Book
        </title>
    </head>
    <body>
        <h3>Add Book</h3>
        <form method="post">
            <input type="text" name="book_name" placeholder="Book Name" required>
            <input type="text" name="book_author" placeholder="Book Author" required>
            <input type="number" name="book_isbn" placeholder="Book ISBN" required>
            <button name="submit">Save</button>
        </form>
        <?php echo $message; ?>
    </body>
</html>