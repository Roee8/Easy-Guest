 <?php
 
require_once('init/init.php');
global $session;
global $database; 
if(!$session->get_user_order())
{
    header("Location: 404.html");
}
?>


 <?php
        if(isset($_POST["name"])) {
            
          $order = $_POST["name"];
          $sql =   "INSERT INTO MaintanceArchive( SELECT * FROM Maintance WHERE '$order'=idOrder)";
          $sql2 = "DELETE FROM Maintance where '$order'=idOrder";        

if($database->query($sql) && $database->query($sql2))
{
   echo "ok";
}
else
{
   echo "not good";
}
        }
      ?>
      

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Guests table</title>
  
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css'>
<link rel='stylesheet prefetch' href='http://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7/css/sb-admin-2.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css'>
<link rel='stylesheet prefetch' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/416491/timeline.css'>
        <link rel="stylesheet" href="../css/newTuk.css">

</head>

<body>

  <div id="wrapper">
  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
      <a class="navbar-brand" href="adminHome.php">Admin panel EasyGuest</a>
    </div>


    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

          <li>
            <a href="adminHome.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
          </li>

          <li>
            <a href="#"><i class="fa fa-table fa-fw"></i> Tables<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                   <li>
                <a href="tableTuktuk.php">Tuktuk</a>
              </li>
              <li>
                <a href="restOrderTable.php">Restaurant</a>
              </li>
              <li>
                <a href="houseKeepingTable.php">HouseKeeping</a>
              </li>
              <li>
                <a href="MaintanceTable.php">Maintenance</a>
              </li>
               <li>
                <a href="guestTable.php">Guests</a>
              </li>
                 <li>
                <a href="mealsTable.php">Meals</a>
              </li>
                   <li>
                <a href="paymentTable.php">Payment</a>
              </li>
            </ul>
          </li>
   
          <li>
            <a href="#"><i class="fa fa-archive"></i> Archive<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="tukArchive.php">Tuktuk</a>
              </li>
              <li>
                <a href="restOrderArchive.php">Restaurant</a>
              </li>
              <li>
                <a href="houseKeepingArchive.php">HouseKeeping</a>
              </li>
              <li>
                <a href="MaintanceArchive.php">Maintenance</a>
              </li>
                   <li>
                <a href="guestArchive.php">Guests</a>
              </li>
            </ul>
            <!-- /.nav-second-level -->
          </li>
           <li>
            <a href="init/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
          </li>
        </ul>
      </div>
      <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
  </nav>

  <div id="page-wrapper" style="margin-top: -20px"><br>
<h1>Guests table </h1>



<div id="toolbar">
		<select class="form-control">
				<option value="">Export Basic</option>
				<option value="all">Export All</option>
				<option value="selected">Export Selected</option>
		</select>
</div>
<div class="row">
  <div class="col-md-12">

<table id="table" 
			 data-toggle="table"
			 data-url="newTuk.php"
			 data-filter-control="true" 
			 data-show-export="true"
			 data-click-to-select="true"
			 data-toolbar="#toolbar"
			 data-pagination="true"
			  data-page-size="6"
       class="table-responsive" >
	<thead>
		<tr >
	<th data-field="state" data-checkbox="true"></th>
	<th data-field="OrderNumber" data-filter-control="input" data-sortable="true">Order num</th>
	<th data-field="id" data-filter-control="input" data-sortable="true">id</th>
	<th data-field="name" data-filter-control="input" data-sortable="true">Name</th>
	<th data-field="last" data-filter-control="input" data-sortable="true">Last name</th>
	<th data-field="email" data-filter-control="input" data-sortable="true">Email</th>
		<th data-field="phone" data-filter-control="input" data-sortable="true">Phone</th>
	<th data-field="address" data-filter-control="input" data-sortable="true">Address</th>
	<th data-field="pass">Passport</th>
	<th data-field="visa">Visa</th>
	<th data-field="room" data-filter-control="input" data-sortable="true">Room</th>
	<th data-field="arrival" data-filter-control="input" data-sortable="true">Arrival time</th>
	<th data-field="in" data-filter-control="input" data-sortable="true">Check-in</th>
	<th data-field="out" data-filter-control="input" data-sortable="true">Check-out</th>
	</tr>
	</thead>
	<tbody>
    
          
<?php

 $sql = "SELECT * FROM Guests";
$result = $database->query($sql);
$message = $result->num_rows;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

echo "<tr><td>
      </td><td>". $row["orderNumber"]. "</td><td>". $row["id"]. "</td><td>". $row["name"] . "</td><td>".$row["lastName"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["address"]."</td><td>
      <a data-toggle='modal' data-target='#" .$row["id"]."' href='#' id='pop'>
Open</a>
<div class='modal fade' id='". $row["id"]."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
        <h4 class='modal-title' id='myModalLabel'>Passport copy</h4>
      </div>
      <div class='modal-body'>
        <img src='data:image/jpeg;base64,".base64_encode( $row['pass'] )."'  id='imagepreview' class='img_moddal' style='width:100%; height: 264px;' >
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div> 
</td><td>
<a data-toggle='modal' data-target='#". $row["orderNumber"] ."' href='#' id='pop'>
Open</a>
<div class='modal fade' id='". $row["orderNumber"] ."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
        <h4 class='modal-title' id='myModalLabel'>Visa copy</h4>
      </div>
      <div class='modal-body'>
        <img src='data:image/jpeg;base64,".base64_encode( $row['visa'] )."'  id='imagepreview' class='img_moddal' style='width:100%; height: 264px;' >
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div> 

</td>";
       
       $id=$row['orderNumber'];
        $sql = "SELECT * FROM guestRooms where currentGuest=$id";
$result1 = $database->query($sql);
if ($result1->num_rows > 0) {
    $row = $result1->fetch_assoc();

echo "<td>". $row["Room"]. "</td>";
   
} else {
    echo "0 results";
}


 $sql = "SELECT * FROM guestOrder where orderNumber=$id";
$result1 = $database->query($sql);
if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {

echo "<td>". $row["arrivalTime"]. "</td><td>". $row["checkInDate"]. "</td><td>". $row["checkOutDate"]. "</td></tr>";
    }
} else {
    echo "0 results";
}

    }
} else {
    echo "0 results";
}


?>

	</tbody>
	
    </table>
    </div></div>
</div>
      </div>
</div>



  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js'></script>
<script src='http://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js'></script>
  <script src='https://code.jquery.com/jquery-3.1.0.js'></script>
      <script  src="../js/newTuk.js"></script>

  
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.1/raphael.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7/js/sb-admin-2.js'></script>
<script src='https://cdn.knightlab.com/libs/timeline3/latest/js/timeline.js'></script>
</body>

</html>
