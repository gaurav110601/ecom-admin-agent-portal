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
    

    include('database.php');

    
    if(isset($_GET['limit'])){
        $limit = $_GET['limit'];
    }else{
        $limit = 10;
    }
    // $page = $_GET['page'];
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $offset = ($page - 1) * $limit;

$table_search = "";
        if(isset($_POST['table_search_submit'])){
            $table_search = $_POST['table_search'];
            // echo $table_search;
        }

        if($table_search == ""){
            $query = "SELECT * FROM products ORDER BY id DESC LIMIT {$offset},{$limit}";
    $result = mysqli_query($conn, $query);
            // echo $table_search;
        }else{
            // echo $table_search;
            $query = "SELECT * FROM products WHERE name LIKE '%$table_search%' or  description LIKE '%$table_search%'  ORDER BY id DESC LIMIT {$offset},{$limit}";
    $result = mysqli_query($conn, $query);
        }

    


    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        $query = "SELECT images FROM products  WHERE id= $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);
        $image = $data['images'];
        
        $query = "DELETE FROM products  WHERE id= $id";
        $result = mysqli_query($conn, $query);

        unlink("uploads/".$image);

        if($result){
            // echo "data was deleted successfully";

            ?>
                <script type="text/javascript">
                    alert('Product deleted successfully');

                    window.location = "products.php";
                </script> 

            <?php 
          }
        
    }
?>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Products</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col">
                                    <p class="text-primary m-0 fw-bold">Product Info</p>
                                </div>
                                <div class="col" style="text-align: right;"><a class="btn btn-primary" role="button" style="text-align: left;" href="add_product.php">+ Add</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                                <option value="products.php?limit=10" <?php 
                                                if(!(isset($_GET['limit'])) || ($_GET['limit'] == 10)){
                                                    echo 'selected';
                                                }
                                            ?>>10</option>
                                                <option value="products.php?limit=25" <?php 
                                                if(isset($_GET['limit']) && ($_GET['limit'] == 25)){
                                                    echo 'selected';
                                                }
                                            ?>>25</option>
                                                <option value="products.php?limit=50" <?php 
                                                if(isset($_GET['limit']) && ($_GET['limit'] == 50)){
                                                    echo 'selected';
                                                }
                                            ?>>50</option>
                                                <option value="products.php?limit=100" <?php 
                                                if(isset($_GET['limit']) && ($_GET['limit'] == 100)){
                                                    echo 'selected';
                                                }
                                            ?>>100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" method="POST" action="products.php">
                                            <div class="input-group">
                                                <label class="form-label">
                                                    <input type="text" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search" name="table_search">
                                                </label>
                                                <button class="btn btn-primary py-0" type="submit" name="table_search_submit"><i class="fas fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th style="width:100px;">Name</th>
                                            <th style="width:100px;">Description</th>
                                            <th>Images</th>
                                            <th>Slab 1 Price</th>
                                            <th>Slab 2 Price</th>
                                            <th>Slab 3 Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            $sn=$offset+1;
                                            while($data = mysqli_fetch_assoc($result)) {
                                    ?>

                                        <tr>
                                            <td> <?php echo $sn; ?> </td>
                                            <td> <?php echo $data['name']; ?> </td>
                                            <td> <?php echo $data['description']; ?> </td>
                                            <td><img src="uploads/<?php echo $data['images']; ?>" width="200" height="200"></td>
                                            <td> <?php echo $data['slab_1_price']; ?> </td>
                                            <td> <?php echo $data['slab_2_price']; ?> </td>
                                            <td> <?php echo $data['slab_3_price']; ?> </td>
                                            <td><a class="btn btn-primary" role="button" href="edit_product.php?edit=<?php echo $data['id']; ?>" name="edit">Edit</a>
                                                <a class="btn btn-danger" role="button" href="products.php?delete=<?php echo $data['id']; ?>" name="delete">Delete</a>
                                            </td>
                                        </tr>

                                    <?php
                                        $sn++;
                                    }
                                }else{
                                            ?>

                                            <td colspan="8"> <center><span style="color:red;">No data found</span></center> </td>

                                            <?php

                                        }  ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S.No.</th>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Description</strong></td>
                                            <td><strong>Images</strong></td>
                                            <td><strong>Slab 1 Price</strong></td>
                                            <td><strong>Slab 2 Price</strong></td>
                                            <td><strong>Slab 3 Price</strong></td>
                                            <td><strong>Action</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <?php

                            $sql = "SELECT * FROM products";
                            $rs = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($rs) > 0){

                                $total_records = mysqli_num_rows($rs);
                                
                                $total_page = ceil($total_records / $limit);

                                $show_from_record = ($offset + 1);
                                if($page!=$total_page){
                                    $show_to_record = ($limit * $page);
                                }else{
                                    $show_to_record = $total_records;
                                }

                                ?>

                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite"><?php echo'Showing '.$show_from_record.' to '.$show_to_record.' of '.$total_records; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <?php
                                            if($page > 1){
                                                echo '<li class="page-item"><a class="page-link" aria-label="Previous" href="products.php?page='.($page -1).'"><span aria-hidden="true">«</span></a></li>';
                                            }else{
                                                echo '<li class="page-item disabled"><a class="page-link" aria-label="Previous" href="products.php?page='.($page -1).'"><span aria-hidden="true">«</span></a></li>';
                                            }
                                            
                                            for($i =1; $i<=$total_page; $i++){
                                                if($i == $page){
                                                    $active = "active";
                                                }else{
                                                    $active = "";
                                                }
                                                echo '<li class="page-item '.$active.'"><a class="page-link" href="products.php?page='.$i.'">'.$i.'</a></li>';
                                            }

                                            if($total_page > $page){
                                                echo '<li class="page-item"><a class="page-link" aria-label="Next" href="products.php?page='.($page +1).'"><span aria-hidden="true">»</span></a></li>';
                                            }else{
                                                echo '<li class="page-item disabled"><a class="page-link" aria-label="Next" href="products.php?page='.($page +1).'"><span aria-hidden="true">»</span></a></li>';
                                            }
                                            
                                            ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php 
            include 'footer.php'

            ?>