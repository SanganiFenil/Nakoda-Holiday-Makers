<?php $this->load->view('admin/includes/head') ?>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white blue-sidebar-color logo-white">
	<div class="page-wrapper">
		<!-- start header -->
		<?php $this->load->view('admin/includes/nav'); ?>
		<!-- end header -->
		
		<!-- start page container -->
		<div class="page-container">

			<!-- start sidebar menu -->
			<?php $this->load->view('admin/includes/sidebar'); ?>
			<!-- end sidebar menu -->

			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Dashboard</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?= base_url('C_admin');?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Dashboard</li>
							</ol>
						</div>
					</div>
					<?php
						$connect = mysqli_connect("localhost","root","","nakodabuses")or die("Connection Problem....");
						$query = "SELECT * FROM `bus`";
						$res = mysqli_query($connect, $query);
						$cnt = mysqli_num_rows($res);
					?>
					<!-- start widget -->
					<div class="state-overview">
						<div class="row">
							<div class="col-xl-6 col-md-6 col-6">
								<div class="info-box bg-orange">
								<span class="info-box-icon push-bottom" style="margin-top: 5px;">
										<i class="material-icons">view_list</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Buses</span>
										<span class="info-box-number"><?php echo $cnt; ?></span>
										
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<?php
						$connect = mysqli_connect("localhost","root","","nakodabuses")or die("Connection Problem....");
						$query = "SELECT * FROM `booking`";
						$res = mysqli_query($connect, $query);
						$booking_cnt = mysqli_num_rows($res);
					?>
							<div class="col-xl-6 col-md-6 col-6">
								<div class="info-box bg-success">
								<span class="info-box-icon push-bottom" style="margin-top: 5px;">
										<i class="material-icons">view_list</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Tickets Booked</span>
										<span class="info-box-number"><?php echo $booking_cnt; ?></span>
										
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<?php
						$connect = mysqli_connect("localhost","root","","nakodabuses")or die("Connection Problem....");
						$query = "SELECT * FROM `user_inquiry`";
						$res = mysqli_query($connect, $query);
						$inquiry_cnt = mysqli_num_rows($res);
					?>
							<!-- /.col -->
							<div class="col-xl-6 col-md-6 col-6">
								<div class="info-box bg-primary">
									<span class="info-box-icon push-bottom" style="margin-top: 5px;">
										<i class="material-icons">view_list</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total inquiries</span>
										<span class="info-box-number"><?php echo $inquiry_cnt; ?></span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>

			<!-- 				<div class="col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="analysis-box m-b-0 bg-info">
								<h3 class="text-white box-title">Reports  
									<br>
									<a href="<?=base_url('C_admin/reportExl/u')?>"><span class="btn btn-xs btn-success">Users</span></a>
									<a href="<?=base_url('C_admin/reportExl/sp')?>"><span class="btn btn-xs btn-success">Service Providers</span></a>
									<a href="<?=base_url('C_admin/reportExl/bc')?>"><span class="btn btn-xs btn-success">Business Categories</span></a>
									<a href="<?=base_url('C_admin/reportExl/cp')?>"><span class="btn btn-xs btn-success">Coupans</span></a>
									</h3>
							</div>
						</div> -->
							<!-- /.col -->
							
							<!-- /.col -->
						</div>

						
					<!-- end widget -->
					
					
				</div>
			</div>
			<!-- end page content -->
		
		</div>
		<!-- end page container -->

		<!-- start footer -->
		<?php $this->load->view('admin/includes/footer'); ?>
		<!-- end js include path -->
</body>

</html>