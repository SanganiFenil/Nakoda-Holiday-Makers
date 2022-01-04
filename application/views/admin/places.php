
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
								<div class="page-title">All places</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?=base_url('C_admin')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>Places</li>
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
													<?= $this->session->flashdata('addPlace');?>
												</div>
												<div class="card-body ">
													<div class="row">
														<div class="col-md-6 col-sm-6 col-6">
															<div class="btn-group">
																<a href="<?=base_url('C_admin/addPlacePage')?>" id="addRow"
																	class="btn btn-info">
																	Add New place <i class="fa fa-plus"></i>
																</a>
															</div>
														</div>
														</div>
													</div>
													<div class="table-scrollable">
														<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
															id="example4">
															<thead>
																<tr>
																	<th> Sr no. </th>
																	<th> Place name </th>
																</tr>
															</thead>
															<tbody>
																<?php $srno = 1; foreach($places as $p): ?>
																<tr class="odd gradeX">
																	<td> <?=$srno?> </td>
																	<td> <?=$p['place_name']?> </td>
																</tr>
															<?php $srno ++; endforeach; ?>
															</tbody>
														</table>

													

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