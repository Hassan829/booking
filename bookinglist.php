<?php
require "includes/functions.php";
if(isset($_SESSION['userRole']) && !empty($_SESSION['userRole'])){ 
 $bookingList =[];
if(isset($_GET['reservationDate'])   || (isset($_GET['phone'])) || isset($_GET['status']) ){
  $bookingList = getBookingsByDate($_GET['reservationDate'],$_GET['status'],$_GET['phone']);
}

$statusList = getStatusList();
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
 <link rel="stylesheet" type="text/css" href="plugins/iCheck/all.css">
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
       Booking List
      </h1>
  
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
        </div>
        <div class="box-body">
          <div class="row">
          <div class="col-sm-12">
            <form action="bookinglist.php" method="GET">
            <div class="form-group">
              <label for="reservationDate" class="col-sm-2 control-label">Reservation Date</label>
              <div class="col-sm-2">
                <input type="date" class="form-control" id="reservationDate" name="reservationDate" placeholder="Contact Detail">
              </div>
  

              <label for="reservationDate" class="col-sm-1 control-label">Status</label>
              <div class="col-sm-2">
              <select class="form-control"  name="status" id="status">
                          <option value="-1">All</option>
                      <?php  foreach($statusList as $status): ?>
                          <option value="<?php echo $status->statusid;?>">  <?php echo $status->value; ?></option>

                      <?php  endforeach; ?>
                  </select>
                </div>

                <label for="phone" class="col-sm-1 control-label">Phone#</label>
              <div class="col-sm-2">
                <input type="tel" class="form-control " id="phone" name="phone" placeholder="Phone Number">
              </div>
                 <div class="col-sm-2">
                 <input type="submit" class="btn btn-info" name="submit" value="Submit">
                 </div>

             </div>

             
            </form>
            </div>
          </div>
        </div>
     
        <!-- Table start -->

          <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Name</th>
                  <th>Phone No</th>
                  <th>T Persons-Adult-Childs</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>CheckIn</th>
                  
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                   <?php  $counter = 1 ;
                   if(1==1){


                      foreach($bookingList as $booking):?>
                        <tr>
                            <td> <?php echo $counter; ?> </td>
                             <td> <?php echo $booking->customername; ?>  <a href="print.php?bookingId=<?php echo $booking->bookingid; ?>" target=_blank class="btn-link"> <i class="fa fa-print"></i> </a></td>
                            <td> <?php echo $booking->contactno; ?> </td>
                            <td> <?php echo $booking->persons; ?>-<?php echo $booking->adults; ?>-<?php echo $booking->child; ?> </td>
                            <td><?php echo $booking->reservationdate?></td>
                            <td> <?php echo substr($booking->reservationtime,0,5)?></td>
                            <td> <?php echo substr($booking->checkin,0,5); ?> </td>
                            
                            <!-- <td>
                              <?php echo $booking->value; ?>
                             
                              <input type="hidden" name="bookingId<?php echo $booking->bookingid; ?>" id="bookingId<?php echo $booking->bookingid; ?>" value="<?php echo $booking->bookingid; ?>">
                            </td> -->
                            <td>
                            <?php if($_SESSION['userRole'] == 1) {?>
                              <a href="editbooking.php?bookingId=<?php echo $booking->bookingid; ?>">Edit</a> / 
                            <?php } ?>
                            <a href="viewbookingdetails.php?bookingId=<?php echo $booking->bookingid; ?>">View</a> 
                            <?php if($_SESSION['userRole'] == 1) {?>
                            / <a href="" onclick="deleteBooking(<?php echo $booking->bookingid; ?>);">Delete</a>
                            <?php }?>
                            </td>

                        </tr>
                        <?php
                      $counter++ ;
                     endforeach; 
                   }?>

                </tbody>
              
                <tfoot>
                <tr>
                  <th>Sr. No.</th>
                  <th>Name</th>
                  <th>Phone No</th>
                  <th>T Persons-Adult-Child</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>CheckIn</th>
                  
                  <th>Status</th>

                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        <!-- Table END -->
        <!-- /.box-body -->
        <div class="box-footer">
          <!-- Display the countdown timer in an element -->



        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

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

        ],
       'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false, 
      "scrollX": true
    } );
} );
</script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

<script type="text/javascript">
/*$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );*/
</script>
<script>

/*var table = $('#example1').DataTable( {
    ajax: "data.json" 
    
}

 );
 
setInterval( function () {
    table.ajax.reload();
}, 20000 );
*/
 

/*function fetchdata(){
 $.ajax({
  url: 'getbookingdetails.php',
  type: 'post',
  success: function(response){
   var res = JSON.parse(response);
   document.getElementById("totalBooking").innerHTML = res.bookingid;
   document.getElementById("totalAdults").innerHTML = res.ad;
   document.getElementById("totalChildern").innerHTML = res.ch;
  }
 });
}

$(document).ready(function(){
 setInterval(fetchdata,5000);
});*/

</script>


<script>

  function formSubmit(){
  var  customerName = $("input#customerName").val();
  var  contactNo = $("input#contactNo").val();
  var address = $("input#address").val();
  var reservationDate = $("input#reservationDate").val();
  var persons = $("input#persons").val();
  var reservationTime = $("input#reservationTime").val();
  var totalAmount = $("input#totalAmount").val();
  var minimumPayment = $("input#minimumPayment").val();
  var paymentMode = $("input#paymentMode").val();
  var zone = $("input#zone").val();
  var perHeadCharges = $("input#perHeadCharges").val();
  var deposite = $("input#deposite").val();
  var adults = $("input#adults").val();
  var child = $("input#child").val();
  $.ajax({
      type: "POST",
      url: "process.php",
      data:{ 'customerName':customerName,
            'contactNo':contactNo,
            'address':address, 
            'reservationDate':reservationDate,
              'persons' : persons ,
              'reservationTime' : reservationTime ,
              'totalAmount': totalAmount,
              'minimumPayment' : minimumPayment,
              'paymentMode' : paymentMode ,
              'zone': zone ,
              'perHeadCharges' : perHeadCharges,
              'deposite' : deposite,
              'adults' : adults,
              'child' : child
            },
      success: function(data) {
          alert(data);
          // window.location.reload(true);
          /*$('#registration-modal').modal('hide');
          $(".modal-body input").val("")*/
      }
    });
  }


function changeBookingStatus(bookingId){
  var e = document.getElementById("status"+bookingId);
  var statusValue =  e.options[e.selectedIndex].value;
  $.ajax({
      type: "POST",
      url: "changebookingstatus.php",
      data:{ 'bookingId':bookingId,
              'status':statusValue
            },
      success: function(data) {
          alert(data);
           window.location.reload(true);
      }
    });
  }

</script>


</body>
</html>
<?php }else{
    header('location: index.php');
    } ?>