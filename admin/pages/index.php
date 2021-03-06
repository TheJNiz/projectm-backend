<?php 
include("include/authentication.php");

$customer=array();
function selectCustomer(){
    include ('../../QueryScript/mysqlconnect.php');
    $sql = "select ClientID,CustomerName,PhoneNumber,LoanAmount,LoanPeriod,DateCreated, Name as LoanType  from tblCustomer inner join tblLoantype on tblCustomer.LoanTypeID = tblLoantype.id order by DateCreated";
	$result = $conn->query($sql);
		
    if($result->num_rows > 0){
		while ($data = $result->fetch_assoc())
        {
			  $list[] = $data;
		}
    }
	
	return $list;
		
}
  
$customer=selectCustomer();
    
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project M Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

          <?php include('include/nav.php');?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Customer</h1>
                    </div>
                    <?php if($customer!=null){?>
                    <table style="width:80%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                          <td></td>
                          <td>Customer Name</td>
                          <td>Phone Number</td> 
                          <td>Loan Amount (RM)</td>
                          <td>Loan Period (Month)</td>
						  <td>Loan Type</td>
						  <td>Date Created</td>
                        </tr>
                        </thead>
                         <tbody>
                      
                    <?php
					$count =1;
                        foreach($customer as $rows){
                            echo '<tr>';
							echo '<td>'.$count .'</td>';
                            echo '<td>'.$rows['CustomerName'].'</td>';
                            echo '<td>'.$rows['PhoneNumber'].'</td>';
                            echo '<td>'.$rows['LoanAmount'].'</td>';
							echo '<td>'.$rows['LoanPeriod'].'</td>';
							echo '<td>'.$rows['LoanType'].'</td>';
							echo '<td>'.$rows['DateCreated'].'</td>';
                            echo '</tr>';
							$count++;
                        }
                        
                        ?> 
                         </tbody>
                      </table>
                       
                    <?php }?>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
