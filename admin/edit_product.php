<?php
    include('header.php');
    // include_once('header.php');
    // require('header.php');
    // require_once('header.php');

    ?>

    <body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>ADMIN</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="agents.php"><i class="far fa-user"></i><span>Agent</span></a><a class="nav-link active" href="products.php"><svg class="bi bi-card-list" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"> <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"></path> <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"></path> </svg><span>&nbsp;Products</span></a><a class="nav-link" href="orders.php"><svg class="bi bi-list-task" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"></path>
    <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"></path>
    <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"></path>
</svg><span>&nbsp;Orders</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>

        <?php

    include('navbar.php');
    date_default_timezone_set("Asia/Kolkata");
    
    include 'database.php';
    // $ID;
    // $id = isset($_GET['edit']);
    if(isset($_GET['edit']))
    {
        $id = $_GET['edit'];
        $query = "SELECT * FROM products  WHERE id= $id";
        $result = mysqli_query($conn, $query);
        $editData= mysqli_fetch_assoc($result);
        $name = $editData['name'];
        $description = $editData['description'];
        $image = $editData['images'];
        $slab_1_price = $editData['slab_1_price'];
        $slab_2_price = $editData['slab_2_price'];
        $slab_3_price = $editData['slab_3_price'];

        // $ID = $id;
// echo $ID;
    }
    
    // echo $id;
    if(isset($_POST['update']) /*&& isset($_GET['edit'])*/ ){
        $query = "SELECT images FROM products  WHERE id= $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);
        $image = $data['images'];
        // echo $ID;
        // $id = $_GET['edit'];
        // echo $id;
        $name = $_POST['name'];
        $description = $_POST['description'];
        $img = $_FILES['image'];
        $slab_1_price = $_POST['slab_1_price'];
        $slab_2_price = $_POST['slab_2_price'];
        $slab_3_price = $_POST['slab_3_price'];
        
        // print_r($image);

        $image_name = date("YmdHis")."_".$img['name'];
        $image_path = $img['tmp_name'];
        $image_error = $img['error'];

        if ($image_error == 0){
            $image_dest = 'uploads/'.$image_name;
unlink("uploads/".$image);
            move_uploaded_file($image_path, $image_dest);

            $query = 'UPDATE products SET
                     name="'.$name.'",
                     description  = "'.$description.'",
                     images   = "'.$image_name.'",
                     slab_1_price  = "'.$slab_1_price.'",
                     slab_2_price = "'.$slab_2_price.'",
                     slab_3_price    = "'.$slab_3_price.'"
                     WHERE id = "'.$id.'"';

            $rs = mysqli_query($conn, $query);

            if($rs)
            {
                // echo "Product added successfully.";

            // header("Location: success.html");
            // exit();

                ?>
                    <script type="text/javascript">
                    alert('Product updated successfully');
                        window.location = "products.php";
                    </script> 

                <?php 
                   
            }

       mysqli_close($conn);
        }else{

            $query = 'UPDATE products SET
                     name="'.$name.'",
                     description  = "'.$description.'",
                     slab_1_price  = "'.$slab_1_price.'",
                     slab_2_price = "'.$slab_2_price.'",
                     slab_3_price    = "'.$slab_3_price.'"
                     WHERE id = "'.$id.'"';
echo $query;
            $rs = mysqli_query($conn, $query);

            if($rs)
            {
                // echo "Product added successfully.";

            // header("Location: success.html");
            // exit();

                ?>
                    <script type="text/javascript">
                    alert('Product updated successfully');
                        window.location = "products.php";
                    </script> 

                <?php 
                   
            }

       mysqli_close($conn);
        }
    }

?>

                <div class="container-fluid">
                    <div class="row register-form">
                        <div class="col-md-8 offset-md-2">
                            <form class="custom-form" action="edit_product.php?edit=<?php echo $id; ?>" method="POST"  enctype="multipart/form-data">
                                <h1>Add Product</h1>
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Name </label></div>
                                    <div class="col-sm-6 input-column"><input class="form-control" type="text" maxlength="100" name="name" value="<?php echo $name; ?>" required=""></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Description</label></div>
                                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="description" value="<?php echo $description; ?>" required="" maxlength="500"></div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Image</label></div>
                                    <div class="col-sm-6 input-column">
                                        <input class="form-control" type="file" name="image" accept="image/*" >
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Slab 1 Price</label></div>
                                    <div class="col-sm-6 input-column"><input class="form-control" type="number" name="slab_1_price" value="<?php echo $slab_1_price; ?>" min="0" required=""></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Slab 2 Price</label></div>
                                    <div class="col-sm-6 input-column"><input class="form-control" type="number" name="slab_2_price" value="<?php echo $slab_2_price; ?>" min="0" required=""></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Slab 3 Price</label></div>
                                    <div class="col-sm-6 input-column"><input class="form-control" type="number" name="slab_3_price" value="<?php echo $slab_3_price; ?>" min="0" required=""></div>
                                </div>

                                    <p style="color:red; margin-bottom: 0px;">If you want update image then choose new file otherwise leave it empty</p>
                                
                                <button class="btn btn-light submit-button" type="submit" name="update">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php 
            include 'footer.php'

            ?>