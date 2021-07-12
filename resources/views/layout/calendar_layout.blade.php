<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">

<?php echo view('includes/header');?>
@include('includes.calendar_scripts')
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
			{{-- @include('includes.page-header') --}}

			<!-- /page header -->


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
