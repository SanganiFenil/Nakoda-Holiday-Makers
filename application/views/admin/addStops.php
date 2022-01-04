

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
								<div class="page-title">Add Stops</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?=base_url('C_admin')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="<?=base_url('C_admin/routes')?>">Routes</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Stops</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<?php
										$bus = $this->Admin_model->get_bus($bid); $r = $this->Admin_model->get_route($bus[0]['route_id']); ?>
									<header>Stops : <?=$r[0]['source'] ?> To <?=$r[0]['destination']?></header>
								</div>
								<div class="card-body" id="bar-parent">
									<form enctype="multipart/form-data" method="post" action="<?=base_url('C_admin/addStop')?>" id="form_sample_1" class="form-horizontal">
										<div class="form-body">
											<?php $stops = $this->Admin_model->get_stops($bid); 
												if(!empty($stops)){ 
													foreach($stops as $s):?>
														<div class="form-group row">
															<label class="control-label col-sm-3"></label>
															<b class="col-sm-3"><?=$s['pickup_name']?></b>
															<p class="col-sm-1"><?=$s['time']?></p>
															<a href="<?=base_url('C_admin/deleteStop/').$s['stop_id'].'/'.$s['bus_id'];?>" class="col-sm-2 text-danger">Delete</a>
														</div>
													<?php endforeach; ?>
											<?php } ?>
                                            <div class="form-group row">
												<label class="control-label col-sm-3">Stop and time <span class="required"> * </span>
												</label>
												<div class="col-md-3">
													<select name="stop" class="form-control input-height" id="place1">
														<option value="0" selected="selected" >--Select stop--</option>
														<?php $places=$this->Admin_model->pickup_display();
															foreach($places as $p): 
																if($p['pickup_id']==set_value('stop')){ ?>
																	<option value="<?=$p['pickup_id']?>" selected="selected"><?=$p['pickup_name']?></option>
																<?php } else { ?>
																<option value="<?=$p['pickup_id']?>"><?=$p['pickup_name']?></option>
														<?php } endforeach; ?>
													</select>
													<input type="hidden" name="bid" value="<?=$bid?>">
												</div>
												<div class="col-md-2">
													<input type="time" name="stop_time" placeholder="enter time" value="<?= set_value('pdname') ?>" class="form-control input-height" />
												</div>
											</div>
											<div class="form-group row">
											<label class="control-label col-sm-3"> <span class="required"> </span>
												</label>
												<div class="col-md-3">
													<?= form_error('stop','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>') ?>
												</div>
												<div class="col-md-4">
													<?= form_error('stop_time','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); ?>
												</div>
                                            </div>
											
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
														<button type="submit"
															class="btn btn-info m-r-20">Add</button>
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