
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
								<div class="page-title">All Drivers</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?=base_url('C_admin')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Drivers</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							
								<div class="tab-content">
									<div class="tab-pane active fontawesome-demo" id="tab1">
										<div class="row">
											<div class="col-md-12">
												<div class="card card-topline-red">
													<div class="card-head">
														<header></header>
														<?= $this->session->flashdata('msg_upload');?>
														
													</div>
													<div class="card-body ">
														<div class="row">
															<div class="col-md-6 col-sm-6 col-6">
																<div class="btn-group">
																	<a href="<?=base_url('C_admin/addDriverPage')?>" id="addRow"
																		class="btn btn-info">
																		Add New Driver <i class="fa fa-plus"></i>
																	</a>
																</div>
															</div>
															
														</div>
														<div class="table-scrollable">
														 	<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
																id="example4">
																<thead>
																	<tr>
																		<th> Srno. </th>
																		<th> Driver Name </th>
                                                                        <th> Mobile Number </th>
																		<th> Action </th>
																	</tr>
																</thead>
																<tbody>
																
																<?php $drivers = $this->Admin_model->driver_display();
																$srno = 1; foreach($drivers as $d): ?>
																	<tr class="odd gradeX">
                                                                        <td> <?=$srno?> </td>
																		<td> <?=$d['name']?> </td>
                                                                        <td> <?=$d['phone']?> </td>
																		<td width="10%">
																			
																			<a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#u<?=$d['driver_id']?>"> <i class="fa fa-pencil "></i>
																			</a>
																			<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#d<?=$d['driver_id']?>"> <i class="fa fa-trash-o "></i>
																			</a>

									
                               		<div class="modal fade bd-example-modal-sm"  id="d<?=$d['driver_id'];?>" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete Driver</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure u want to delete this Driver.
													<form action="<?=base_url('C_admin/deleteDriver');?>" name="formd<?=$d['driver_id']?>" method="post">
														<input type="hidden" name="driverid" value="<?=$d['driver_id']?>"> 
														<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<input type="submit" name="submit" value="Delete" class="btn btn-danger">
														</div>
													</form>
												</div>
                                            </div>
                                        </div>
                                    </div>

		<div class="modal fade" id="u<?=$d['driver_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:100px;">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
			     	<div class="modal-header">
				        <h4 class="modal-title" id="exampleModalLabel">Update mobile number</h4>
				        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
				        	<span class="fa fa-times"></span>
				        </button>
			      	</div>
			    <div class="modal-body">
			        <div class="card">
						<div class="card-head card-topline-aqua">
							<header><?=$d['name']?></header>
						</div>
						<div class="card-body no-padding height-9">
						<form method="post" action="<?=base_url('C_admin/updateDriverContact')?>"class="form-horizontal">
						<div class="form-body">
						
							<div class="form-group row">
								<label class="control-label col-md-3">Mobile. <span class="required"> * </span> </label>
								<div class="col-md-6">
									<input type="hidden" name="driverid" value="<?=$d['driver_id']?>">
									<input type="number" name="phone" placeholder="enter driver number" value="<?=$d['phone']?>" class="form-control input-height" required/>
								</div>
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="offset-md-3 col-md-9">
										<button type="submit"
											class="btn btn-info m-r-20">Update</button>
										<!-- <button type="button" class="btn btn-default">Cancel</button> -->
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
																		</td>
																	</tr>
																	<?php $srno ++; endforeach; ?>
																</tbody>
															</table>

															<!-- modals -->

														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
										
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
	<script>
	
	</script>
</body>


</html>