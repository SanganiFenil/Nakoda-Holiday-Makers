<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Nakoda Holiday Makers </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>fonts/icomoon/style.css">


    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/aos.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/rangeslider.css">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
    <link rel="shortcut icon" href="<?=base_url('assets/admin/')?>img/logo1.png" />
    <link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
    <style>
      .buscard-container {
        display: flex;
        width: 100%;
        background-color: whitesmoke;
        justify-content: space-between;
        align-items: center;
        border-radius: 5px;
        flex-wrap: wrap;
        padding: 20px;
      }
      .circlegreen {
        background: #52bb9b;
        border-radius: 50%;
        margin-right: 4px;
        width: 7px;
        height: 7px;
        display: block;
        -ms-flex-negative: 0;
        flex-shrink: 0;
        margin: auto;
      }
      .circlered {
        background: #bb5252;
        border-radius: 50%;
        margin-right: 4px;
        width: 7px;
        height: 7px;
        display: block;
        -ms-flex-negative: 0;
        flex-shrink: 0;
        margin: auto;
      }
      .linespacefill {
        height: 1px;
        width: 40px;
        background: #ddd;
        display: block;
        margin: auto;
      }
      .site-blocks-cover, .site-blocks-cover > .container > .row{
        min-height: auto;
        height: auto;
      }
      .bann_img img{
          max-width: 100%;
      }
      .bann_img{
        width: 60%;
        float: left;
      }
      .bann_text{
        width: 40%;
        float: left;
        text-align: center;
      }
      .clearfix{
        clear: both;
      }
      .banner{      
        display: flex;
        align-items: center;  
        justify-content: center;
        padding: 100px 0 20px;
      }
      .seat{
        width: 40px;
        padding: 20px 0;
      }
      .help a{
      text-decoration: none;
      color: #000000;
    }
    .help_text{
      display: flex;
      align-items: center;
      justify-content: left;
    }
    .help_one h1{
      font-size: 35px;
      margin: 0;
    }
    .help_one p{
      margin: 15px 0;
    }
    .help_one h2{
      font-size: 20px;
    }
    .help_one, .help_two, .help_img, .help_email{
      float: left;
    }
    .help_one, .help_two{
      width: 50%;
    }
    .help_img{
      margin-right: 20px;
    }
    .help_two{
      text-align: right;
      margin-top: -110px;
    }
    .help{
      background: #e8edf1;
      margin: 80px 0;
    }
    .col-lg-6 {
          max-width: 60%;
    } 
    .form-control{
      font-family: 'Open Sans', sans-serif;
      color: #000000!important;
      font-weight: 500;  
    }
    .sec_fac{
      background: #e8edf1;
      padding: 50px 30px 0;
      margin-top: 100px;
    }  
    .sec_fac .fac_img{
      margin-top: -120px;
    } 
    .fac_icon_main{
      padding: 50px 0; 
    }
    .fac_icon img{
      }
    .fac_icon p{
      width: 120px;
      background: #FFFFFF;
      display: inline-block;
      box-shadow: 1px 1px 4px #dee2e6;
      margin-top: 14px;
      text-align: center;
      padding: 4px 0;
    }

    @media only screen and (max-width: 500px) {
      .help_one h2 {
        font-size: 14px;
      }
    }
      @media only screen and (max-width: 991px){
        .bann_img{
          display: none; 
        }
        .sec_fac .fac_img{
            margin-top: 0;
          }
      }

      @media only screen and (min-width: 1200px) {
          .div_max_width{
            max-width: 100px;
          }
      }

      @media only screen and (max-width: 767px) {
         .help_two{
            display: none;   
          }
          .help_one, .help_two{
              width: 100%;
              text-align: center;
          }
          .help_text{
            justify-content: center;
          }
          .help {
            margin: 0;
          }
          .bann_text {
              width: 64%;
          }
          .order{
            order: 2;
          }
          .w_100{
            max-width: 100%;
          }
      }

      @media only screen and (min-width: 768px) and (max-width: 991px) {
          .help_two img{
              max-width: 90%;
          }
          .fac_img img{
            height: 188px;
          }
      } 

    </style>
  </head>
  
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar py-2 bg-light position-fixed" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-lg-11 col-md-11 col-sm-11 col-10 div_max_width">
            <a href="<?=base_url();?>"><img class="mb-0 site-logo" src="<?=base_url('assets/admin/')?>img/logo1.png" alt="NHM" widt="60px" height="60px" style="border-radius: 0;"></a>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class=""><a href="<?=base_url();?>"><span>Home</span></a></li>
                <li class="has-children">
                  <a href="#"><span>Booking</span></a>
                  <ul class="dropdown">
                    <li><a href="<?=base_url('searchPnr');?>">View Booking</a></li>
                    <!-- <li><a href="#">Edit Booking</a></li> -->
                    <li><a href="<?=base_url('phoneBooking');?>">Phone Booking</a></li>
                    <li><a href="<?=base_url('cancleTicket');?>">Cancle Ticket</a></li>
                  </ul>
                </li>
                <li><a href="<?=base_url('gallery');?>"><span>Gallery</span></a></li>
                <li><a href="<?=base_url('contactUs');?>"><span>Contact Us</span></a></li>
                
                <?php if($this->session->userdata('user')) { ?>
					        <li class="has-children">
                  <?php $data = $this->session->userdata('user'); ?>
                  <a href="#"><span><?php echo $data[0]['fullname'];?></span></a>
                  <ul class="dropdown">
                    <li><a href="<?=base_url('profile');?>">Profile</a></li>
                    <li><a href="<?=base_url('chkLogout');?>">SIGN OUT</a></li>
                  </ul>
                </li>
				        <?php } else { ?>
					        <li class="has-children">
                  <a href="#"><span>Sign IN</span></a>
                  <ul class="dropdown">
                    <li><a href="<?=base_url('registration');?>">Sign Up</a></li>
                    <li><a href="<?=base_url('login');?>">Sign In</a></li>
                  </ul>
                </li>
				        <?php } ?>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>