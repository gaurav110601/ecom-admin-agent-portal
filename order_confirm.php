<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION['username'])){
?>
        <script type="text/javascript">
            alert('Please Login First!!');
            window.location = "login.php";
        </script> 
<?php    
    }
date_default_timezone_set("Asia/Kolkata");
	if(isset($_POST['submit'])){
        $customer_name = $_POST['customer_name'];
        $customer_mob_no = $_POST['customer_mob_no'];
        $customer_email = $_POST['customer_email'];
        $shipping_address = $customer_name."<br>".$customer_mob_no."<br>".$_POST['address_line_1']."<br>".$_POST['address_line_2']."<br>".$_POST['city'].",".$_POST['state']."<br>".$_POST['pin_code'];

        $order_id = date("YmdHis");

        $cart_details = "";
        $products = "";
        $products_price = 0;
        foreach ($_SESSION['cart'] as $key => $value) {
        	$products = $products."".$value['title']." (".$value['quantity']."), ";
        	$products_price = $products_price + ($value['price']*$value['quantity']);
            $cart_details = $cart_details."".$value['image'].", ".$value['title'].", ".$value['price'].", ".$value['quantity'].", ".($value['price'] * $value['quantity'])." next product details =>";
        }

        $agent_name = $_SESSION['username'];
        $agent_rem_bal = $_SESSION['balance'] - $products_price;
        $order_date = date("d-m-Y");

        include('database.php');

        $query = 'INSERT INTO orders (order_id, products, products_price, agent_name, agent_rem_bal, cart_details, customer_name, customer_mob_no, customer_email, shipping_address, order_date, order_status) 
        VALUES ("'.$order_id.'", "'.$products.'", "'.$products_price.'", "'.$agent_name.'", "'.$agent_rem_bal.'", "'.$cart_details.'", "'.$customer_name.'", "'.$customer_mob_no.'", "'.$customer_email.'", "'.$shipping_address.'", "'.$order_date.'", "Not Delivered" )';


        $rs = mysqli_query($conn, $query);
        if($rs)
        {
            
			$query2 = 'UPDATE agents SET
                     balance  = "'.$agent_rem_bal.'"
                     WHERE name = "'.$_SESSION['username'].'"';

            $rs2 = mysqli_query($conn, $query2);
 
            
        }

        foreach ($_SESSION['cart'] as $key => $value) {
            unset($_SESSION['cart'][$key]);
        }
        
        mysqli_close($conn);


    }

	include('header.php');
?>

<body id="page-top">
    <div id="wrapper">
    	<div class="container-fluid mt-2">
                    <center>
                    <div class="card shadow mt-4" style="width:500px;">
                        <div class="card-header py-2">
                            <div class="row">
                                <div class="col">
                                    <p class="text-primary m-0 fw-bold">Thank You!! Your Order is Placed</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <tbody>
                                        <tr>
                                            <td style="text-align:right;"><b>Order ID:</b></td>
                                            <td><?php echo $order_id; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right;"><b>Customer Name:</b></td>
                                            <td><?php echo $customer_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right;"><b>Customer Mobile Number:</b></td>
                                            <td><?php echo $customer_mob_no; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right;"><b>Customer Email:</b></td>
                                            <td><?php echo $customer_email; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right;"><b>Products:</b></td>
                                            <td><?php echo $products; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right;"><b>Products Price:</b></td>
                                            <td><?php echo $products_price; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right;"><b>Your Remaining Balance:</b></td>
                                            <td><?php echo $agent_rem_bal; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right;"><b>Shipping Address:</b></td>
                                            <td><?php echo $shipping_address; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right;"><b>Order Date:</b></td>
                                            <td><?php echo $order_date; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><center><a class="btn btn-primary mt-2" style="border-radius: 50px;" href="products.php">Continue Shopping</a></center></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div></center>
                </div>
            </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>