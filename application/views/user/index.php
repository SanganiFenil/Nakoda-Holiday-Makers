
<?php $this->load->view('user/includes/header'); ?>

    <div class="site-blocks-cover overlay" style="background-image: url(assets/images/bus3.jpg);" data-aos="fade" >
      <div class="container">
        <div class="banner">
            <div class="bann_img">
                <img src="assets/images/bus.png"/>
            </div>
            <div class="bann_text">
                <h1 data-aos="fade-up">Nakoda Holiday Makers</h1>
                <p data-aos="fade-up" data-aos-delay="100"> Safe & Comfortable Journey..</p>
            </div>
            <div class="clearfix"></div>
        </div>        
        <div class="row align-items-center justify-content-center text-center" style="padding-bottom: 100px;">
          <div class="col-md-10">
            <div class="form-search-wrap p-2" data-aos="fade-up" data-aos-delay="200">
              <form method="post" action="<?=base_url('search_results')?>">
                <div class="row align-items-center">
                  <div class="col-lg-12 col-xl-3 no-sm-border border-right">
                    <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="source" id="source">
                      <option value="">From</option>
                        <?php $places = $this->User_model->fill_source(); 
                        foreach($places as $p): 
                          if($p['place_name']==set_value('source')){ ?>
                            <option value="<?=$p['place_name']?>" selected="selected"><?=$p['place_name']?></option>
                          <?php } else { ?>
                            <option value="<?=$p['place_name']?>"><?=$p['place_name']?></option>
                        <?php } endforeach; ?>
                      </select>
                     
                    </div>
                    <?php echo form_error('source','<span class="ui-state-error-text" style="font-size: 10px";>','</span>'); ?>
                  </div>
                  <div class="col-lg-12 col-xl-3 no-sm-border border-right">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="destination" id="destination">
                      <option value="">To</option>
                        <?php
                        foreach($places as $p): 
                          if($p['place_name']==set_value('destination')){ ?>
                            <option value="<?=$p['place_name']?>" selected="selected"><?=$p['place_name']?></option>
                          <?php } else { ?>
                            <option value="<?=$p['place_name']?>"><?=$p['place_name']?></option>
                        <?php } endforeach; ?>
                      </select>
                      
                    </div>
                    <?php echo form_error('destination','<span class="ui-state-error-text" style="font-size: 10px";>','</span>'); ?>
                  </div>
                  <div class="col-lg-12 col-xl-3">
                    <div class="wrap-icon">
                      <input type="date" name="date" class="form-control txtDate" id="">
                    </div>
                    <?php echo form_error('date','<span class="ui-state-error-text" style="font-size: 10px";>','</span>'); ?>
                  </div>
                  <div class="col-lg-12 col-xl-2 ml-auto text-right">
                    <input type="submit" class="btn btn-primary" value="Search">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>  
    
    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Quick Book</h2>
            <p class="color-black-opacity-5">Popular Destinations</p>
          </div>
        </div>

        <div class="row align-items-stretch">
          <?php $routes = $this->User_model->get_routes(); 
            foreach($routes as $r):?>
              <div class="py-1 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-3">
                <button class="btn btn-lg btn-primary col-lg-12" style="border-radius: 40px;" data-toggle="modal" data-target="#dateModal">
                  <?php echo $r['source'].' To '.$r['destination']; ?>
                </button>
                <div class="modal fade bd-example-modal-sm"  id="dateModal" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
                  <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Select Date</h5>
                              <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                              </button>
                          </div>
                          <form action="<?=base_url('search_results')?>" name="form2" method="post">
                          <div class="modal-body" >
                              <input type="hidden" name="source" id="" value="<?=$r['source']?>">
                              <input type="hidden" name="destination" id="" value="<?=$r['destination']?>">
                              <input type="date" class="form-control txtDate" name="date" required>
                            
                          </div>
                          <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Search Bus" name="submit">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                          </form>
                      </div>
                  </div>
              </div>
              </div>
            <?php endforeach; ?>
        </div>
      </div>
    </div>

    <section class="sec_fac" id="main_services">
       <div class="container">
         <div class="row">
           <div class="col-lg-6 col-md-6 order w_100"> 
             <h2>Amenities</h2>
             <p>Last Minute Booking - In a hurry to book a bus at the last minute? Choose the bus passing from your nearest boarding point and book in a few easy steps. Comprehensive Ticket Details- Everything that you need to make the travel hassle free - rest stop details, boarding point images, chat with co-passengers, wake-up alarm and much more!</p>
           </div>
           <div class="col-lg-6 col-md-6 fac_img w_100 mb-4">
             <img src="<?=base_url('assets/')?>images/bus_one.png" alt="Image" class="img-fluid"/>
           </div>
         </div>
         <div class="row fac_icon_main justify-content-center">
             <div class="fac_icon float-left text-center">
               <img src="assets/images/wifi.png" alt="Image"/><br>
               <p>Wifi</p>
             </div>
             <div class="fac_icon float-left text-center">
               <img src="assets/images/bottle.png" alt="Image"/><br>
               <p>Water Bottle</p>
             </div>
              <div class="fac_icon float-left text-center">
               <img src="assets/images/pillows.png" alt="Image"/><br>
               <p>Pillows</p>
             </div>
              <div class="fac_icon float-left text-center">
               <img src="assets/images/charger.png" alt="Image"/><br>
               <p>Charger Point</p>
             </div>
              <div class="fac_icon float-left text-center">
               <img src="assets/images/newspaper.png" alt="Image"/><br>
               <p>News Papper</p>
             </div>
              <div class="fac_icon float-left text-center">
               <img src="assets/images/paper.png" alt="Image"/><br>
               <p>Facial Tissues</p>
             </div>
             <div class="clearfix"></div>
           </div>
         </div>
       </div> 
    </section>

    <div class="site-section" id="main_about">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img src="<?=base_url('assets/')?>images/bus2.jpg" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-5 ml-auto">
            <h2 class="text-primary mb-3">About Us</h2>
            <p>The online bus booking services of Nakoda Holiday Makers offers a plethora of advantages than it’s offline prehistoric booking modes. Firstly, booking a bus ticket through a travel agent or at a counter is in the past. People have begun to recognize the advantages of making an online bus booking.</p>
            <p class="mb-4">With Nakoda Holiday Makers, customers can view every bus that’s available on any given route in India. Customers can view every detail of the bus including updated pictures of the bus, the type of bus, Price of seat, amenities offered, and much more on the Nakoda Holiday Makers website</p>

            <ul class="ul-check list-unstyled success">
              <li>Hassle-free bus booking from anywhere & anytime</li>
              <li>Wide choice of bus seats, bus types & operators.</li>
              <li>Unique benefit for women seat selection</li>
              <li>24/7 Friendly Customer Care assistance</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <section class="help" id="main_help">
      <div class="container" style="padding: 40px 0;">
        <div class="help_one">
          <h1>Helpline</h1>
          <p>Helpline For Bookings, Suggestions, Complaints & Boarding points</p>
          <div class="help_text">
              <div class="help_img">
                <img src="assets/images/help_emil_phone.png"/>
              </div>
              <div class="help_email">  
                <h2>
                  <a href="tel:12345 67890">0123-456-789, 0123-456-789</a><br>
                  <a href="mailto:nakodabuses@gmail.com">nakodabuses@gmail.com</a>
                </h2>
              </div>
              <div class="clearfix"></div>
          </div>
        </div>  
        <div class="help_two">
          <img src="assets/images/help_img.png"/>
        </div>
        <div class="clearfix"></div>  
      </div>
      </div>
  </section>
    
    <?php $this->load->view('user/includes/footer'); ?>
    <script>
      // $('#source').change(function(){
      // 	var pid=$('#source').val();
      // 		$.ajax({
		  //       url:'<?=base_url('getDestination/')?>'+pid,
		  //       success:function(result)
		  //       {
		  //       	// $('#catlabel').css({"top":"8px"});
		  //       	$('#destination').html(result);
		  //       }
	    //   });
    	// });


      $(function(){
        var dtToday = new Date();
        
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var minDate= year + '-' + month + '-' + day;
        
        $('.txtDate').attr('min', minDate);
      });
    </script>
    
    </body>
</html> 