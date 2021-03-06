<?php
    session_start();
    if(!isset($_SESSION['STAFF_ID']) && $_SERVER['PHP_SELF'] != "/ischolar/login.php"){
        header('location: login.php');
    }
    require('../ischolar/connect-db.php');
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iScholar</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
            include('../ischolar/admin-navigation.php');
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            ADNU <small>COLLEGE ADMISSIONS AND AID OFFICE</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Add Office Head User:
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <!--<div class="col-lg-6 col-lg-offset-3">-->
                                    <form role="form" method="post">

                                    <div class="col-lg-6 col-lg-offset-3">
                                        <div class="form-group">
                                            <label>Full Name</label><br />
                                            <div class='col-sm-5'>
                                                <input type="text" maxlength="255" class="form-control" placeholder="Firstname" name="first_name" required>
                                            </div>
                                            <div class='col-sm-5'>
                                                <input type="text" maxlength="255" class="form-control" placeholder="Middle Initial" name="middle_initial" required>
                                            </div>
                                            <div class='col-sm-5'>
                                                <input type="text" maxlength="255" class="form-control" placeholder="Lastname" name="last_name" required>
                                            </div>
                                             <div class='col-sm-5'>
                                                <input type="text" maxlength="255" class="form-control" placeholder="Suffixname" name="suffix_name" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-lg-offset-3">
                                        <div class="form-group">
                                            <label>Address</label>                                            
                                            <input type="text" maxlength="255" class="form-control" placeholder="" name="address" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-lg-offset-3">
                                        <div class="form-group">
                                            <label>Email</label>                                            
                                            <input type="text" maxlength="255" class="form-control" placeholder="you@gbox.adnu.edu.ph" name="email_address" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-lg-offset-3">
                                        <div class="form-group">
                                            <label>Username</label>                                            
                                            <input type="username" maxlength="15" class="form-control" placeholder="" name="username" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-lg-offset-3">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" maxlength="30" class="form-control" placeholder="" name="password" required>
                                        </div>
                                    </div>
                        
                                    <div class="col-lg-6 col-lg-offset-3" align="center">
                                        <button type="submit" class="btn btn-primary" name="addUser">Add Admin</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                    </form>
                                     <?php
                                        if(isset($_POST['addUser'])){
                                            $first_name=$_POST['first_name'];
                                            $middle_initial=$_POST['middle_initial'];
                                            $last_name=$_POST['last_name'];
                                            $suffix_name=$_POST['suffix_name'];
                                            $address=$_POST['address'];
                                            $email_address=$_POST['email_address'];
                                            $username=$_POST['username'];
                                            $password=$_POST['password'];
                                

                                            $sql = "Insert into admission_staff(first_name, middle_initial, last_name, suffix_name, address, email_address) values('$first_name', '$middle_initial', '$last_name', '$suffix_name', '$address', '$email_address');";
                                            $query = mysqli_query($conn, $sql);
                                            $staff_id = mysqli_insert_id($conn);

                                            $sql="insert into user(user_type, username, password, staff_id)
                                            values('A', '$username', '$password', '$staff_id');";
                                            $query = mysqli_query($conn, $sql);

                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- /.row -->

                
                </div>
                <!-- /.row -->

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript
    <script src="js/plugins/morris/raphael.min.js"></script> 
    <script src="js/plugins/morris/morris.min.js"></script> 
    <script src="js/plugins/morris/morris-data.js"></script>  -->

</body>

</html>
