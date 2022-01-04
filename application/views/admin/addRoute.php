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
								<div class="page-title">Add Route</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?=base_url('C_admin')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="<?=base_url('C_admin/routes')?>">Routes</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Route</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Route & Fare Details</header>
								</div>
								<div class="card-body" id="bar-parent">
									<form enctype="multipart/form-data" method="post" action="<?=base_url('C_admin/addRoute')?>" id="form_sample_1" class="form-horizontal">
										<div class="form-body">
											<div class="form-group row">
                                                <label class="control-label col-sm-3">From <span class="required"> * </span>
												</label>
												<div class="col-md-6">
													<select name="source" class="form-control input-height" id="source">
														<option value="0" selected="selected" >--Select place--</option>
														<?php $places=$this->Admin_model->place_display();
															foreach($places as $p): 
																if($p['place_name']==set_value('source')){ ?>
																	<option value="<?=$p['place_name']?>" selected="selected"><?=$p['place_name']?></option>
																<?php } else { ?>
																<option value="<?=$p['place_name']?>"><?=$p['place_name']?></option>
														<?php } endforeach; ?>
													</select>
												</div>
												<?= form_error('source','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>') ?>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">To <span class="required"> * </span>
												</label>
												<div class="col-md-6">
													<select name="destination" class="form-control input-height" id="to">
														<option value="0" selected="selected" >--Select place--</option>
														<?php $places=$this->Admin_model->place_display();
															foreach($places as $p): 
																if($p['place_name']==set_value('destination')){ ?>
																	<option value="<?=$p['place_name']?>" selected="selected"><?=$p['place_name']?></option>
																<?php } else { ?>
																<option value="<?=$p['place_name']?>"><?=$p['place_name']?></option>
														<?php } endforeach; ?>
													</select>
												</div>
												<?= form_error('destination','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>') ?>
											</div>
                                            <!-- <div class="form-group row">
												<label class="control-label col-md-3"> Fare amount <span class="required"> * </span>
												</label>
												<div class="col-md-6">
													<input type="number" name="fare" placeholder="enter fare " value="" class="form-control input-height" />
												</div>
												<?= form_error('fare','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>') ?>
												
											</div> -->
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
														<button type="submit"
															class="btn btn-info m-r-20">Add</button>
															<a href="<?=base_url('C_admin/routes');?>"><button type="button" class="btn btn-default">Cancel</button></a>
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
		</div>
		<!-- end page container -->
		<!-- start footer -->
		<?php $this->load->view('admin/includes/footer') ?>
	<!-- end js include path -->
</body>	


</html>