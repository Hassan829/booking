<?php
require "includes/functions.php";
if(isset($_SESSION['userRole']) && !empty($_SESSION['userRole']) &&  $_GET['bookingId'] &&
 $_GET['bookingId'] > 0){ 

$bookingDetails = getBookingById( $_GET['bookingId'] );



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reservation System </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

 <style>
    @media (max-width: 768px){
.modal-dialog {
    width: 100% !important;
    margin: 30px auto;
}
    }
    @media only screen and (min-width: 992px) {


      .modal-dialog {
    width: 60% !important;
    margin: 30px auto;
}
    }
 </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
     <span class="logo-mini">RS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Reservation System</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
     <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="color: white; text-transform: uppercase;"><?php echo $_SESSION['userRoleName']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
           
          </a>
         
        </li>

 
        <li>
          <a href="bookinglist.php">
            <i class="fa fa-list"></i> <span>Booking List</span>
           
          </a>
        </li>

        <li>
          <a href="reviewlist.php">
            <i class="fa fa-list"></i> <span>Reviews List</span>
           
          </a>
        </li>
        <?php if($_SESSION['userRole'] == 1) {?>
        <li>
          <a href="notes.php">
            <i class="fa fa-list"></i> <span>Notes</span>
           
          </a>
        </li>
        <?php }?>
        <li>
          <a href="logout.php">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
           
          </a>
        </li>
    
     
     
          </ul>
      
       
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Booking Details
      </h1>
  
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <form class="form-horizontal" action="" method="post">
          <fieldset disabled="disabled">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="customerName" class="col-sm-3 control-label">Customer Name</label>
          
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="customerName" id="customerName" placeholder="Customer Name "  value="<?php echo $bookingDetails->customername; ?>">
                              <input type="hidden" class="form-control" name="bookingId" id="bookingId"   value="<?php echo $bookingDetails->bookingid; ?>" >
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="contactDetails" class="col-sm-3 control-label">Contact Detail</label>
          
                            <div class="col-sm-9">
                              <input type="number" class="form-control" id="contactNo" name="contactNo" placeholder="Contact Detail" value="<?php echo $bookingDetails->contactno; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="address" class="col-sm-3 control-label">Address</label>
          
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $bookingDetails->address; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="reservationDate" class="col-sm-3 control-label">Reservation Date</label>
          
                            <div class="col-sm-3">
                              <input type="date" class="form-control" id="reservationDate" name="reservationDate" placeholder="Contact Detail" value="<?php echo $bookingDetails->reservationdate; ?>">
                            </div>
                             <label for="reservationTimeE" class="col-sm-3 control-label">Reservation Time</label>
          
                            <div class="col-sm-3">
                              <input type="time" class="form-control" id="reservationTime" name="reservationTime" placeholder="Reservation Time" value="<?php echo $bookingDetails->reservationtime; ?>">
                            </div>

                            
                          </div>
                          <div class="form-group">
                           
                            <label for="person" class="col-sm-3 control-label">Person</label>
          
                            <div class="col-sm-3">
                              <input type="text" onkeypress="return numbers()" class="form-control" id="persons" name="persons" placeholder="Total Persons" value="<?php echo $bookingDetails->persons; ?>">
                            </div>
                            <label for="Adults" class="col-sm-3 control-label">Adults</label>
          
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="adults" name="adults" placeholder="Adults" value="<?php echo $bookingDetails->adults; ?>">
                            </div>

                          </div>
                          <div class="form-group">

                          <label for="person" class="col-sm-3 control-label">Childern</label>
          
                            <div class="col-sm-3">
                          <input type="text" class="form-control" id="child" name="child" placeholder="Childern" value="<?php echo $bookingDetails->child; ?>">
                          </div>
                      </div>
                          <div class="form-group">
                            <label for="perHeadCharges" class="col-sm-3 control-label">Per Head charges</label>
          
                            <div class="col-sm-4">
                              <input type="number" class="form-control" id="perHeadCharges" name="perHeadCharges" placeholder="Per Head charges" value="<?php echo $bookingDetails->perheadcharges; ?>">
                            </div>

                            <label for="totalAmount" class="col-sm-2 control-label">Total Amount</label>
          
                            <div class="col-sm-3">
                              <input type="number" class="form-control" id="totalAmount" namr="totalAmount" placeholder="Total Amount" value="<?php echo $bookingDetails->totalamount; ?>">
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label for="minimumPayment" class="col-sm-3 control-label">Minimum Payment</label>
          
                            <div class="col-sm-4">
                              <input type="number" class="form-control" id="minimumPayment" name="minimumPayment" placeholder="Minimum Payment" value="<?php echo $bookingDetails->minimumpayment; ?>">
                            </div>
                            <label for="deposite" class="col-sm-2 control-label">Deposit</label>
          
                            <div class="col-sm-3">
                              <input type="number" class="form-control" id="deposite" name="deposite" placeholder="deposit" value="<?php echo $bookingDetails->deposite; ?>">
                            </div>

                            
                          </div>

                          <div class="form-group">
                            <label for="paymentMode" class="col-sm-3 control-label">Mode Payement</label>
          
                            <div class="col-sm-3">
                              <input type="number" class="form-control" id="paymentMode" name="paymentMode" placeholder="Mode Payement" value="<?php echo $bookingDetails->paymentmode; ?>">
                            </div>
                            <label for="zone" class="col-sm-3 control-label">Zone</label>
          
                            <div class="col-sm-3">
                              <input type="text" class="col-sm-3 form-control" id="zone" name="zone" placeholder="Zone" value="<?php echo $bookingDetails->zone; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="note" class="col-sm-3 control-label">Note</label>
                            <div class="col-sm-9">
                               <textarea class="form-control" rows="5" id="note" name="note" ><?php echo $bookingDetails->note; ?></textarea>
                          </div>
                        </div>
                      
                        </div>
                        <!-- /.box-body -->
    
                      
                        </fieldset>
                      </form>
                    

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2019 <!-- <a href="https://devleadz.com">DevLeadz (Pvt) Ltd.</a> --></strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<!-- 
https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js

 -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>



</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example1').DataTable( {
   
        dom: 'Bfrtip',
        buttons: [
{ "extend": 'print', "text":'<i class="fa fa-print"></i>',"className": 'btn btn-default pull-left' }

        ]
    } );
} );
</script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
</script>



</body>
</html>
<?php }else{
    header('location: index.php');
    } ?>