
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
								<div class="page-title">All Routes</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?=base_url('C_admin')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Routes</li>
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
																	<a href="<?=base_url('C_admin/addRoutePage')?>" id="addRow"
																		class="btn btn-info">
																		Add New Route <i class="fa fa-plus"></i>
																	</a>
																</div>
															</div>
															
														</div>
														<div class="table-scrollable">
														 	<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
																id="example4">
																<thead>
																	<?php if(count($routes) > 0) { ?>
																	<tr>
																		<th> Srno. </th>
																		<th> From </th>
                                                                        <th> TO </th>
																		<th> Status </th>
																		<th> Action </th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																		$srno = 1; foreach($routes as $r): ?>
																	<tr class="odd gradeX">
                                                                        <td> <?= $srno; ?> </td>
																		<td> <?=$r['source'];?> </td>
                                                                        <td> <?=$r['destination'];?> </td>
																		<td><?php  if($r['route_status']==0){
																		echo '<span class="clsNotAvailable">Inactive</span>';}
																			else{echo '<span class="clsAvailable">Active</span>';}?></td>
																		<td width="20%">
																			
																			<a href="<?php echo base_url('C_admin/addStopsPage/').$r['route_id'];?>" class="btn btn-success btn-xs">Stops <i class="fa fa-bus "></i>
																			</a>
																			<a href="<?php echo base_url('C_admin/updateFare/');?>" data-toggle="modal" data-target="#f<?=$r['route_id'];?>" class="btn btn-primary btn-xs">
																				<i class="fa fa-pencil"></i>
																			</a>
																			<?php if($r['route_status']==1){ ?>
																				<a href="<?php echo base_url('C_admin/deactivateRoute/')?>"  data-toggle="modal" data-target="#d<?=$r['route_id'];?>" class="btn btn-danger btn-xs"> <i class="fa fa-times "></i>
																				</a>
																			<?php } else { ?>
																				<a href="<?php echo base_url('C_admin/activateRoute/')?>"  data-toggle="modal" data-target="#a<?=$r['route_id'];?>" class="btn btn-warning btn-xs"> <i class="fa fa-check "></i>
																				</a>
																			<?php } ?>
												

										
                               		<div class="modal fade bd-example-modal-sm"  id="d<?=$r['route_id'];?>" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Deactivate Route</h4>
													<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
														<span class="fa fa-times"></span>
													</button>
                                                </div>
                                                <div class="modal-body">Are you sure you want to deactivate this route</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                                                    <a href="<?php echo base_url('C_admin/deactivateRoute/').$r['route_id'] ?>" class="btn btn-danger">Deactivate</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

									<div class="modal fade bd-example-modal-sm"  id="a<?=$r['route_id'];?>" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Activate Route</h4>
													<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
														<span class="fa fa-times"></span>
													</button>
                                                </div>
                                                <div class="modal-body">Are you sure you want to Activate this route</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                                                    <a href="<?php echo base_url('C_admin/activateRoute/').$r['route_id'] ?>" class="btn btn-primary">Activate</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

		<div class="modal fade" id="f<?=$r['route_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:100px;">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
			     	<div class="modal-header">
				        <h4 class="modal-title" id="exampleModalLabel">Update Fare</h4>
				        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
				        	<span class="fa fa-times"></span>
				        </button>
			      	</div>
			    <div class="modal-body">
			        <div class="card">
						<div class="card-head card-topline-aqua">
							<header><?=$r['source']?> To <?=$r['destination']?></header>
						</div>
						<div class="card-body no-padding height-9">
						<form method="post" action="<?=base_url('C_admin/updateFare')?>"class="form-horizontal">
						<div class="form-body">
						
							<div class="form-group row">
								<label class="control-label col-md-3">Fare <span class="required"> * </span> </label>
								<div class="col-md-6">
									<input type="hidden" name="route_id" value="<?=$r['route_id']?>">
									<input type="number" name="fare" placeholder="enter fare" value="100" class="form-control input-height" required/>
								</div>
								<?php echo form_error('fare','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); ?>
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
															
																		
																	<?php $srno ++; endforeach; } else { ?>
																	<h1> No Records found </h1>
																	<?php } ?>
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