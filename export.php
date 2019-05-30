<?php
    require_once 'include/Db_Function.php';
    $database = new Db_Function();
    $output = '';

    $result = $database->get_all_records();

   if(count($result)>0){

    $output .='
        <table border= 1>
            <tr>
                <th>BOOK ID</th>
                <th>BOOK NAME</th>
                <th>AUTHOR</th>
                <th>ISBN</th>
            </tr>
    ';
    foreach($result as $row){
        $output .= '
            <tr>  
                <td>'.$row["book_id"].'</td>  
                <td>'.$row["book_name"].'</td>  
                <td>'.$row["book_author"].'</td>  
                <td>'.$row["book_isbn"].'</td>  
            </tr>
        ';
    }
   }
    $output .= '</table>';
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename= lynford lagondi book report.xls');
    echo $output;
?>