

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
								<div class="page-title">Add Drivers</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?=base_url('C_admin')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="<?=base_url('C_admin/Drivers')?>">Drivers</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Driver</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Driver Details</header>
								</div>
								<div class="card-body" id="bar-parent">
									<form enctype="multipart/form-data" method="post" action="<?=base_url('C_admin/addDriver')?>" id="form_sample_1" class="form-horizontal">
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">Driver Name <span class="required"> * </span> </label>
												<div class="col-md-6">
													<input type="text" name="name" placeholder="enter driver name" value="<?= set_value('name') ?>" class="form-control input-height" />
												</div>
												<?php echo form_error('name','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); ?>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Drive Name <span class="required"> * </span> </label>
												<div class="col-md-6">
													<input type="number" name="phone" placeholder="enter 10 digit mobile number" value="<?= set_value('phone') ?>" class="form-control input-height" />
												</div>
												<?php echo form_error('phone','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); ?>
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
														<button type="submit"
															class="btn btn-info m-r-20">Add</button>
															<a href="<?=base_url('C_admin/drivers');?>"><button type="button" class="btn btn-default">Cancel</button></a>
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