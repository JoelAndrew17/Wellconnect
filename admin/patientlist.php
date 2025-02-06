<?php 
include "../include/config.php"; 
?>

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
        <link rel="stylesheet" href="patientlist.css">
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
											<li><a href="dash.php">Home</a>
											</li>
											<li class="active"><a href="#">Patients</a></li>
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
         <div class="table-container">
    <!-- Appointment Requests -->
    <h2>Appointment Requests</h2>
    <?php
    // Fetch appointment requests (status=False AND appoint=Hold)
    $queryRequests = "SELECT * FROM appointments WHERE status='False' AND appoint='Hold'";
    $resultRequests = $conn->query($queryRequests);

    // Fetch approved patients (status=True AND appoint=Upcoming)
    $queryApproved = "SELECT * FROM appointments WHERE status='True' AND appoint='Upcoming'";
    $resultApproved = $conn->query($queryApproved);

    // Fetch consulted patients (status=True AND appoint=Completed)
    $queryConsulted = "SELECT * FROM appointments WHERE status='True' AND appoint='Completed'";
    $resultConsulted = $conn->query($queryConsulted);
    ?>

    <!-- Tables for Each Category -->
    <div class="container mt-4">

        <!-- Appointment Requests -->
        <h3>Appointment Requests</h3>
        <table class="table table-bordered patient-records-table">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Visit Type</th>
                    <th>Appointment Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultRequests->num_rows > 0) {
                    while ($row = $resultRequests->fetch_assoc()) {
                        echo '
                        <tr>
                            <td>' . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . '</td>
                            <td>' . htmlspecialchars($row['visit'], ENT_QUOTES, 'UTF-8') . '</td>
                            <td>' . htmlspecialchars($row['selected_date'], ENT_QUOTES, 'UTF-8') . '</td>
                            <td>
                                <button class="btn btn-info patient-view-files-btn" data-id="' . htmlspecialchars($row['ID'], ENT_QUOTES, 'UTF-8') . '">View Files</button>
                                <button class="btn btn-primary message-btn" data-id="' . htmlspecialchars($row['ID'], ENT_QUOTES, 'UTF-8') . '">Message Patient</button>
                            </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="4">No appointment requests found.</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <!-- Approved Patients -->
        <h3>Approved Patients</h3>
        <table class="table table-bordered patient-records-table">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Visit Type</th>
                    <th>Appointment Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultApproved->num_rows > 0) {
                    while ($row = $resultApproved->fetch_assoc()) {
                        echo '
                        <tr>
                            <td>' . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . '</td>
                            <td>' . htmlspecialchars($row['visit'], ENT_QUOTES, 'UTF-8') . '</td>
                            <td>' . htmlspecialchars($row['selected_date'], ENT_QUOTES, 'UTF-8') . '</td>
                            <td>
                                <button class="btn btn-info patient-view-files-btn" data-id="' . htmlspecialchars($row['ID'], ENT_QUOTES, 'UTF-8') . '">View Files</button>
                                <button class="btn btn-primary message-btn" data-id="' . htmlspecialchars($row['ID'], ENT_QUOTES, 'UTF-8') . '">Message Patient</button>
                            </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="4">No approved patients found.</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <!-- Consulted Patients -->
        <h3>Consulted Patients</h3>
        <table class="table table-bordered patient-records-table">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Visit Type</th>
                    <th>Appointment Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultConsulted->num_rows > 0) {
                    while ($row = $resultConsulted->fetch_assoc()) {
                        echo '
                        <tr>
                            <td>' . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . '</td>
                            <td>' . htmlspecialchars($row['visit'], ENT_QUOTES, 'UTF-8') . '</td>
                            <td>' . htmlspecialchars($row['selected_date'], ENT_QUOTES, 'UTF-8') . '</td>
                            <td>
                                <button class="btn btn-info patient-view-files-btn" data-id="' . htmlspecialchars($row['ID'], ENT_QUOTES, 'UTF-8') . '">View Files</button>
                                <button class="btn btn-primary message-btn" data-id="' . htmlspecialchars($row['ID'], ENT_QUOTES, 'UTF-8') . '">Message Patient</button>
                            </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="4">No consulted patients found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal to Show Files -->
<div class="modal" id="patientFilesModal" tabindex="-1" role="dialog" aria-labelledby="patientFilesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="patientFilesModalLabel">Patient Files</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="patient-file-list"></div>
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
        <script>
        function sortTable(columnIndex, tableId) {
        const table = document.getElementById(tableId);
        const rows = Array.from(table.getElementsByTagName("tr")).slice(1);
        const ascending = table.dataset.sortedAsc !== "true";

        rows.sort((a, b) => {
            const textA = a.cells[columnIndex].innerText.toLowerCase();
            const textB = b.cells[columnIndex].innerText.toLowerCase();
            return textA > textB ? (ascending ? 1 : -1) : textA < textB ? (ascending ? -1 : 1) : 0;
        });

        rows.forEach(row => table.tBodies[0].appendChild(row));
        table.dataset.sortedAsc = ascending;
        }
        $(document).ready(function () {
            $('.patient-view-files-btn').on('click', function () {
                var id = $(this).data('id');

                if (!id) {
                    alert('Error: Invalid ID');
                    return;
                }

                // AJAX request to fetch files
                $.ajax({
                    url: 'fetch_files.php',
                    method: 'POST',
                    data: { id: id },
                    success: function (response) {
                        $('#patient-file-list').html(response);
                        $('#patientFilesModal').modal('show');
                    },
                    error: function () {
                        alert('Failed to fetch patient records.');
                    }
                });
            });
        });
        </script>
    </body>
</html> 