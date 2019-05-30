<?php
    require_once 'include/Db_Function.php';
    $database = new Db_Function();

    $keyword = '';
    if(isset($_POST["keyword"]))
    {
        $keyword = trim($_POST["keyword"]);
    }
    if($keyword =='')

        $result = $database->get_all_records();
    else 
        $result = $database->search_book($keyword);
?>

<html>
    <head>
        <title>
            Download Record from Mysql Database into excel
        </title>
        <style>
            body{
                background-color: #d0d0d0;
                margin-left: 15%;
            }
        </style>
    </head>
 
<body>
     <h3>Simple Create, Update and Delete with Database Application Using PHP PDO(PHP Data Object)</h3>   
     <h4>Javascript, HTML, PHP and CSS</h4>
     <p id="demo"></p>

     <script>
        document.getElementById("demo").innerHTML = Date();
    </script>

    <button name="button" onclick="display_developer()">Developer</button>
    <button name="button" onclick="display_tools()">Tools</button>
   
    <p id="my_view"></p>

    <script>
        function display_developer(){
            document.getElementById("my_view").innerHTML= "Developer: Lynford A. Lagondi -  Web and Mobile Developer. ";
        }
    </script>

    <p id="my_tools"></p>
    <script>
        function display_tools(){
            document.getElementById("my_tools").innerHTML ="Tools: Visual Studio Code, Xampp and MySQL Database";
        }
    </script>


     <p>
         <a href="add_book.php">Add Book</a>
         <form method="post">
             <input type="text" name="keyword" placeholder="Search Book name">
             <button name="submit">Search</button>
         </form>
     </p>
     <?php if(count($result)>0): ?>
        <table border="1">
            <tr>
                <th>BOOK ID</th>
                <th>BOOK NAME</th>
                <th>AUTHOR</th>
                <th>ISBN</th>
                <th>Action</th>
            </tr>
            <?php foreach($result as $res): ?>
                <tr>
                    <td><?php echo htmlentities($res["book_id"]); ?></td>
                    <td><?php echo htmlentities($res["book_name"]); ?>
                    <td><?php echo htmlentities($res["book_author"]); ?>
                    <td><?php echo htmlentities($res["book_isbn"]); ?>

                    <td>
                    
                        <a href="change.php?book_id=<?php echo htmlentities($res['book_id']); ?>">Change</a>
                        <a href="delete.php?book_id=<?php echo htmlentities($res["book_id"]); ?>" onclick="return confirm('Delete?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
        <a href="export.php">Export to Excel</a>
        <a href="download.php">Download</a>
     <?php else: ?>
        <p>No Record found</p>
     <?php endif ?>
</body>    
</html>