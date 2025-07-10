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
    include 'header.php';
?>

<body>
    <div class="container-fluid">
        <div class="row register-form">
            <div class="col-md-6 offset-md-3">
                <form class="custom-form" action="order_confirm.php" method="POST">
                    <h1>Complete Your Order</h1>
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Customer Name </label></div>
                        <div class="col-sm-6 input-column"><input class="form-control" type="text" maxlength="50" name="customer_name" required=""></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label" for="number-input-field">Customer Mobile Number</label></div>
                        <div class="col-sm-6 input-column"><input class="form-control" type="number" required="" name="customer_mob_no" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label" for="number-input-field">Customer Email</label></div>
                        <div class="col-sm-6 input-column"><input class="form-control" type="text" required="" name="customer_email" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label" for="address-input-field">Address Line 1</label></div>
                        <div class="col-sm-6 input-column"><input class="form-control" type="text" name="address_line_1" required="" maxlength="100"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label" for="address-input-field">Address Line 2</label></div>
                        <div class="col-sm-6 input-column"><input class="form-control" type="text" name="address_line_2" required="" maxlength="100"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label" for="address-input-field">City</label></div>
                        <div class="col-sm-6 input-column"><input class="form-control" type="text" name="city" required="" maxlength="100"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label" for="address-input-field">State</label></div>
                        <div class="col-sm-6 input-column"><input class="form-control" type="text" name="state" required="" maxlength="100"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label" for="naaddressme-input-field">Pincode</label></div>
                        <div class="col-sm-6 input-column"><input class="form-control" type="number" name="pin_code" required></div>
                    </div>
                    <button class="btn btn-light submit-button" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/File-Input---Beautiful-Input--Button-Approach-Jasny-Bootstrap-fileinput.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
    