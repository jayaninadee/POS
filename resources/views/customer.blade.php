<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <title>Uresha POS System</title>
    <link href="img/favicon.png" rel="icon" type="image/x-icon">
    <link href="assests/css/styles.css" rel="stylesheet">
    <link href="assests/css/bootstrap.min.css" rel="stylesheet">
    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<!--Common Section Start-->
<nav class="navbar navbar-expand-md navbar-dark bg-light sticky-top w-100" id="nav-bar-main">
    <img alt="logo image" class="float-left" height="75px" src="assests/image/rsz_logo.png">
    <a class="navbar-brand font-weight-bold " href="#" id="title-text">Uresha POS System</a>
    <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
            class="navbar-toggler bg-success" data-target="#navbarSupportedContent"
            data-toggle="collapse" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="font-size: 1em">
            <li class="nav-item">
                <a class="nav-link text-primary" href="index.html">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="order.html">Orders </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="item.html">Items <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle text-primary" data-toggle="dropdown"
                   href="#" id="navbarDropdown" role="button">
                    Others
                </a>
                <div aria-labelledby="navbarDropdown" class="dropdown-menu">
                    <a class="dropdown-item" href="customer.html">Customers</a>
                    <a class="dropdown-item" href="#">Employees</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">About</a>
                </div>
            </li>
        </ul>
        <div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"><i class="fas fa-user-plus"></i>Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"><i class="fas fa-sign-out-alt"></i>Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!----------------------->
<div class="container mt-4">
    <!--main tile-->
    <div class="bg-light main-title mb-0">
        <h2><i class="fas fa-users"></i> Customer</h2>
    </div>
    <div class="front-nav-bar ">
        Home > <b>Customer</b>
    </div>

    <div class="jumbotron pt-4 mb-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-success">Customer Search</div>
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="Input Name/NIC/Tp Here" id="txtSCID" type="text">
                        </div>
                        <div class="form-group form-inline">
                            <button class="btn btn-success mb-2" id="btnSearch">Search</button>
                            &nbsp;&nbsp;&nbsp;
                            <select class="form-control mb-2">
                                <option>Name</option>
                                <option>NIC</option>
                                <option>Tp</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-action-buttons m-3">
                    <div class="btn-group">
                        <button class="btn btn-danger" id="btnDeleteCustomer" type="button">Delete</button>
<!--                        <button class="btn btn-warning" id="btnUpdateCustomer" type="button">Edit</button>-->
                        <button class="btn btn-info" id="btnSearchCustomer" type="button">Details</button>
                        <button class="btn btn-success" id="btnClearAll" type="button">Clear</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 menu-button-group">
                <div class="center-on-lg">
                    <div class="btn-group float-right mt-lg-0 mb-3">
                        <button class="btn btn-info" data-target="#myModal" data-toggle="modal" type="button">New
                            Customer
                        </button>
                        <button class="btn btn-warning" id="btnGetAllCustomer" type="button">View All Customers</button>
                    </div>
                </div>
            </div>

            <!--new customer adding-->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog" role="document">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 class="modal-title">New Customer</h4>
                            <button class="close" data-dismiss="modal" type="button">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="" id="customerForm">
                                <div class="form-group ">
                                    <label for="txtCustomerID">Customer ID :</label>
                                    <input class="form-control" id="txtCustomerID" type="text" name="customerID">
                                    <label for="txtCustomerName">Customer Name :</label>
                                    <input class="form-control" id="txtCustomerName" type="text" name="customerName">
                                    <label for="txtCustomerAddress">Customer Address :</label>
                                    <input class="form-control" id="txtCustomerAddress" type="text" name="customerAddress">
                                    <label for="txtCustomerSalary">Customer Salary :</label>
                                    <input class="form-control" id="txtCustomerSalary" type="number" name="customerSalary">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" id="btnSaveCustomer" type="button">Save</button>
                            <button class="btn btn-warning" id="btnUpdate" type="button">Renew</button>
                            <button class="btn btn-info"  data-dismiss="modal" type="button">Close</button>
                        </div>
                    </div>

                </div>
            </div>

            <!--table-->
            <div class="col-md-12 mt-4" style="height:180px; overflow-y: scroll">
                <table class="table table-bordered">
                    <thead style="background: #00bfa5">
                    <tr>
                        <th>Customer Name</th>
                        <th>Age</th>
                        <th>Tp</th>
                        <th>Salary</th>
                    </tr>
                    </thead>
                    <tbody class="bg-light" id="tbl-body">

                    </tbody>
                </table>
            </div>
            <!---->
        </div>
    </div>
</div>
<!--footer-->
<div class="footer-text btn-dark text-center">Developed by Uresha Lakshani @ IJSE</div>

<script src="assests/js/jquery-3.4.1.min.js" type="application/javascript"></script>
<script src="assests/js/bootstrap.min.js" type="application/javascript"></script>
<script src="assests/controller/CustomerController.js" type="application/javascript"></script>
</body>
</html>
