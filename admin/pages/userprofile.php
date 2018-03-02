<?php 
include('include/connect.php');

  include("include/authentication.php");

 $query = "SELECT * FROM member where email=:Email";
    $statement=$link->prepare($query);
    $statement->execute(array('Email'=> $_SESSION["email"]));    
    if($statement->rowCount()==1){
         $user=  $statement->fetch(PDO::FETCH_ASSOC);
    }

if(isset($_POST['Update'])){
         
        
        if(strlen ($_POST['username'])<5){
            $error['username']="Enter at least 5 charater";
        }
        
        if(strlen ($_POST['password'])<8){
             $error['password']="Enter at least 8 charater";
        }
        
        if($_POST['password']!=$_POST['confirmpassword']){
            $error['confirmpassword']="password and confirm password must be the same";
        }
        
        if(!isset($error)){
            $updatememberQuery="UPDATE member set username=:Username, password=:Password where email=:Email";  
            $statement=$link->prepare($updatememberQuery);
             $statement->bindValue(':Username', $_POST['username']);
             $statement->bindValue(':Password',  md5($_POST['password']));
             $statement->bindValue(':Email',  $_SESSION["email"]);
              $update = $statement->execute();
              echo "<script type='text/javascript'>alert('Update Successful');</script>";
                
        }
       

    
     
}

    
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Profile</title>

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
                        <h1 class="page-header">User Profile</h1>
                    </div>
                    
                    
                    <form  action="" method="post" >
                    <table style="width:80%" class="table  table-bordered table-hover" id="dataTables-example">
                       
                        <tr>
                          
                          <td>User Name</td>
                          <td><input type="text" name="username" value="<?php echo $user['username'];?>"> <?php if(isset($error['username']))echo $error['username'];?></td> 
                     
                          
                        </tr>
                        <tr>
                          
                          <td>Password</td>
                          <td> <input type="password" name="password"> <?php if(isset($error['password']))echo $error['password'];?></td> 
                     
                          
                        </tr>
                      <tr>
                          
                          <td>Confirm Password</td>
                          <td><input type="password" name="confirmpassword"> <?php if(isset($error['confirmpassword']))echo $error['confirmpassword'];?></td> 
                     
                          
                        </tr>
                     <tr><td></td><td><input type="submit" name="Update"></td></tr>
                         
                      </table>
                        </form>
              
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
