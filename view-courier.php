<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (empty($_SESSION['cmssid'])) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $cid = mysqli_real_escape_string($con, $_GET['editid']);
        $status = mysqli_real_escape_string($con, $_POST['status']);
        $region = mysqli_real_escape_string($con, $_POST['region']);
        $city = mysqli_real_escape_string($con, $_POST['city']);
        $query = "INSERT INTO tblcouriertracking (CourierId, status, region, city) VALUES ('$cid', '$status', '$region', '$city');";
        $query .= "UPDATE tblcourier SET status = '$status', Region = '$region', City = '$city' WHERE ID = '$cid';";
        // if (mysqli_multi_query($con, $query)) {
        //     $msg = "Remark, Status, Region, and City have been updated.";
        //     echo '<script>alert("Remark, Status, Region, and City have been updated.")</script>';
        //     echo "<script>window.location.href ='total-courier.php'</script>";
        // } else {
        //     echo '<script>alert("Something Went Wrong. Please try again")</script>';
        // }
          try {
            //code...
            mysqli_multi_query($con, $query);
            $msg = "Remark, Status, Region, and City have been updated.";
            echo '<script>alert("Remark, Status, Region, and City have been updated.")</script>';
            echo "<script>window.location.href ='total-courier.php'</script>";
            //echo '<script>alert('.$region.')</script>';
          } catch (\Throwable $th) {
            //throw $th;
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
            echo $th;
          }
        
    }
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <title>View Courier</title>
        <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/switchery/switchery.min.css" rel="stylesheet" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <body class="fixed-left">
      <div id="wrapper">
  
 <?php include_once('includes/header.php');?>
           <?php include_once('includes/leftbar.php');?>
<div class="content-page">
  <div class="content">
  <div class="container-fluid">
  <div class="row">
      <div class="col-12">
        <div class="card-box">
              <h4 class="m-t-0 header-title">Courier View</h4>
 <?php if($msg){?>                                   
<div class="alert alert-success" role="alert">
<strong>Well done!</strong> <?php echo $msg;?>
</div>
<?php }?>
 <?php
$cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblcourier where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
    <p><strong>Reference Number:</strong> <?php  echo $row['RefNumber'];?></p>
  <p><strong>Courier Date :</strong> <?php  echo $row['CourierDate'];?></p>
    <div class="row">                                    
<div class="col-6">

      <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">    
      <tr>
        <th style="text-align: center" colspan="2">Sender Details</th>
      </tr>    
   <tr>
    <th>Sender Branch</th>
    <td><?php  echo $row['SenderBranch'];?></td>
  </tr>
  <tr>
    <th>Sender Name</th>
    <td><?php  echo $row['SenderName'];?></td>
  </tr>
  <tr>
    <th>Sender Contact Number</th>
    <td><?php  echo $row['SenderContactnumber'];?></td>
  </tr>
  <tr>
    <th>Sender Address</th>
    <td><?php  echo $row['SenderAddress'];?></td>
  </tr>
  <tr>
    <th>Sender City</th>
    <td><?php  echo $row['SenderCity'];?></td>
  </tr>
  <tr>
    <th>Sender State</th>
    <td><?php  echo $row['SenderState'];?></td>
  </tr>
  <tr>
    <th>Sender Pincode</th>
    <td><?php  echo $row['SenderPincode'];?></td>
  </tr>
  <tr>
    <th>Sender Country</th>
    <td><?php  echo $row['SenderCountry'];?></td>
  </tr>
</table>
</div>
<div class="col-6">
  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
       <tr>
        <th style="text-align: center" colspan="2">Recipient Details</th>
      </tr>  
  <tr>
    <th>Recipient Name</th>
    <td><?php  echo $row['RecipientName'];?></td>
  </tr>
  <tr>
    <th>Recipient Contact Number</th>
    <td><?php  echo $row['RecipientContactnumber'];?></td>
  </tr>
  <tr>
    <th>Recipient Address</th>
    <td><?php  echo $row['RecipientAddress'];?></td>
  </tr>
  <tr>
    <th>Recipient City</th>
    <td><?php  echo $row['RecipientCity'];?></td>
  </tr>
  <tr>
    <th>Recipient State</th>
    <td><?php  echo $row['RecipientState'];?></td>
  </tr>
  <tr>
    <th>Recipient Pincode</th>
    <td><?php  echo $row['RecipientPincode'];?></td>
  </tr>
  <tr>
    <th>Recipient Country</th>
    <td><?php  echo $row['RecipientCountry'];?></td>
  </tr>
</table>
</div></div>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr>
    <th>Courier Description</th>
    <td><?php  echo $row['CourierDes'];?></td>
  </tr>
  <tr>
    <th>Parcel Weight</th>
    <td><?php  echo $row['ParcelWeight'];?></td>
  </tr>
  <tr>
    <th>Parcel Dimension Length</th>
    <td><?php  echo $row['ParcelDimensionlen'];?></td>
  </tr>
  <tr>
    <th>Parcel Dimension Width</th>
    <td><?php  echo $row['ParcelDimensionwidth'];?></td>
  </tr>
  <tr>
    <th>Parcel Dimension Height</th>
    <td><?php  echo $row['ParcelDimensionheight'];?></td>
  </tr>
  <tr>
    <th>Parcel Price</th>
    <td><?php  echo $row['ParcelPrice'];?></td>
  </tr>

<tr>
    <th>Status</th>
    <td><?php  if($row['Status']=='0'){
echo "Not Picked yet";
}  else {
 echo  $pstatus=$row['Status'];
} ;?></td>
  </tr>

  </tr>
</table>


<?php } ?>

<?php
if ($row['Status'] != '0') {
  $ret = mysqli_query($con, "select tblcouriertracking.status as corstatus, tblcouriertracking.StatusDate, tblcouriertracking.region, tblcouriertracking.city from tblcourier left join tblcouriertracking on tblcouriertracking.CourierId = tblcourier.ID where tblcourier.ID = '$cid'");
  $cnt = 1;
?>
  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <tr align="center">
      <th colspan="5">Courier History</th>
    </tr>
    <tr>
      <th>#</th>
      <th>Status</th>
      <th>Time</th>
      <th>Region</th>
      <th>City</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($ret)) {
    ?>
      <tr>
        <td><?php echo $cnt; ?></td>
        <td><?php echo $row['corstatus']; ?></td>
        <td><?php echo $row['StatusDate']; ?></td>
        <td><?php echo $row['region']; ?></td>
        <td><?php echo $row['city']; ?></td>
      </tr>
    <?php
      $cnt = $cnt + 1;
    }
    ?>
  </table>
<?php
}
if ($pstatus != 'Delivered') {
?>
  <p align="center">
    <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button>
  </p>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form name="myForm" action="" method="post">
          <div class="modal-body">
            <table width="100%">
              <tr>
                <th>Status:</th>
                <td>
                  <select name="status" class="form-control wd-450" required="true">
                    <option value="Courier Pickup" selected="true">Courier Pickup</option>
                    <option value="Shipped">Shipped</option>
                    <option value="Intransit">Intransit</option>
                    <option value="Arrived at Destination">Arrived at Destination</option>
                    <option value="Out for Delivery">Out for Delivery</option>
                    <option value="Delivered" style="color: green">Delivered</option>
                  </select>
                </td>
              </tr>
              <tr>
  <th>Region:</th>
  <td>
  <select name="region" class="form-control wd-450" required="true">
    <?php
      // Make a cURL request to the regions API
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://psgc.gitlab.io/api/regions/");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $regions = json_decode(curl_exec($ch), true);
      curl_close($ch);

      // Loop through the regions and output the options
      // echo '<select name="region" class="form-control wd-450" required="true">';
      foreach ($regions as $iregion) {
        echo '<option value="' . $iregion['name'] . '">' . $iregion['name'] . '</option>';
      }
      // echo '</select>';
    ?>
    </select>
  </td>
</tr>



<tr>
  <th>City:</th>
  <td>
  <select name="city" class="form-control wd-450" required="true">
    <?php
      // Make a cURL request to the cities API
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://psgc.gitlab.io/api/cities/");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $cities = json_decode(curl_exec($ch), true);
      curl_close($ch);

      // Loop through the cities and output the options
      // echo '<select name="city" class="form-control wd-450" required="true">';
      foreach ($cities as $city) {
        echo '<option value="' . $city['name'] . '">' . $city['name'] . '</option>';
      }
      // echo '</select>';
    ?>
  </select>
  </td>
</tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
<?php include_once('includes/footer.php');?>
        <script>
            var resizefunc = [];
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="../plugins/datatables/jszip.min.js"></script>
        <script src="../plugins/datatables/pdfmake.min.js"></script>
        <script src="../plugins/datatables/vfs_fonts.js"></script>
        <script src="../plugins/datatables/buttons.html5.min.js"></script>
        <script src="../plugins/datatables/buttons.print.min.js"></script>
        <script src="../plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="../plugins/datatables/dataTables.select.min.js"></script>
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

<script>
             $(document).ready(function() {
                $('#datatable').DataTable();
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });
                $('#key-table').DataTable({
                    keys: true
                });
                $('#responsive-datatable').DataTable();
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );
        </script>
    </body>
</html>
<?php 
  ?>