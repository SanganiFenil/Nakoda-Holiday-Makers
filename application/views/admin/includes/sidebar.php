<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll" class="left-sidemenu">
            <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
                data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="<?= base_url('C_admin/');?>" class="nav-link nav-toggle">
                        <i class="material-icons">dashboard</i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('C_admin/routes');?>" class="nav-link"> <i class="fa fa-exchange"></i>
                        <span class="title">Routes</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?= base_url('C_admin/buses');?>" class="nav-link nav-toggle"> <i class="fa fa-bus"></i>
                        <span class="title">Buses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle"> <i class="fa fa-map-marker"></i>
                        <span class="title">Places</span> <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="<?= base_url('C_admin/places');?>" class="nav-link "> <span class="title">All
                                    Places</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('C_admin/pickupPoints');?>" class="nav-link "> <span class="title">Pickup / Drop points</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle"><i class="fa fa-ticket"></i>
                        <span class="title">Bookings</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="<?= base_url('C_admin/booking');?>" class="nav-link "> <span class="title">Online Bokings
                                    </span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?=base_url('C_admin/mannualBooking');?>" class="nav-link "> <span class="title">Mannual Bookings</span>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url('C_admin/drivers')?>" class="nav-link"> <i class="fa fa-user"></i>
                        <span class="title">Driver Details</span> 
                    </a>
                </li>
               <!--  <li class="nav-item">
                    <a href="#" class="nav-link"> <i class="fa fa-picture-o"></i>
                        <span class="title">Gallery</span> 
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="<?=base_url('C_admin/info')?>" class="nav-link"> <i class="fa fa-question"></i>
                        <span class="title">User Inquiries</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url('C_admin/logOut')?>" class="nav-link nav-toggle"> <i class="fa fa-users"></i>
                        <span class="title">Logout</span> 
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>