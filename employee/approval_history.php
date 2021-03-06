<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="keywords" content="Demonstrations From Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />


    <title>DTR Report</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>


    
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    

</head>

<body style="background-color:#edf2f4;">

<?php

include('../server.php');
//Check if the user is logged In
if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] == true) {
   
} else {
    header('location: ../login.php');;
}

$query1 = "SELECT EMPLOYEE_ID FROM office_head WHERE ID_NUMBER = '{$_SESSION['username']}'";
                $result1 = mysqli_query($connect, $query1);
                $row1 = mysqli_fetch_assoc($result1);
                $val = $row1['EMPLOYEE_ID'];
                 // stores employee id

$query3 = "SELECT dtr_approval.DATE_APPROVED,  dtr_approval.DTR_MONTH,  dtr_approval.DTR_YEAR,  dtr_approval.DTR_MONTH, student_assistant.FIRST_NAME, student_assistant.MIDDLE_INITIAL, student_assistant.LAST_NAME FROM dtr_approval INNER JOIN student_assistant ON dtr_approval.SA_ID = student_assistant.SA_ID WHERE dtr_approval.EMPLOYEE_ID = '$val'";
$result3 = mysqli_query($connect, $query3 );

/*
$query3 = "SELECT * FROM dtr_approval WHERE EMPLOYEE_ID = '$val'";
$result3 = mysqli_query($connect, $query3 );*/

/*
SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;
*/
$query4 = "SELECT * FROM STUDENT_ASSISTANT FROM WHERE ID_NUMBER = '{$_SESSION['username']}'";
                $result4 = mysqli_query($connect, $query4);
                $row4 = mysqli_fetch_assoc($result1);
                $val = $row4['EMPLOYEE_ID'];
?>

    <div id="wrapper">

         <?php include('navigation_employee.php');?>

        <div id="page-wrapper"  style="background-color:#edf2f4;">

            <div class="container-fluid">

                <!-- Page Heading -->
                   <!--row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           <!-- DTR Reports -->
                            ADNU <small><?php echo $_SESSION['office'] ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.html">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-history"></i> Approval History
                            </li>
                        </ol>
                    </div>
                </div>
                <!--row -->

                <div class="row">
                     <div class="col-lg-12">
                        <div class="panel panel-primary" style="border: 0">
                            <div class="panel-heading" style='border-bottom: 2px solid rgb(255, 153, 51); border-radius;'>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-2x"><?php echo "  " ?>Approval History</i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><strong> </strong></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body" style=" background-color: #fffcd8;">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <caption><strong><?php echo $_SESSION['office']; ?></strong></caption>
                                        <thead>
                                            <tr>    
                                                <th>Approval Date</th>
                                                <th>Name of Student Assistant</th>
                                                <th>MONTH APPROVED</th>
                                                <th>YEAR APPROVED</th>
                                                <th></th>
                                            </tr>

                                        </thead>
                                    <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result3)){ 
                                                ?>
                                                <tr>
                                                <td><?php echo $row['DATE_APPROVED']?></td>
                                                <td><?php echo $row['FIRST_NAME']." ".$row['MIDDLE_INITIAL']."."." ".$row['LAST_NAME']?></td>
                                                <td><?php echo $row['DTR_MONTH']?></td>
                                                <td><?php echo $row['DTR_YEAR']?></td>
                                            </tr>
                                                <?php 
                                                }
                                                mysqli_free_result($result1);
                                                mysqli_close($connect);
                                                ?> 

                                    </tbody>
                                </table>
                            </div>
                            </div>  
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>

<script type="text/javascript" src="../js/jquery.mask.js"></script>
    <!-- jQuery  -->

    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript  -->

    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
