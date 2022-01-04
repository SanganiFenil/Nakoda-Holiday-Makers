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
								<div class="page-title">All Buses</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?=base_url('C_admin')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Buses</li>
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
																	<a href="<?=base_url('C_admin/addBusPage')?>" id="addRow"
																		class="btn btn-info">
																		Add New Bus <i class="fa fa-plus"></i>
																	</a>
																</div>
															</div>
														</div>
														<div class="table-scrollable">
														 	<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
																id="example4">
																<thead>
																	<tr>
																		<th width="15%"> Bus No. </th>
																		<th> Bus Name </th>
																		<th> Route </th>
																		<th> Fare </th>
                                                                        <th> Bus Status </th>
																		<th> Action </th>
																	</tr>
																</thead>
																<tbody>
																<?php foreach($buses as $b): $route = $this->Admin_model->get_route($b['route_id']);?>
																	<tr class="odd gradeX">
                                                                        <td width="15%"> <?=$b['bus_no']?>  </td>
																		<td> <?=$b['bus_name']?> </td>
																		<td> <?php echo $route[0]['source'].' - '.$route[0]['destination'];?> </td>
																		<td> &#8377; <?=$b['fare']?> </td>
                                                                        <td width="20%"><?php  if($b['bus_status']==0){
																		echo '<span class="clsNotAvailable">Inactive</span>';}
																			else{echo '<span class="clsAvailable">Active</span>';}?></td>
																		<td width="13%">
																			
																			<a href="<?php echo base_url('C_admin/addStopsPage/').$b['bus_id'];?>" class="btn btn-success btn-xs">Stops <i class="fa fa-bus "></i>
																			</a>
																			<a href="<?php echo base_url('C_admin/editBusPage/').$b['bus_id'];?>" class="btn btn-primary btn-xs">
																				<i class="fa fa-pencil"></i>
																			</a>
																			<?php if($b['bus_status']==1){ ?>
																				<a href="<?php echo base_url('C_admin/deactivateRoute/')?>"  data-toggle="modal" data-target="#d<?=$b['bus_id'];?>" class="btn btn-danger btn-xs"> <i class="fa fa-times "></i>
																				</a>
																			<?php } else { ?>
																				<a href="<?php echo base_url('C_admin/activate_Bus/').$b['bus_id'];?>" class="btn btn-warning btn-xs"> <i class="fa fa-check "></i>
																				</a>
																			<?php } ?>

										
                               		<div class="modal fade bd-example-modal-sm"  id="d<?=$b['bus_id']?>" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Bus</h4>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure u want to deactivate this Bus..?
													<form action="<?=base_url('C_admin/deactivateBus');?>" name="formd<?=$b['bus_id']?>" method="post">
														<input type="hidden" name="busid" value="<?=$b['bus_id']?>"> 
														<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<input type="submit" name="submit" value="Delete" class="btn btn-danger">
														</div>
													</form>
												</div>
                                               
                                            </div>
                                        </div>
                                    </div>
																		</td>
																	</tr>
																	<?php endforeach; ?>
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