<!DOCTYPE html>
<html lang="en">
<head>


<?php echo view('includes/header');?>
</head>

<body>

	<!-- Main navbar -->
	@include('includes.main-navbar')

	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		@include('includes.main-sidebar')

		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			@include('includes.page-header')

			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

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

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
