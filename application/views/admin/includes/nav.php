<div class="page-header navbar navbar-fixed-top">
	<div class="page-header-inner ">
		<!-- logo start -->
		<div class="page-logo logo-white col-8">
			<a class="col-lg-12 col-md-6 col-sm-8 col-4" href="<?= base_url('C_admin') ?>">
				<img style="margin-top: -5px;" class="col-lg-6 col-md-4 col-sm-4 col-12" src="<?=base_url('assets/admin/')?>img/logo1.png" alt="NHM">
			</a> 
		</div>
		<!-- logo end -->
		
		<!-- start header menu -->
		<div class="top-menu col-4">
			<!-- start mobile menu -->
			<a href="javascript:;" class="menu-toggler responsive-toggler pull-right" data-toggle="collapse"
				data-target=".navbar-collapse">
				<span></span>
			</a>
			<!-- end mobile menu -->

			<ul class="nav navbar-nav pull-right">
				<li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>
				
				<!-- start manage user dropdown -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
						data-close-others="true">
						<img alt="" class="img-circle " src="<?=base_url('assets/admin/')?>img/logo1.png" />
						<span class="username username-hide-on-mobile"><?php echo $this->session->userdata('admin')['name']; ?></span>
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						
						<li>
							<a href="<?=base_url('C_admin/logOut')?>">
								<i class="icon-logout"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- end manage user dropdown -->
				
			</ul>
			
		</div>
		
	</div>
</div>