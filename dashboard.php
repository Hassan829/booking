<?php
require "includes/functions.php";
if(isset($_SESSION['userRole']) && !empty($_SESSION['userRole'])){ 

$currentDate = date("Y-m-d");
$bookingList = getBookingsByDate("","","");
$statusList = getStatusList();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reservation System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="iCheck/all.css">

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
  table.dataTable tbody th,
table.dataTable tbody td {
    white-space: nowrap;
}
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

 <script type="text/javascript">
     function startTimer(duration, display) {
      var timer = duration, minutes, seconds;
     var timers = setInterval(function () {
          minutes = parseInt(timer / 60, 10)
          seconds = parseInt(timer % 60, 10);

          minutes = minutes < 10 ? "0" + minutes : minutes;
          seconds = seconds < 10 ? "0" + seconds : seconds;

          display.textContent = minutes + ":" + seconds;

          if (--timer < 0) {
              timer = duration;
               alert("clear call");
            clearInterval(timers);
          }else{
           
          }
      }, 1000);
  }
   </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
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
        <li >
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
        Dashboard
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
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-list"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Bookings</span>
              <span class="info-box-number" id="totalBooking">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Adults</span>
              <span class="info-box-number" id="totalAdults">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Childern</span>
              <span class="info-box-number" id="totalChildern">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Seats Left</span>
              <span class="info-box-number" id="seatsleft">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
        </div>
     
        <!-- Table start -->

          <div class="box">
            <div class="box-header "> 
              <a class="btn btn-success pull-left" data-toggle="modal" data-target="#registration-modal">
                <i class="fa fa-plus"></i> New Booking
              </a>

              <a class="btn btn-success" style="margin-left: 10px;" data-toggle="modal" data-target="#additionalRegistration-modal">
                <i class="fa fa-plus"></i> Additional Booking
              </a>
              <a class="btn btn-info pull-right" data-toggle="modal" data-target="#reviews">
                <i class="fa fa-star" aria-hidden="true"></i> Reviews
              </a>
              <div id="message"></div>
            </div>
            <div class="modal fade" id="additionalRegistration-modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Brand Name</h4>
                  </div>
                  <div class="modal-body">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Restuarant Booking Form</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form class="form-horizontal" action="" method="post">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="customerName" class="col-sm-3 control-label">Customer Name</label>
          
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="customerName" id="customerName" placeholder="Customer Name "  required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="contactDetails" class="col-sm-3 control-label">Contact Detail</label>
          
                            <div class="col-sm-9">
                              <input type="number" class="form-control" id="contactNo" name="contactNo" placeholder="Contact Detail" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="address" class="col-sm-3 control-label">Address</label>
          
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="reservationDate" class="col-sm-3 control-label">Reservation Date</label>
          
                            <div class="col-sm-3">
                              <input type="date" class="form-control" id="reservationDate" name="reservationDate" placeholder="Contact Detail" required>
                            </div>
                             <label for="reservationTime" class="col-sm-3 control-label">Reservation Time</label>
          
                            <div class="col-sm-3">
                              <input type="time" class="form-control" id="reservationTime" name="reservationTime" placeholder="Reservation Time" required>
                            </div>

                            
                          </div>
                          <div class="form-group">
                           
                            <label for="person" class="col-sm-3 control-label">Person</label>
          
                            <div class="col-sm-3">
                              <input type="text" onkeypress="return numbers()" class="form-control" id="persons" id="persons" placeholder="Total Persons" required>
                            </div>
                            <label for="Adults" class="col-sm-3 control-label">Adults</label>
          
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="adults" id="adults" placeholder="Adults" required>
                            </div>

                          </div>
                          <div class="form-group">

                          <label for="person" class="col-sm-3 control-label">Childern</label>
          
                            <div class="col-sm-3">
                          <input type="text" class="form-control" id="child" id="child" placeholder="Childern" required>
                          </div>
                      </div>
                          <div class="form-group">
                            <label for="perHeadCharges" class="col-sm-3 control-label">Per Head charges</label>
          
                            <div class="col-sm-4">
                              <input type="number" class="form-control" id="perHeadCharges" name="perHeadCharges" placeholder="Per Head charges" required>
                            </div>

                            <label for="totalAmount" class="col-sm-2 control-label">Total Amount</label>
          
                            <div class="col-sm-3">
                              <input type="number" class="form-control" id="totalAmount" namr="totalAmount" placeholder="Total Amount" required>
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label for="minimumPayment" class="col-sm-3 control-label">Minimum Payment</label>
          
                            <div class="col-sm-4">
                              <input type="number" class="form-control" id="minimumPayment" name="minimumPayment" placeholder="Minimum Payment" required>
                            </div>
                            <label for="deposite" class="col-sm-2 control-label">Deposit</label>
          
                            <div class="col-sm-3">
                              <input type="number" class="form-control" id="deposite" name="deposite" placeholder="deposite" required>
                            </div>

                            
                          </div>

                          <div class="form-group">
                            <label for="paymentMode" class="col-sm-3 control-label">Mode Payement</label>
          
                            <div class="col-sm-3">
                              <input type="number" class="form-control" id="paymentMode" name="paymentMode" placeholder="Mode Payement" required>
                            </div>
                            <label for="zone" class="col-sm-3 control-label">Zone</label>
          
                            <div class="col-sm-3">
                              <input type="text" class="col-sm-3 form-control" id="zone" name="zone" placeholder="Zone" required="">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="note" class="col-sm-3 control-label">Note</label>
                            <div class="col-sm-9">
                               <textarea class="form-control" rows="5" id="note" name="note"></textarea>
                          </div>
                        </div>
                      
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                          <button type="cancel"  data-dismiss="modal" class="btn btn-default">Cancel</button>
                          <button type="button" name="submit" onclick="formSubmit();" id="submit" class="btn btn-info pull-right">Submit</button>
                        </div>
                        <!-- /.box-footer -->
                      </form>
                    </div>
                  </div>
               
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div> -->
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
           <!--  <div> -->
            <div class="modal fade" id="registration-modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Brand Name</h4>
                  </div>
                  <div class="modal-body">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Restuarant Booking Form</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form class="form-horizontal" action="" method="post">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="customerName" class="col-sm-3 control-label">Customer Name</label>
          
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="customerNameS" id="customerNameS" placeholder="Customer Name "  required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="contactDetails" class="col-sm-3 control-label">Contact Detail</label>
          
                            <div class="col-sm-9">
                              <input type="number" class="form-control" id="contactNoS" name="contactNoS" placeholder="Contact Detail" required>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="reservationDate" class="col-sm-3 control-label">Reservation Date</label>
          
                            <div class="col-sm-3">
                              <input type="date" class="form-control" id="reservationDateS" name="reservationDateS" placeholder="Contact Detail" required>
                            </div>
                             <label for="reservationTime" class="col-sm-3 control-label">Reservation Time</label>
          
                            <div class="col-sm-3">
                              <input type="time" class="form-control" id="reservationTimeS" name="reservationTimeS" placeholder="Reservation Time" required>
                            </div>

                            
                          </div>
                          <div class="form-group">
                           
                            <label for="person" class="col-sm-3 control-label">Person</label>
          
                            <div class="col-sm-3">
                              <input type="text" onkeypress="return numbers()" class="form-control" id="personsS" name="personsS" placeholder="Total Persons" required>
                            </div>
                            <label for="Adults" class="col-sm-3 control-label">Adults</label>
          
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="adultsS" id="adultsS" placeholder="Adults" required>
                            </div>

                          </div>
                          <div class="form-group">
                            <label for="person" class="col-sm-3 control-label">Childern</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="childS" id="childS" placeholder="Childern" required>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="note" class="col-sm-3 control-label">Note</label>
                            <div class="col-sm-8">
                               <textarea class="form-control" rows="5" id="noteS" name="noteS"></textarea>
                          </div>
                        </div>
                      </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                          <button type="cancel"  data-dismiss="modal" class="btn btn-default">Cancel</button>
                          <button type="button" name="submit" onclick="addBooking();" id="submit" class="btn btn-info pull-right">Submit</button>
                        </div>
                        <!-- /.box-footer -->
                      </form>
                    </div>
                  </div>
               
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div> -->
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
           <div class="modal fade" id="reviews">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Brand Name</h4>
                  </div>
                  <div class="modal-body">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Reviews</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form class="form-horizontal" action="" method="post">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="customerNameR" class="col-sm-3 control-label">Customer Name</label>
          
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="customerNameR" id="customerNameR" placeholder="Customer Name "  required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="contactDetails" class="col-sm-3 control-label">Contact Detail</label>
          
                            <div class="col-sm-9">
                              <input type="number" class="form-control" id="contactNoR" name="contactNoR" placeholder="Contact Detail" required>
                            </div>
                          </div>
              
         
                        <div class="form-group">
                       
                          <label class="col-sm-3 control-label">Food Taste & Quality </label>
                     
                        <div class="checkbox col-sm-3">
                     
                   <label>
                  <input type="radio" name="foodTasteQuality" value="7" class="flat-red" checked>
                  Excellent
                </label>
                        </div>

                        <div class="checkbox col-sm-3">
                            <label>
                  <input type="radio" name="foodTasteQuality" value ="5" class="flat-red">
                  Good
                </label>
                        </div>

                          <div class="checkbox col-sm-3">
                            <label>
                  <input type="radio" name="foodTasteQuality" value="3" class="flat-red">
                  Average
                </label>
                        </div>
                      </div>
                        <div class="form-group">
                       
                          <label class="col-sm-3 control-label">Hygiene & Standards </label>
                     
                       <div class="checkbox col-sm-3">
                     
                   <label>
                  <input type="radio" name="hygieneStandards" value="7" class="flat-red" checked>
                  Excellent
                </label>
                        </div>

                        <div class="checkbox col-sm-3">
                            <label>
                  <input type="radio" name="hygieneStandards" value="5" class="flat-red">
                  Good
                </label>
                        </div>

                          <div class="checkbox col-sm-3">
                            <label>
                  <input type="radio" name="hygieneStandards" value="3" class="flat-red">
                  Average
                </label>
                        </div>
                      </div>
                          <div class="form-group">
                       
                          <label class="col-sm-3 control-label">Staff & Management </label>
                     
                       <div class="checkbox col-sm-3">
                     
                   <label>
                  <input type="radio" name="staffManagement" value="7" class="flat-red" checked>
                  Excellent
                </label>
                        </div>

                        <div class="checkbox col-sm-3">
                            <label>
                  <input type="radio" name="staffManagement" value="5" class="flat-red">
                  Good
                </label>
                        </div>

                          <div class="checkbox col-sm-3">
                            <label>
                  <input type="radio" name="staffManagement" value="3" class="flat-red">
                  Average
                </label>
                        </div>
                      </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                          <button type="cancel"  data-dismiss="modal" class="btn btn-default">Cancel</button>
                          <button type="button" name="submit" id="submit" onclick="addReview();" class="btn btn-info pull-right">Submit</button>
                        </div>
                        <!-- /.box-footer -->
                      </form>
                    </div>
                  </div>
               
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div> -->
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            
         </div>
        
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Name</th>
                  <th>Phone No</th>
                  <th>T Persons-Adult-Child</th>
                 
                  <th>Time</th>
                  <th>CheckIn</th>
                  <th>Timer</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   <?php  $counter = 1 ;
                   
                      foreach($bookingList as $booking):?>
                        <tr>
                            <td> <?php echo $counter; ?> </td>
                            <td> <?php echo $booking->customername; ?>  <a href="print.php?bookingId=<?php echo $booking->bookingid; ?>" target=_blank class="btn-link"> <i class="fa fa-print"></i> </a></td>
                            <td> <?php echo $booking->contactno; ?> </td>
                            <td> <?php echo $booking->persons;?>-<?php echo $booking->adults; ?>-<?php echo $booking->child; ?> </td>
                            
                            <td> <?php echo substr($booking->reservationtime,0,5)?></td>
                            <td> <?php echo substr($booking->checkin,0,5); ?> </td>
                            <td> 
                              <?php if($booking->status == 5){?>
                             <div id="demo<?php echo $booking->bookingid; ?>">
                             <?php
                                  $startTime = new DateTime(substr($booking->checkin,0,5));
                                  $endTime = $startTime -> modify('+1 hour +40 minutes');
                                 // print_r($endTime);
                                  $since_start = $endTime->diff(new DateTime('now'));
                                  $hours = $since_start->h;
                                  $min = $hours*60;
                                  $mintuesLeft = $since_start->i;//22
                                  $sec = ($mintuesLeft+$min)*60;
                                  $secLeft = $since_start->s;
                                  $seconds = $sec+$secLeft;
                                  if(new DateTime('now')>$endTime){
                                    echo "Times up!!!";
                                  }else{
                                    //echo("chalne do");?>
                                    <script type="text/javascript">
                                      var fiveMinutes = <?php echo $seconds ;?>,
                                      display = document.querySelector('#demo<?php echo $booking->bookingid; ?>');
                                  startTimer(fiveMinutes, display);
                                    </script>
                                <?php  }
                             ?>
                               

                             </div>
                                
                            <?php } elseif( $booking->status == 10){?>
                               Check Out
                            <?php } else{?>
                                No Show
                            <?php }?>
                               </td>
                            <td>
                              
                              <select class="form-control" name="status<?php echo $booking->bookingid; ?>" id="status<?php echo $booking->bookingid; ?>" 
                                onchange="changeBookingStatus(<?php echo $booking->bookingid;?>)">

                                    <?php  foreach($statusList as $status): ?>
                                        <option value="<?php echo $status->statusid;?>"
                                          <?php echo $status->statusid ==  $booking->status ? 'selected':''  ?>>  <?php echo $status->value; ?></option>

                                    <?php  endforeach; ?>
                                </select>
                              <input type="hidden" name="bookingId<?php echo $booking->bookingid; ?>" id="bookingId<?php echo $booking->bookingid; ?>" value="<?php echo $booking->bookingid; ?>">
                            </td>
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
                     endforeach; ?>
                </tbody>
              
                <tfoot>
                <tr>
                  <th>Sr. No.</th>
                  <th>Name</th>
                  <th>Phone No</th>
                  <th>T Persons-Adult-Child</th>
                  
                  <th>Time</th>
                  <th>CheckIn</th>
                  <th>Timer</th>
                  <th>Status</th>
                  <th>Action</th>

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
<!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> -->

<!-- 
https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js

 -->
<!-- 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

<script type="text/javascript" src="http://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script> -->
<script type="text/javascript" src="iCheck/icheck.min.js"></script>


<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
 <script type="text/javascript">
/*$(document).ready(function() {
    $('#example1').DataTable( {
        "scrollY": 200,
        "scrollX": true
    } );
} );*/
</script>
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false, 
      "scrollX": true

    
    } )
    $('#example2').DataTable()
  })
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
 

function fetchdata(){
 $.ajax({
  url: 'gettotalbookingdetails.php',
  type: 'post',
  success: function(response){
   var res = JSON.parse(response);
   document.getElementById("totalBooking").innerHTML = res.bookingid;
   document.getElementById("totalAdults").innerHTML = res.ad;
   document.getElementById("totalChildern").innerHTML = res.ch;
   document.getElementById("seatsleft").innerHTML = 600-res.persons;
  
  }
 });
}

$(document).ready(function(){
 setInterval(fetchdata,5000);
});

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
  var note = $("textarea#note").val();
  var formType = 2;
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
              'child' : child,
              'formType' : formType,
              'note' : note
            },
      success: function(data) {
          if(data == "success"){
            alert('Booking made successfully :)');
           window.location.reload(true);
           $('#registration-modal').modal('hide');
          $(".modal-body input").val("")
          }else{
              alert('Error Occured while booking'+data);
          }
          
      }
    });
  }

function addBooking(){
  var  customerName = $("input#customerNameS").val();
  var  contactNo = $("input#contactNoS").val();
  var reservationDate = $("input#reservationDateS").val();
  var persons = $("input#personsS").val();
  var reservationTime = $("input#reservationTimeS").val();  
  var adults = $("input#adultsS").val();
  var child = $("input#childS").val();
  var note = $("textarea#noteS").val();
  var formType = 1;
  $.ajax({
      type: "POST",
      url: "process.php",
      data:{ 'customerName':customerName,
            'contactNo':contactNo,
            'reservationDate':reservationDate,
            'persons' : persons ,
            'reservationTime' : reservationTime ,
            'adults' : adults,
            'child' : child,
            'formType' : formType,
            'note' : note
            },
      success: function(data) {
          if(data == "success"){
            alert('Booking made successfully :)');
           window.location.reload(true);
           $('#registration-modal').modal('hide');
          $(".modal-body input").val("")
          }else{
              alert('Error Occured while booking'+data);
          }
          
      }
    });
  }

   function addReview(){
  var  customerName = $("input#customerNameR").val();
  var  contactNo = $("input#contactNoR").val();
  var foodTasteQuality = $("input[name='foodTasteQuality']:checked").val();
  var hygieneStandards = $("input[name='hygieneStandards']:checked").val();
  var staffManagement = $("input[name='staffManagement']:checked").val();

  $.ajax({
      type: "POST",
      url: "addreview.php",
      data:{ 'customerNameR':customerName,
            'contactNoR':contactNo,
            'foodTasteQuality':foodTasteQuality, 
            'hygieneStandards':hygieneStandards,
              'staffManagement' : staffManagement
            },
      success: function(data) {
          alert(data);
          // window.location.reload(true);
          //$('#registration-modal').modal('hide');
          //$(".modal-body input").val("")
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
          //alert(data);
           window.location.reload(true);
      }
    });
  }



function numbers() {
          //alert("Event Keycode : "+event.keyCode);
             if ((event.keyCode >= 48 && event.keyCode <= 57) 
              || (event.keyCode == 8 || event.keyCode == 46) )
                 return true;
             else
              alert('Number Only');
                 return false;
         }

 $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })


function deleteBooking(bookingId){
  var result = confirm("Want to delete?");
  if (result) {
      $.ajax({
      type: "POST",
      url: "deletebooking.php",
      data:{ 'bookingId':bookingId
            },
      success: function(data) {
          //alert(data);
           window.location.reload(true);
      }
    });
  }else{

  }
}
</script>


</body>
</html>

<?php }else{
    header('location: index.php');
    } ?>
