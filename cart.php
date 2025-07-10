<?php 
    
    include 'header.php';

?>



<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>AGENT</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                    	<a class="nav-link " href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a><a class="nav-link " href="products.php"><svg class="bi bi-card-list" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"> <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"></path> <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"></path> </svg><span>&nbsp;Products</span>
                        </a>
                        <a class="nav-link active" href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor">
                                <rect fill="none" height="24" width="24"></rect>
                                <path d="M13,10h-2V8h2V10z M13,6h-2V1h2V6z M7,18c-1.1,0-1.99,0.9-1.99,2S5.9,22,7,22s2-0.9,2-2S8.1,18,7,18z M17,18 c-1.1,0-1.99,0.9-1.99,2s0.89,2,1.99,2s2-0.9,2-2S18.1,18,17,18z M8.1,13h7.45c0.75,0,1.41-0.41,1.75-1.03L21,4.96L19.25,4l-3.7,7 H8.53L4.27,2H1v2h2l3.6,7.59l-1.35,2.44C4.52,15.37,5.48,17,7,17h12v-2H7L8.1,13z"></path>
                            </svg><span>&nbsp;My Cart (<?php 
                                                            session_start();
                                                            if(isset($_SESSION['cart'])){
                                                                print_r(count($_SESSION['cart'])); 
                                                            }else{
                                                            echo "0";
                                                            }
                                
                                                        ?>)</span>
                        </a>
                        <a class="nav-link" href="orders.php"><svg class="bi bi-list-task" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"></path><path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"></path><path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"></path></svg><span>&nbsp;Orders</span>
                        </a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        
        <?php

    include('navbar.php');

    // session_start();
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['add_to_cart'])){
            if(isset($_SESSION['cart'])){
                $products = array_column($_SESSION['cart'], 'title');
                $_SESSION['cart_products'] = $products;
                if (in_array($_POST['title'], $products)) {
                    echo"
                    <script>
                        alert('Product Already Added!!');
                        window.history.back();
                    </script>
                    ";
                }else{
                $count = count($_SESSION['cart']);

                $_SESSION['cart'][$count] = array('image'=>$_POST['image'], 'title'=>$_POST['title'], 'description'=>$_POST['description'], 'price'=>$_POST['price'], 'quantity'=>1);
                $products = array_column($_SESSION['cart'], 'title');
                $_SESSION['cart_products'] = $products;
                echo"
                    <script>
                        alert('Product Added to Cart!!');
                        window.history.back();
                    </script>
                    ";
                }
            }else{
                $_SESSION['cart'][0] = array('image'=>$_POST['image'], 'title'=>$_POST['title'], 'description'=>$_POST['description'], 'price'=>$_POST['price'], 'quantity'=>1);
                $products = array_column($_SESSION['cart'], 'title');
                $_SESSION['cart_products'] = $products;
                echo"
                    <script>
                        alert('Product Added to Cart!!');
                        window.history.back();
                    </script>
                    ";
            }
        }

        if(isset($_POST['remove'])){
            foreach ($_SESSION['cart'] as $key => $value) {
                if($value['title'] == $_POST['title']){
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    echo "
                        <script>
                            alert('Product Successfully Removed!! ')
                        </script>
                    ";
                }
            }
        }

        if(isset($_POST['remove_all'])){
            foreach ($_SESSION['cart'] as $key => $value) {
                    unset($_SESSION['cart'][$key]);
                    // $_SESSION['cart'] = array_values($_SESSION['cart']);
                    
                
            }
            echo "
                        <script>
                            alert('All Product Successfully Removed!! ')
                        </script>
                    ";
        }

        if(isset($_POST['quantity'])){
            foreach ($_SESSION['cart'] as $key => $value) {
                if($value['title'] == $_POST['title']){
                    $_SESSION['cart'][$key]['quantity'] = $_POST['quantity'];
                    
                }
            }
        }
    }else{
        $_SESSION['cart_products'] = array();
    }
    
?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">My Cart</h3>

                    <?php 
                    
                        if(isset($_SESSION['cart'])){
                    if(count($_SESSION['cart'])>0){
                    ?>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col">
                                    <p class="text-primary m-0 fw-bold">Product Info</p>
                                </div>
                                <div class="col" style="text-align: right;">
                                    <form method='POST'>
                                        <button class="btn btn-danger" name="remove_all">Clear All</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
                                            <th >Quantity</th>
                                            <th>Total Price</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $grand_total = 0;
                                            foreach($_SESSION['cart'] as $key => $value){
                                                $grand_total = $grand_total + ($value['price']*$value['quantity']);
                                                echo"
                                                    <tr>
                                                        <td>".($key+1)."</td>
                                                        <td><img src='admin/uploads/$value[image]' height='100' width='100'></td>
                                                        <td>$value[title]</td>
                                                        <td>$value[price]</td>
                                                        <td>
                                                            <form method='POST'>
                                                                <input style='width:65px;' onchange='this.form.submit();' name='quantity' type='number' value='$value[quantity]' min='1'>
                                                                <input type='hidden' name='title' value='$value[title]'>
                                                            </form>
                                                        </td>
                                                        <td>".($value['price']*$value['quantity'])."</td>
                                                        <td>
                                                            <form method='POST'>
                                                                <button class='btn btn-sm btn-outline-danger' name='remove'>REMOVE</button>
                                                                <input type='hidden' name='title' value='$value[title]'>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                ";
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4"><a class="btn btn-primary" href="products.php">Continue Shopping</a></td>
                                            <td colspan="1" style="text-align:right;"><strong>Grand Total : </strong></td>

                                            <td colspan="1"><strong><?php echo $grand_total; ?></strong></td>
                                            <td colspan="1">
                                                <?php
                                                    if($_SESSION['balance'] < $grand_total){
                                                    echo "<span style='color: red;'>Insufficient Balane</span>";
                                                    }else{
                                                        echo "<a class='btn btn-primary' href='checkout.php'>Checkout</a>";
                                                    }
                                                ?>
                                                
                                            </td>

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>

                    <?php
                        }else{
                            echo"<h2>Your cart is empty.</h2>";
                            echo "<br>";
                            echo "<a class='btn btn-primary' href='products.php'>Continue Shopping</a>";
                        }
                    }else{
                        echo"<h2>Your cart is empty.</h2>";
                        echo "<br>";
                        echo "<a class='btn btn-primary' href='products.php'>Continue Shopping</a>";

                    }
                    ?>
                </div>
            </div>
            
            <?php

    include('footer.php');
    
?>