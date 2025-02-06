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
		<!-- <link rel="stylesheet" href="../css/dashboard.css"> -->
<link rel="stylesheet" href="css/dashboard.css">
		<!-- FullCalendar CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-qWX4OROtBwV1F70YYV+SvWIytzDxWqGozDw3NT8ORzFEppJxA6fs9PBhXid5cwBh" crossorigin="anonymous">
<style>
.background-wrapper{
    background-image: url('img/background.jpg'); /* Replace with the image path */
    background-size: cover; /* Ensures the image covers the entire area */
    background-position: center;
    background-attachment: fixed; /* Makes the background stay fixed on scroll */
    font-family: 'Poppins', sans-serif;
}
</style>
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
											<li class="active"><a href="dash.php">Home</a>
											</li>
											<li><a href="patientlist.php">Patients</a></li>
											<li><a href="#">Doctor</a></1i>
                                            <li><a href="adddoctors.php">Add Doctors</a>
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

            <div class="container my-5">
                <!-- Row for Pie Chart and Calendar -->
                <div class="row">
                    <!-- Pie Chart -->
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                Patient Satisfaction
                            </div>
                            <div class="card-body">
                                <canvas id="patientSatisfactionChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Calendar -->
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-success text-white">
                                Calendar
                            </div>
                            <div class="card-body" id="calendar"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Row for Cards -->
                <div class="row text-center">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow-sm total-doctors-card">
                            <div class="card-body">
                                <h5>Total Doctors</h5>
                                <p class="card-text display-4">20</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow-sm new-patients-card">
                            <div class="card-body">
                                <h5>New Patients</h5>
                                <p class="card-text display-4">35</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow-sm total-patients-card">
                            <div class="card-body">
                                <h5>Total Patients</h5>
                                <p class="card-text display-4">150</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow-sm earnings-card">
                            <div class="card-body">
                                <h5>Earnings</h5>
                                <p class="card-text display-4">$5000</p>
                            </div>
                        </div>
                    </div>
                </div>
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

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Pie Chart for Patient Satisfaction
            const ctx = document.getElementById('patientSatisfactionChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Very Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied'],
                    datasets: [{
                        label: 'Patient Satisfaction',
                        data: [50, 30, 10, 10],
                        backgroundColor: ['#4caf50', '#2196f3', '#ffc107', '#f44336'],
                        borderWidth: 1
                    }]
                }
            });

            // Initialize FullCalendar
            document.addEventListener('DOMContentLoaded', function () {
                const calendarEl = document.getElementById('calendar');
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth'
                });
                calendar.render();
            });
        </script>

    </body>
</html> 