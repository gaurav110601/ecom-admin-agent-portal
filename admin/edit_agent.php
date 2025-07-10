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
                    <li class="nav-item"><a class="nav-link active" href="agents.php"><i class="far fa-user"></i><span>Agent</span></a><a class="nav-link" href="products.php"><svg class="bi bi-card-list" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"> <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"></path> <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"></path> </svg><span>&nbsp;Products</span></a><a class="nav-link" href="orders.php"><svg class="bi bi-list-task" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
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
    

    include 'database.php';
    // $ID;
    // $id = isset($_GET['edit']);
    if(isset($_GET['edit']))
    {
        $id = $_GET['edit'];
        $query = "SELECT name, mob_no, email, password, address, company, gst, balance,slab FROM agents  WHERE id= $id";
        $result = mysqli_query($conn, $query);
        $editData= mysqli_fetch_assoc($result);
        $name = $editData['name'];
        $mob_no = $editData['mob_no'];
        $email = $editData['email'];
        $password = $editData['password'];
        $address = $editData['address'];
        $company = $editData['company'];
        $gst = $editData['gst'];
        $balance = $editData['balance'];
        $slab = $editData['slab'];

        // $ID = $id;
// echo $ID;
    }
    // echo $id;
    if(isset($_POST['update']) /*&& isset($_GET['edit'])*/ ){
        // echo $ID;
        // $id = $_GET['edit'];
        // echo $id;
        $name = $_POST['name'];
        $mob_no = $_POST['mob_no'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $company = $_POST['company'];
        $gst = $_POST['gst'];
        $new_bal = $_POST['add_fund'];
        $slab = $_POST['slab'];
        $query   =  "UPDATE agents SET
                     name='$name',
                     mob_no  = '$mob_no',
                     email   = '$email',
                     password   = '$password',
                     address  = '$address',
                     company = '$company',
                     gst    = '$gst',
                     balance    = balance + '$new_bal',
                     slab   = '$slab'
                     WHERE id = '$id'";
       $rs= mysqli_query($conn, $query);
       if($rs){
           // header("Location: success.html");
            // exit();
// echo "agent edited successfully";
            ?>
                <script type="text/javascript">
                    alert('Agent updated successfully');
                    window.location = "agents.php";
                </script> 

            <?php 
            
       }
       mysqli_close($conn);
     }

?>

                <div class="container-fluid">
                    <div class="row register-form">
                        <div class="col-md-8 offset-md-2">
                            <form class="custom-form" action="edit_agent.php?edit=<?php echo $id; ?>" method="POST">
                                <h1>Edit Agent Info</h1>
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Name </label></div>
                                    <div class="col-sm-6 input-column"><input class="form-control" type="text" maxlength="25" name="name" required="" value="<?php echo $name; ?>"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Mobile Number</label></div>
                                    <div class="col-sm-6 input-column"><input class="form-control" type="tel" required="" name="mob_no" value="<?php echo $mob_no ?>"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field">Email </label></div>
                                    <div class="col-sm-6 input-column"><input class="form-conntrol" type="email" name="email"  required="" maxlength="50"></div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field">Password </label></div>
                                    <div class="col-sm-6 input-column"><input class="form-conntrol" type="text" name="password"  required="" maxlength="50"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Address</label></div>
                                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="address" required="" maxlength="100" value="<?php echo $address; ?>"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Company Name</label></div>
                                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="company" value="<?php echo $company; ?>" required="" maxlength="30"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">GST</label></div>
                                    <div class="col-sm-6 input-column"><input class="form-control" type="number" name="gst" value="<?php echo $gst; ?>" min="0" max="50"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column">
                                        <div class="row">
                                            <div class="col" style="margin-top: 5px;"><label class="col-form-label" for="name-input-field">Current Balance</label></div>
                                        </div>
                                        <div class="row">
                                            <div class="col" style="margin-top: 8px;"><label class="col-form-label" for="name-input-field">Add Funds</label></div>
                                        </div>
                                        <div class="row">
                                            <div class="col" style="margin-top: 10px;"><label class="col-form-label" for="name-input-field">New Balance</label></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 input-column">
                                        
                                        <div class="row form-group">
                                            
                                            <div class="col-sm-12 input-column" style="margin: 1px;"><input id="curr_bal" class="form-control" type="number" name="curr_bal" value="<?php echo $balance; ?>" disabled></div>

                                            <div class="col-sm-12 input-column" style="margin: 1px;"><input id="add_fund" class="form-control" type="number" name="add_fund" value="" placeholder="0" onInput="add()"></div>

                                            <div class="col-sm-12 input-column" style="margin: 1px;"><input id="new_bal" class="form-control" type="number" name="new_bal" value="<?php echo $balance; ?>" disabled></div>
                                        
                                        </div>
                                    
                                    <script>
                                        function add(){
                                            let curr_bal = parseInt(document.getElementById("curr_bal").value);
                                            let add_fund = parseInt(document.getElementById("add_fund").value);
                                            let new_bal = (document.getElementById("new_bal"));
                                            
                                            new_bal.value = (curr_bal + add_fund);
                                        }
                                    </script>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="dropdown-input-field">Slab</label></div>
                                    <div class="col-sm-4 input-column"><select class="form-select" name="slab" required=""  >
                                            <option value="<?php echo $slab; ?>" >Slab <?php echo $slab; ?></option>
                                            <?php 
                                                if(($slab) != 1){
                                                    ?>
                                                    <option value="1" >Slab 1</option>
                                                    <?php
                                                }
                                            ?>
                                            <?php 
                                                if(($slab) != 2){
                                                    ?>
                                                    <option value="2" >Slab 2</option>
                                                    <?php
                                                }
                                            ?>
                                            <?php 
                                                if(($slab) != 3){
                                                    ?>
                                                    <option value="3" >Slab 3</option>
                                                    <?php
                                                }
                                            ?>
                                            
                                        </select></div>
                                </div><button class="btn btn-light submit-button" type="submit"  name="update">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php 
            include 'footer.php'

            ?>