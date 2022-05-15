<?php

        //try {
            include './DBClass.php';
            $obj = new DBClass();
            $conn = $obj->GetConn();
            $sql = "SELECT customername, bookingtime FROM booking";
            //echo "<br><br><br><br>&nbsp;".$sql;            
            $result = mysqli_query($conn, $sql);
$dataPoints = array();
while($row = mysqli_fetch_array($result)){
	
	$arr = explode(":",$row['bookingtime']);
	
		$now = date("Y-m-d H:i:s");
		//echo "<br><br><br><br>Now : ". $now;
		
		$month = date('m');
        $year = date('Y');
        $day = date('d');
		$hour = date('H');
		$min = date('i');
		$sec = date('s');
		
		$str1 = $year . "-" . $month . "-" . $day . " " . $hour . ":" . $min . ":" . $sec;
		
		$str2 = $year . "-" . $month . "-" . $day . " " . $arr[0] . ":" . $arr[1] . ":00";
		//echo "<br><br>Str1 : ". $str1. "<br>";
		//echo "Str2 : ". $str2. "<br>";
		$datetime1 =  new DateTime($str1);
		$datetime2 =  new DateTime($str2);

		$interval = $datetime1->diff($datetime2);
		//echo $interval->format('%Y years %m months %d days %H hours %i minutes %s seconds');
		
		$hours = $interval->format('%H');
		$minutes = $interval->format('%i');
		$seconds = $interval->format('%s');
		
		$min1 = $minutes - $min;

		array_push($dataPoints, array("label"=> $row['customername'], "y"=> $min1));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hotel Management System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<script type="text/javascript">
  setTimeout(function(){
    location = ''
  },60000)
</script>

  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Hotel MS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!--<div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div> End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->
        </li>

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

  
      <li class="nav-item">
        <a class="nav-link collapsed" href="ViewAllCustomers.php">
          <i class="bi bi-question-circle"></i>
          <span>View All Customer</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="ViewBookings.php">
          <i class="bi bi-envelope"></i>
          <span>View Bookings</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="Contact.php">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li>

      

      <li class="nav-item">
        <a class="nav-link collapsed" href="Logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->

      

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <!-- Reports -->
            <div class="col-12">
              <div class="card">

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Customer Waiting Time Graph"
	},
	subtitles: [{
		text: "March 2022"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "##0.00 Minutes",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>




<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                


              </div>
            </div><!-- End Reports -->



             

          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Hotel MS</span></strong>. All Rights Reserved
    </div>
    <div class="credits">

      Designed by Swathi
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>