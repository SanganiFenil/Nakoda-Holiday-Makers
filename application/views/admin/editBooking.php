

<?php $this->load->view('admin/includes/head') ?>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white blue-sidebar-color logo-white">
	<div class="page-wrapper">
		<!-- start header -->
	<?php $this->load->view('admin/includes/nav') ?>
		<!-- end header -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<?php $this->load->view('admin/includes/sidebar') ?>
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Edit Booking</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?=base_url('C_admin')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="<?=base_url('C_admin/booking')?>">Booking</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Edit Booking</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Booking Details</header>
								</div>
								<div class="card-body" id="bar-parent">

									<?php $booking = $this->Admin_model->get_booking($booking_id);?>
									<form enctype="multipart/form-data" method="post" action="<?=base_url('C_admin/edit_Booking')?>" id="form_sample_1" class="form-horizontal">
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">Name:</label>
												<div class="col-md-6">
													<input type="text" name="fname" placeholder="enter name" value="<?=$booking[0]['name'];?>" class="form-control input-height" readonly>
													<input type="hidden" name="booking_id" value="<?=$booking_id;?>">
												</div>
												<?php echo form_error('fname','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); ?>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-3" readonly>PNR NO:</label>
												<div class="col-md-6">
													<input type="text" name="pnr" placeholder="enter name" value="<?=$booking[0]['pnr_no'];?>" class="form-control input-height" readonly>
												</div>
												<?= form_error('route','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>') ?>
												
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-3" readonly>Phone No:</label>
												<div class="col-md-6">
													<input type="text" name="phone" placeholder="enter name" value="<?=$booking[0]['phone'];?>" class="form-control input-height" readonly>
												</div>
												<?= form_error('route','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>') ?>
												
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-3" readonly>Amount:</label>
												<div class="col-md-6">
													<input type="text" name="fare" placeholder="enter name" value="<?=$booking[0]['fare'];?>/-" class="form-control input-height" readonly>
												</div>
												<?= form_error('route','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>') ?>
												
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-3" readonly>journey Date:</label>
												<div class="col-md-6">
													<input type="text" name="journey_date" placeholder="enter name" value="<?=$booking[0]['journey_date'];?>" class="form-control input-height" required>
												</div>
												<?= form_error('journey_date','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>') ?>
												
											</div>


											
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
														<button type="submit"
															class="btn btn-info m-r-20">Update</button>
															<a href="<?=base_url('C_admin/booking');?>"><button type="button" class="btn btn-default">Cancel</button></a>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
			<!-- start chat sidebar -->
		
			<!-- end chat sidebar -->
		</div>
		<!-- end page container -->
		<!-- start footer -->
		<?php $this->load->view('admin/includes/footer') ?>
	<!-- end js include path -->
</body>


</html>