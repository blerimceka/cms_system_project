 <?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categories Page
                            <small>Subheading</small>
                        </h1>

                        <div class="col-xs-6">
                            
                            <form action="" method="POST">
                                <label for="cat_title">Category Title</label>
                                
                                <?php insert_categories();?>
                                
                                <div class="form-group">
                                    <input class="form-controll" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Categories">
                                </div>
                            </form>

                            <?php

                                if(isset($_GET['edit'])){
                                    $cat_id = $_GET['edit'];

                                    include "includes/update_categories.php";
                                }

                            ?>

                        </div>
                        
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                <!-- SHOW ALL CATEGORIES -->
                                <?php find_all_categories(); ?>
                                <!-- DELETE CATEGORIES -->
                                <?php delete_categories(); ?>
                                </tbody>
                                
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
