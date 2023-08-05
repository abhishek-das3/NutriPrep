<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $uid=$_GET['uid'];
    $diet=$_POST['diet'];
    $aid = $_GET['aid'];
    // echo '<script>alert("' . $aid .  '")</script>';
    $query=mysqli_query($con, "UPDATE users SET diet_plan = '$diet' WHERE id = '$uid'");
    
    if ($query ) {
      $query2=mysqli_query($con, "UPDATE appointment SET doctorStatus = 0 WHERE id = '$aid'");
    echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href = 'manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Doctor | Manage Patients</title>

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
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
              <div class="col-sm-8">
                <h1 class="mainTitle">Doctor | Manage Patients</h1>
              </div>
              <ol class="breadcrumb">
                <li>
                  <span>Doctor</span>
                </li>
                <li class="active">
                  <span>Manage Patients</span>
                </li>
              </ol>
            </div>
        </section>

        <!-- Add Diet Section -->
        <div class="diet">
            <form name="submit" method="post" style="margin: 20px; font-size: 1.4rem;" action="<?php echo $_SERVER['PHP_SELF'] . "?uid=" . $_GET['uid'] . "&aid=" . $_GET['aid'];?>">
            Add Diet Plan:
                <textarea name="diet" id="diet" cols="30" rows="10" placeholder="Add Diet Plan" style="width: 50%;
    margin-left: 10%;"></textarea> 
    <br>
    <button type="submit" name="submit" style="margin-left: 21%; margin-top:20px;">Submit</button>
            </form>
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
</body>

</html>
<?php }  ?>