
<?php

function confirm_query($result){
    global $conn;

    if(!$result){
        die("QUERY FAILED" . mysqli_error(!$conn));
    }

}

function insert_categories(){
    global $conn;
    
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];

        $cat_title = mysqli_real_escape_string($conn, $cat_title);

        $query = "INSERT INTO categories(cat_title) VALUES('{$cat_title}')";
        $create_category_query = mysqli_query($conn, $query);

        if(!$create_category_query){
            die("Query Failed!" . mysqli_error($conn));
        }
    }

}


function find_all_categories(){
    global $conn;
    
    $query = "SELECT * FROM categories";
    $show_all_categories = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($show_all_categories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

    ?>
                                        
        <tr>
            <td><?php echo $cat_id; ?></td>
            <td><?php echo $cat_title; ?></td>
            <td><a href="categories.php?delete=<?php echo $cat_id; ?>">Delete</a></td>
            <td><a href="categories.php?edit=<?php echo $cat_id; ?>">Edit</a></td>
        </tr>  
    <?php
    } 

}


function delete_categories(){
    global $conn;

    if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
        
        $query = "DELETE FROM categories WHERE cat_id={$the_cat_id}";
        $delete_query = mysqli_query($conn, $query);

        if(!$delete_query){
            die("Query Failde!" . mysqli_error($conn));
        }else {
            header("Location: categories.php");
        }
    }
}

?>