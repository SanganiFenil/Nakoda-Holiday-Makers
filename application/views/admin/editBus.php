

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
								<div class="page-title">Edit Buses</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?=base_url('C_admin')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="<?=base_url('C_admin/buses')?>">Buses</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Edit Bus</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Bus Details</header>
								</div>
								<div class="card-body" id="bar-parent">

									<?php $bus = $this->Admin_model->get_bus($busid); ?>
									<form enctype="multipart/form-data" method="post" action="<?=base_url('C_admin/editBus')?>" id="form_sample_1" class="form-horizontal">
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">Bus Name <span class="required"> * </span> </label>
												<div class="col-md-6">
													<input type="text" name="busname" placeholder="enter bus name" value="<?=$bus[0]['bus_name']?>" class="form-control input-height" readonly/>
													<input type="hidden" name="busid" value="<?=$bus[0]['bus_id'];?>">
												</div>
												<?php echo form_error('busname','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); ?>
											</div>



											<div class="form-group row">
												<label class="control-label col-sm-3"> Route <span class="required"> * </span>
												</label>
												<div class="col-md-6">
													<select name="route" class="form-control input-height" id="category1" disabled>
														<option value="0" selected="selected" >--Select Route--</option>
														<?php $Route=$this->Admin_model->route_display();
															foreach($Route as $r): 
																if($r['route_id']==$bus[0]['route_id']){ ?>
																	<option value="<?=$r['route_id']?>" selected="selected"><?=$r['source']?> - <?=$r['destination']?></option>
																<?php } else { ?>
																<option value="<?=$r['route_id']?>"><?=$r['source']?> - <?=$r['destination']?></option>
														<?php } endforeach; ?>
													</select>
												</div>
												<?= form_error('route','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>') ?>
												
											</div>


											<div class="form-group row">
												<label class="control-label col-md-3">Bus Number <span class="required"> * </span> </label>
												<div class="col-md-6">
													<input type="text" name="busno" placeholder="enter bus number" value="<?= $bus[0]['bus_no'] ?>" class="form-control input-height" readonly/>
												</div>
												<?php echo form_error('busno','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); ?>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Total Seats <span class="required"> * </span> </label>
												<div class="col-md-6">
													<input type="number" name="totalseats" placeholder="enter seats" value="<?= $bus[0]['total_seats'] ?>" class="form-control input-height" readonly/>
												</div>
												<?php echo form_error('totalseats','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); ?>
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3"> Departure Time <span class="required"> * </span> </label>
												<div class="col-md-6">
													<input type="time" name="departureTime" value="<?= $bus[0]['departure_time'] ?>" class="form-control input-height" />
												</div>
												<?php echo form_error('departureTime','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); ?>
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3">Destination Time <span class="required"> * </span> </label>
												<div class="col-md-6">
													<input type="time" name="destinationTime" value="<?= $bus[0]['destination_time'] ?>" class="form-control input-height" />
												</div>
												<?php echo form_error('destinationTime','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); ?>
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3">Fare <span class="required"> * </span> </label>
												<div class="col-md-6">
													<input type="number" name="fare" placeholder="enter fare" value="<?= $bus[0]['fare'] ?>" class="form-control input-height" />
												</div>
												<?php echo form_error('fare','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); ?>
											</div>
											
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
														<button type="submit"
															class="btn btn-info m-r-20">Update</button>
															<a href="<?=base_url('C_admin/buses');?>"><button type="button" class="btn btn-default">Cancel</button></a>
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