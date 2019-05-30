<?php
    require_once 'include/Db_Function.php';
    $database = new Db_Function();

    $result = $database->get_all_records();
?>

<?php if(count($result)>0): ?>
    <table border="1">
        <tr>
            <th>Book ID</th>
            <th>Book Name</th>
            <th>Book Author</th>
            <th>Book ISBN</th>
        </tr>
        <?php foreach($result as $row): ?>
            <tr>
                <td><?php echo htmlentities($row["book_id"]); ?></td>
                <td><?php echo htmlentities($row["book_name"]); ?></td>
                <td><?php echo htmlentities($row["book_author"]); ?></td>
                <td><?php echo htmlentities($row["book_isbn"]); ?></td>
            </tr>
        <?php endforeach ?>
    </table>

    <?php
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename= book report.xls');
     ?>

<?php  else : ?>
    <h3>No Records Found</h3>
<?php  endif ?>