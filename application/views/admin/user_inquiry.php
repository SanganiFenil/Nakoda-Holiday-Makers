
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
								<div class="page-title">User Inquiry</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?=base_url('C_admin')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">User Inquiry</li>
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
														<div class="table-scrollable">
														 	<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
																id="example4">
																<thead>
																	<tr>
																		<th> Srno. </th>
																		<th> First Name </th>
                                                                        <th> Last Name </th>
																		<th> Email </th>
																		<th> Subject </th>
																		<th> Message </th>
																		<th> Action </th>
																	</tr>
																</thead>
																<tbody>
																
																<?php $info = $this->Admin_model->info_display();
																$srno = 1; foreach($info as $d): ?>
																	<tr class="odd gradeX">
                                                                        <td> <?=$srno?> </td>
																		<td> <?=$d['fname']?> </td>
                                                                        <td> <?=$d['lname']?> </td>
                                                                        <td> <?=$d['email']?> </td>
                                                                        <td> <?=$d['subject']?> </td>
                                                                        <td> <?=$d['message']?> </td>
																		<td width="10%">
																			
																			<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#d<?=$d['inqid']?>"> <i class="fa fa-trash-o "></i>
																			</a>

									
                               		<div class="modal fade bd-example-modal-sm"  id="d<?=$d['inqid'];?>" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete inquiry</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure u want to delete this inquiry.
													<form action="<?=base_url('C_admin/deleteInquiry');?>" name="formd<?=$d['inqid']?>" method="post">
														<input type="hidden" name="inqid" value="<?=$d['inqid']?>"> 
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