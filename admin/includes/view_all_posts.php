<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
    <?php

        $query = "SELECT * FROM posts ";
        $insert_post_query = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($insert_post_query)){
            $post_id = $row['post_id'];
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];
                                
            echo "<tr>";
                echo "<td>$post_id</td>";
                echo "<td> $post_author</td>";
                echo "<td>$post_title</td>";
                echo "<td>$post_category_id</td>";
                echo "<td>$post_status</td>";
                echo "<td><a width='100'  href='./images/$post_image'></a></td>";
                echo "<td>$post_tags</td>";
                echo "<td> $post_comment_count</td>";
                echo "<td>$post_date</td>";
                echo "<td><a href='post.php?source=edit_post&p_id={$post_id}' >Edit</a>";
                echo "<td><a href='post.php?delete={$post_id}' >Delete</a>";
            echo "</tr>";
                
        }
    ?>  
    </tbody>
</table>

<?php

    if(isset($_GET['delete'])){

        $the_post_id = $_GET['delete'];

        $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
        $delete_query = mysqli_query($conn, $query);

        confirm_query($delete_query);

        header("Location: post.php");

    }

?>























