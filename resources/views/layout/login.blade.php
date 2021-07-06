<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">

<?php echo view('includes/header');?>
</head>

<body>

	<!-- Main navbar -->
	@include('includes.login_main_navbar')

	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

	


		<!-- Main content -->
		<div class="content-wrapper">

		


			<!-- Content area -->
			<div class="content" id="content_alani">

				<!-- Main charts -->

				<!-- /main charts -->
                @yield('content')



				<!-- Dashboard content -->

				<!-- /dashboard content -->

			</div>
			<!-- /content area -->


			<!-- Footer -->
			@include('includes.footer')

			<!-- /footer -->
			@routes
		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
