<form action="" method="POST">
    <label for="cat_title">Edit Category</label>
        <!-- EDIT CATEGORY -->
        <?php
                                    
            if(isset($_GET['edit'])){

                $cat_id = $_GET['edit'];

                $query = "SELECT * FROM categories WHERE cat_id=$cat_id";
                $select_categories_id = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($select_categories_id)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                ?>
                    <div class="form-group">
                        <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" class="form-controll" type="text" name="cat_title">
                    </div>
                <?php
                }
            }
        ?>                   
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
        </div>
        <!-- UPDATE CATEGORY -->
        <?php 

            if(isset($_POST['update_category'])){
                $the_cat_title = $_POST['cat_title'];

                $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id={$cat_id}";
                $update_query = mysqli_query($conn, $query);

                if(!$update_query){
                    die("Query Failed" . mysqli_error($conn));
                }
            }

        ?>
</form>