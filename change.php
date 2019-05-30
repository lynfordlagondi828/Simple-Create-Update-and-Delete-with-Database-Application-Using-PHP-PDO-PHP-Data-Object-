<?php
   
    require_once 'include/Db_Function.php';
    $database = new Db_Function();

    $message = "";


    if (!isset($_GET['book_id'])) {
		
		$book_id = trim($_GET['book_id']);
	}

	$book_id = intval($_GET['book_id']);
    /**
     * Get single record
     */
    $get = $database->get_single_book_records($book_id);
        $book_name = $get["book_name"];
        $book_author = $get["book_author"];
        $book_isbn = $get["book_isbn"];



        if(isset($_POST["book_name"]) && isset($_POST["book_author"]) && isset($_POST["book_isbn"])){

            $book_name = trim($_POST["book_name"]);
            $book_author = trim($_POST["book_author"]);
            $book_isbn = trim($_POST["book_isbn"]);

            $result = $database->update_single_record($book_id,$book_name,$book_author,$book_isbn);

            if($result != TRUE){

                $message = "BOOKS UPDATED";
                header('location:index.php');
                exit();
            } else{
                $message = "BOOKS NOT UPDATED";
            }
        }

?>

<html>
    <head>
        <title>
            Change
        </title>
    </head>
    <body>
        <h3>Change Record</h3>
        <form method="post">
             <label>Book Name</label> <input type="text" name="book_name" value="<?php echo htmlentities($book_name); ?>">
             <label>Book Author</label><input type="text" name="book_author" value="<?php echo htmlentities($book_author); ?>">
             <label>Book ISBN</label><input type="number" name="book_isbn" value="<?php echo htmlentities($book_isbn); ?>">
             <button name="submit">Submit</button>
        </form>
        <?php echo $message; ?>
    </body>
</html>