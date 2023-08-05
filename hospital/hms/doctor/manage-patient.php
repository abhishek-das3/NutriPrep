<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Dietitian | Manage Patients</title>

	<link
		href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
		rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php');?>
		<div class="app-content">
			<?php include('include/header.php');?>
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Dietitian | Manage Patients</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Dietitian</span>
								</li>
								<li class="active">
									<span>Manage Customer</span>
								</li>
							</ol>
						</div>
					</section>
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Customer</span>
								</h5>

								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>Customer Name</th>
											<th>Customer Email</th>
											<th>Customer Gender </th>
											<th>Customer Appointment Date </th>
											<th>Customer Appointment Time </th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
$docid=$_SESSION['id'];
// $sql=mysqli_query($con,"select * from tblpatient where Docid='$docid' ");
//$sqll=mysqli_query($con,"select userId from appointment where doctorid='$docid' and userStatus = 1 and doctorStatus = 1");
//$query = "SELECT u.fullName, u.email, u.gender, a.appointmentDate, a.appointmentTime FROM appointment a JOIN user u ON a.userId = u.id WHERE a.doctorid = $docid AND a.userStatus = 1 AND a.doctorStatus = 1";
$query = "select u.id as uid, u.fullName, u.email, u.gender, a.appointmentDate, a.id as aid, a.appointmentTime
from users u
join appointment a on u.id = a.userId
where a.userStatus = 1 and doctorStatus = 1 and a.userId in (select userId from appointment where doctorId = '$docid' and userStatus = 1 and doctorStatus = 1)";

//$sqll = mysqli_query($con, $query);


$sqll = mysqli_query($con, $query);
$cnt=1;
while($row=mysqli_fetch_array($sqll))
{ 	
?>


										<tr>
											<td class="center">
												<?php echo $cnt;?>.
											</td>
											<td class="hidden-xs">
												<?php echo $row['fullName'] ?>
											</td>
											<td>
												<?php echo $row['email'];?>
											</td>
											<td>
												<?php echo $row['gender'];?>
											</td>
											<td>
												<?php echo $row['appointmentDate'];?>
											</td>
											<td>
												<?php echo $row['appointmentTime'];?>
											</td>
											<td>
												<!-- <a href="edit-patient.php?editid=<?php echo $row['id'];?>"><i
														class="fa fa-edit"></i></a> || <a
													href="view-patient.php?viewid=<?php echo $row['id'];?>"><i
														class="fa fa-eye"></i></a> -->
												<!-- <a href="add-prep.php?uid=<?php echo $row['id'];?>">click me </a> -->
												<a href="add-prep.php?uid=<?php echo $row['uid']; ?>&aid=<?php echo $row['aid']; ?>">click me</a>

											</td>
										</tr>
										<?php 
$cnt=$cnt+1;
 }?>
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
	<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
	<!-- end: FOOTER -->

	<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>

	<!-- end: SETTINGS -->
	</div>
	<!-- start: MAIN JAVASCRIPTS -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<!-- end: MAIN JAVASCRIPTS -->
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="vendor/autosize/autosize.min.js"></script>
	<script src="vendor/selectFx/classie.js"></script>
	<script src="vendor/selectFx/selectFx.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<!-- start: CLIP-TWO JAVASCRIPTS -->
	<script src="assets/js/main.js"></script>
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>
	<script>
		jQuery(document).ready(function () {
			Main.init();
			FormElements.init();
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->

	<!-- Add your JavaScript file -->
<script>
	// Function to display the popup form
function showForm() {
  var form = document.getElementById("recordForm");
  form.style.display = "block";
}

// Function to hide the popup form
function hideForm() {
  var form = document.getElementById("recordForm");
  form.style.display = "none";
}

// Function to handle form submission
function handleSubmit(event) {
  event.preventDefault(); // Prevent the default form submission behavior
  // Fetch the values entered in the form
  var bloodPressure = document.getElementById("bloodPressure").value;
  var sugar = document.getElementById("sugar").value;
  var weight = document.getElementById("weight").value;
  var bodyTemperature = document.getElementById("bodyTemperature").value;
  var prescribedDiet = document.getElementById("prescribedDiet").value;

  // Add code to process the form data (e.g., save it to a database, display an alert, etc.)
  // For this example, we'll just display an alert.
  alert("Data has been recorded!");

  // Hide the form after submission
  hideForm();
}

// Event listener to show the form when the icon is clicked
document.getElementById("recordIcon").addEventListener("click", showForm);

// Event listener to handle form submission when the submit button is clicked
document.getElementById("healthForm").addEventListener("submit", handleSubmit);

</script>
</body>

</html>
<?php } ?>