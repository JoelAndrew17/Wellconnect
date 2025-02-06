<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title -->
        <title>WellConnect</title>
		
		<!-- Favicon -->
        <link rel="icon" href="img/favicon.png">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="css/icofont.css">
		<!-- Slicknav -->
		<link rel="stylesheet" href="css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">
		
		<!--dashboard content css-->
        <link rel="stylesheet" href="adddoctors.css">
    </head>
    <body>
	
		<!-- Preloader -->
		<div class="preloader">
  <div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
    <div class="plus"></div>
  </div>
</div>

        <!-- End Preloader -->
		<!-- Header Area -->
		<header class="header" >
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-5 col-12">
							<!-- Contact -->
							<ul class="top-link">
								<li><a href="about.html">About</a></li>
								<li><a href="faq.html">FAQ</a></li>
							</ul>
							<!-- End Contact -->
						</div>
						<div class="col-lg-6 col-md-7 col-12">
							<!-- Top Contact -->
							<ul class="top-contact">
								<li><i class="fa fa-phone"></i>+99 1234 56789</li>
								<li><i class="fa fa-envelope"></i><a href="mailto:Mudiyela@gmail.com">Mudiyela@gmail.com</a></li>
							</ul>
							<!-- End Top Contact -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<a href="dash.php"><img src="img/logo.png" alt="#"></a>
								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li><a href="dashboard.php">Home</a>
											</li>
											<li><a href="patientlist.php">Patients</a></li>
											<li><a href="#">Doctor</a></1i>
                                            <li class="active"><a href="#">Add Doctors</a>
											</li>
											</li>
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
		<hr>
        <div class="background-wrapper">
    <div class="add-doctor-form-container">
        <h2 class="add-doctor-title">Add Doctor</h2>
        <form class="add-doctor-form" method="POST" action="upload.php">
            <div class="form-group">
                <label for="doctor_name">Doctor Name:</label>
                <input type="text" id="doctor_name" name="doctor_name" class="form-input" placeholder="Enter doctor's name" required>
            </div>
            <div class="form-group">
                <label for="doctor_mail">Doctor Email:</label>
                <input type="email" id="doctor_mail" name="doctor_mail" class="form-input" placeholder="Enter doctor's email" required>
            </div>
            <div class="form-group">
                <label for="doctor_password">Password:</label>
                <input type="password" id="doctor_password" name="doctor_password" class="form-input" placeholder="Enter password" required>
            </div>
            <div class="form-group">
                <label for="doctor_degree">Degree:</label>
                <input type="text" id="doctor_degree" name="doctor_degree" class="form-input" placeholder="Enter degree" required>
            </div>
            <div class="form-group">
                <label for="years_exp">Years of Experience:</label>
                <input type="number" id="years_exp" name="years_exp" class="form-input" placeholder="Enter years of experience" min="0" required>
            </div>
            <div class="form-group">
                <label for="languages_known">Languages Known:</label>
                <input type="text" id="languages_known" name="languages_known" class="form-input" placeholder="Enter languages" required>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" class="form-input" placeholder="Enter location" required>
            </div>
            <button type="submit" class="add-doctor-btn">Add Doctor</button>
        </form>
    </div>
</div>
		<!-- jquery Min JS -->
        <script src="js/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="js/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="js/jquery-ui.min.js"></script>
		<!-- Easing JS -->
        <script src="js/easing.js"></script>
		<!-- Color JS -->
		<script src="js/colors.js"></script>
		<!-- Popper JS -->
		<script src="js/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="js/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
        <script src="js/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="js/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
        <script src="js/jquery.scrollUp.min.js"></script>
		<!-- Niceselect JS -->
		<script src="js/niceselect.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="js/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
        <script src="js/owl-carousel.js"></script>
		<!-- counterup JS -->
		<script src="js/jquery.counterup.min.js"></script>
		<!-- Steller JS -->
		<script src="js/steller.js"></script>
		<!-- Wow JS -->
		<script src="js/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="js/main.js"></script>

		<script src="patientpopup.js"></script>
		<!-- FullCalendar JS -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-4U26oUQeuwzXpE/bNjszGG3lp17FQofTEbGDDGz9h1VqgWQflR8rEqiSUfO4W2ji" crossorigin="anonymous"></script>
    </body>
</html> 